<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateQuotes extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     *
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('quotes');
        $table->addColumn('weight', 'float', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('length', 'float', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('width', 'float', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('height', 'float', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('volumetric_weight', 'float', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('billable_weight', 'float', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('cost', 'float', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('carrier', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('speed', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->create();
    }
}
