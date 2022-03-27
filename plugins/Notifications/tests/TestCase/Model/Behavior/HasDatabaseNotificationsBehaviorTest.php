<?php
declare(strict_types=1);

namespace Notifications\Test\TestCase\Model\Behavior;

use Cake\ORM\Table;
use Cake\TestSuite\TestCase;
use Notifications\Model\Behavior\HasDatabaseNotificationsBehavior;

/**
 * Notifications\Model\Behavior\HasDatabaseNotificationsBehavior Test Case
 */
class HasDatabaseNotificationsBehaviorTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Notifications\Model\Behavior\HasDatabaseNotificationsBehavior
     */
    protected $HasDatabaseNotifications;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $table = new Table();
        $this->HasDatabaseNotifications = new HasDatabaseNotificationsBehavior($table);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->HasDatabaseNotifications);

        parent::tearDown();
    }
}
