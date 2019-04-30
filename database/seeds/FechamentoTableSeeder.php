<?php

use Illuminate\Database\Seeder;

class FechamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Fechamento::class,20)->create();

    }
}
