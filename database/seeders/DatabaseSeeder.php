<?php

namespace Database\Seeders;

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
        $this->call(PlanTableSeeder::class);
        $this->command->info('Plan table seeded!');

        $this->call(StateTableSeeder::class);
        $this->command->info('State table seeded!');

        $this->call(CityTableSeeder::class);
        $this->command->info('City table seeded!');

        $this->call(ClientTableSeeder::class);
        $this->command->info('Client table seeded!');
    }
}
