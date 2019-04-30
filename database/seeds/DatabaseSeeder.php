<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
//            UsersTableSeeder::class,
            AssuntosTableSeeder::class,
            DepartamentoTableSeeder::class,
            ExecucaoTableSeeder::class,
            FechamentoTableSeeder::class,
            LinkTableSeeder::class,
            FluxoTableSeeder::class
        ]);
    }
}
