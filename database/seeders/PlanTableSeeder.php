<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('plans')->delete();
        
        Plan::create(['name' => 'Free', 'fee' => 0]);
        Plan::create(['name' => 'Basic', 'fee' => 100]);
        Plan::create(['name' => 'Plus', 'fee' => 187]);
    }
}