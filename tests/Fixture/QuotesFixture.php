<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuotesFixture
 */
class QuotesFixture extends TestFixture
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
                'id' => 1,
                'weight' => 1,
                'length' => 1,
                'width' => 1,
                'height' => 1,
                'volumetric_weight' => 1,
                'billable_weight' => 1,
                'cost' => 1,
                'carrier' => 'Lorem ipsum dolor sit amet',
                'speed' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
