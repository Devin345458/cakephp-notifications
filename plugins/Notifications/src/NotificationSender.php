<?php

namespace Notifications;

use Cake\Collection\Collection;
use Cake\ORM\Entity;
use Cake\Utility\Text;

class NotificationSender
{
    /**
     * The notification manager instance.
     *
     * @var ChannelManager
     */
    protected $manager;

    protected

    /**
     * Create a new notification sender instance.
     *
     * @param  ChannelManager  $manager
     * @param  string|null  $locale
     * @return void
     */
    public function __construct(ChannelManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Send the given notification to the given notifiable entities.
     *
     * @param Entity[] $notifiables
     * @param  mixed  $notification
     * @return void
     */
    public function send(array $notifiables, $notification)
    {
        $this->sendNow($notifiables, $notification);
    }

    /**
     * Send the given notification immediately.
     *
     * @param Entity[] $notifiables
     * @param  mixed  $notification
     * @param  array|null  $channels
     * @return void
     */
    public function sendNow(array $notifiables, $notification, array $channels = null)
    {
        $original = clone $notification;

        foreach ($notifiables as $notifiable) {
            $viaChannels = $channels ?: $notification->via($notifiable);
            if (empty($viaChannels)) {
                continue;
            }


            $notificationId = Text::uuid();

            foreach ((array) $viaChannels as $channel) {
                if (! ($notifiable instanceof AnonymousNotifiable && $channel === 'database')) {
                    $this->sendToNotifiable($notifiable, $notificationId, clone $original, $channel);
                }
            }
        }
    }

    /**
     * Send the given notification to the given notifiable via a channel.
     *
     * @param  mixed  $notifiable
     * @param string $id
     * @param  mixed  $notification
     * @param string $channel
     * @return void
     */
    protected function sendToNotifiable($notifiable, string $id, $notification, string $channel)
    {
        if (! $notification->id) {
            $notification->id = $id;
        }

        if (! $this->shouldSendNotification($notifiable, $notification, $channel)) {
            return;
        }

        $response = $this->manager->driver($channel)->send($notifiable, $notification);

        $this->events->dispatch(
            new NotificationSent($notifiable, $notification, $channel, $response)
        );
    }

    /**
     * Determines if the notification can be sent.
     *
     * @param  mixed  $notifiable
     * @param  mixed  $notification
     * @param  string  $channel
     * @return bool
     */
    protected function shouldSendNotification($notifiable, $notification, $channel)
    {
        if (method_exists($notification, 'shouldSend') &&
            $notification->shouldSend($notifiable, $channel) === false) {
            return false;
        }

        return $this->events->until(
                new NotificationSending($notifiable, $notification, $channel)
            ) !== false;
    }
}
