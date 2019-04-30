<?php

use Illuminate\Database\Seeder;

class FluxoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(\App\Fluxo::class,50)->create();
    }
}
