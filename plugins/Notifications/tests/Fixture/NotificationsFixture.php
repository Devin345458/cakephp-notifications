<?php
declare(strict_types=1);

namespace Notifications\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NotificationsFixture
 */
class NotificationsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => '0095ff58-274a-4aad-b49e-017d1f244d17',
                'type' => 'Lorem ipsum dolor sit amet',
                'notifiable_id' => 'Lorem ipsum dolor sit amet',
                'notifiable_type' => 'Lorem ipsum dolor sit amet',
                'data' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'read_at' => 1647521672,
                'created_at' => 1647521672,
                'updated_at' => 1647521672,
            ],
        ];
        parent::init();
    }
}
