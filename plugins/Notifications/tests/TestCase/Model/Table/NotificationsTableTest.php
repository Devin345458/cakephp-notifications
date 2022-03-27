<?php
declare(strict_types=1);

namespace Notifications\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use Notifications\Model\Table\NotificationsTable;

/**
 * Notifications\Model\Table\NotificationsTable Test Case
 */
class NotificationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Notifications\Model\Table\NotificationsTable
     */
    protected $Notifications;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'plugin.Notifications.Notifications',
        'plugin.Notifications.Notifiables',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Notifications') ? [] : ['className' => NotificationsTable::class];
        $this->Notifications = $this->getTableLocator()->get('Notifications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Notifications);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \Notifications\Model\Table\NotificationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \Notifications\Model\Table\NotificationsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
