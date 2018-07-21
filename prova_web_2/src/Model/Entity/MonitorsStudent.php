<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MonitorsStudent Entity
 *
 * @property int $id
 * @property int $monitor_id
 * @property int $student_id
 * @property \Cake\I18n\FrozenTime $dateTimeStart
 * @property \Cake\I18n\FrozenTime $dateTimeEnd
 *
 * @property \App\Model\Entity\Monitor $monitor
 * @property \App\Model\Entity\Student $student
 */
class MonitorsStudent extends Entity
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
        'monitor_id' => true,
        'student_id' => true,
        'dateTimeStart' => true,
        'dateTimeEnd' => true,
        'monitor' => true,
        'student' => true
    ];
}
