<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;
use Notifications\Model\Entity\Notification;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property FrozenTime $created_at
 * @property FrozenTime|null $updated_at
 * @property Notification[] $notifications
 */
class User extends Entity
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
        'name' => true,
        'email' => true,
        'notifications' => true,
        'created_at' => true,
        'updated_at' => true,
    ];
}
