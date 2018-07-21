<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MonitorsStudentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MonitorsStudentsTable Test Case
 */
class MonitorsStudentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MonitorsStudentsTable
     */
    public $MonitorsStudents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.monitors_students',
        'app.monitors',
        'app.students'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MonitorsStudents') ? [] : ['className' => MonitorsStudentsTable::class];
        $this->MonitorsStudents = TableRegistry::getTableLocator()->get('MonitorsStudents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MonitorsStudents);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
