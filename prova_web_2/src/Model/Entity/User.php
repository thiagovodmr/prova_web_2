<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Event\Event;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $username
 * @property string $password
 *
 * @property \App\Model\Entity\Monitor[] $monitors
 * @property \App\Model\Entity\Student[] $students
 */
class User extends Entity
{
    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }


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
        'username' => true,
        'password' => true,
        'monitors' => true,
        'students' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
