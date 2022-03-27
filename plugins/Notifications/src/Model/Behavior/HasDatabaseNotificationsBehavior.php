<?php
declare(strict_types=1);

namespace Notifications\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Query;
use Notifications\Model\Table\NotificationsTable;

/**
 * HasDatabaseNotifications behavior
 * @property NotificationsTable $Notifications
 */
class HasDatabaseNotificationsBehavior extends Behavior
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'table' => 'Notifications.Notifications'
    ];

    public function initialize(array $config): void
    {
        if (!$this->_table->behaviors()->has('Notifications.Morph')) {
            $this->_table->behaviors()->load('Notifications.Morph');
        }
        $this->_table->morphToMany('Notifications.Notifications')
            ->setSort(['created' => 'DESC']);
    }

    /**
     * Get the entity's read notifications.
     *
     * @return Query
     */
    public function readNotifications()
    {
        return $this->Notifications->read();
    }

    /**
     * Get the entity's unread notifications.
     *
     * @return Query
     */
    public function unreadNotifications()
    {
        return $this->Notifications->read();
    }
}
