<?php

namespace Notifications\Channels;

use Cake\Mailer\Mailer;
use Notifications\Notification;

class MailChannel
{
    /**
     * The mailer implementation.
     *
     * @var Mailer
     */
    protected $mailer;

    /**
     * Create a new mail channel instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->mailer = new Mailer();
    }

    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toMail($notifiable);

        if (!$message instanceof Mailer) {
            return;
        }

        return $message->send();
    }
}
