<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QueueFailedJobsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QueueFailedJobsTable Test Case
 */
class QueueFailedJobsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QueueFailedJobsTable
     */
    protected $QueueFailedJobs;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.QueueFailedJobs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('QueueFailedJobs') ? [] : ['className' => QueueFailedJobsTable::class];
        $this->QueueFailedJobs = $this->getTableLocator()->get('QueueFailedJobs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->QueueFailedJobs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\QueueFailedJobsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
