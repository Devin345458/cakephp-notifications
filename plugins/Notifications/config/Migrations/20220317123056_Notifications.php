<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Notifications extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('notifications', ['id' => false, 'primary_key' => ['id']]);
        $table->addColumn('id', 'uuid', [
            'null' => false,
        ]);
        $table->addColumn('type', 'string', [
            'null' => false,
        ]);
        $table->addColumn('notificationable_id', 'string');
        $table->addColumn('notificationable_type', 'string');
        $table->addColumn('data', 'text');
        $table->addColumn('read_at', 'timestamp', [
            'null' => true,
        ]);
        $table->addTimestamps();
        $table->create();
    }
}
