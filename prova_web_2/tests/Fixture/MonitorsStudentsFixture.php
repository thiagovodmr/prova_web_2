<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MonitorsStudentsFixture
 *
 */
class MonitorsStudentsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'monitor_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'student_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'dateTimeStart' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'dateTimeEnd' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'monitor_id' => ['type' => 'index', 'columns' => ['monitor_id'], 'length' => []],
            'student_id' => ['type' => 'index', 'columns' => ['student_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'monitors_students_ibfk_1' => ['type' => 'foreign', 'columns' => ['monitor_id'], 'references' => ['monitors', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'monitors_students_ibfk_2' => ['type' => 'foreign', 'columns' => ['student_id'], 'references' => ['students', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'monitor_id' => 1,
                'student_id' => 1,
                'dateTimeStart' => '2018-07-21 01:08:24',
                'dateTimeEnd' => '2018-07-21 01:08:24'
            ],
        ];
        parent::init();
    }
}
