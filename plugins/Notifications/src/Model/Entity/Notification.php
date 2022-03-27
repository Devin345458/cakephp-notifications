<?php
declare(strict_types=1);

namespace Notifications\Model\Entity;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * Notification Entity
 *
 * @property string $id
 * @property string $type
 * @property string $notificationable_id
 * @property string notificationable_type
 * @property string $data
 * @property FrozenTime|null $read_at
 * @property FrozenTime $created_at
 * @property FrozenTime|null $updated_at
 *
 * @property Entity $notifiable
 */
class Notification extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'type' => true,
        'notificationable_id' => true,
        'notificationable_type' => true,
        'data' => true,
        'read_at' => true,
        'created_at' => true,
        'updated_at' => true,
        'notifiable' => true,
    ];
}
