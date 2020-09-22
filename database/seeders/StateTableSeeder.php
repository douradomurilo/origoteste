<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StateTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('states')->delete();
        
        State::create(['uf' => 'AC',]);
        State::create(['uf' => 'AL',]);
        State::create(['uf' => 'AM',]);
        State::create(['uf' => 'AP',]);
        State::create(['uf' => 'BA',]);
        State::create(['uf' => 'CE',]);
        State::create(['uf' => 'DF',]);
        State::create(['uf' => 'ES',]);
        State::create(['uf' => 'GO',]);
        State::create(['uf' => 'MA',]);
        State::create(['uf' => 'MG',]);
        State::create(['uf' => 'MS',]);
        State::create(['uf' => 'MT',]);
        State::create(['uf' => 'PA',]);
        State::create(['uf' => 'PB',]);
        State::create(['uf' => 'PE',]);
        State::create(['uf' => 'PI',]);
        State::create(['uf' => 'PR',]);
        State::create(['uf' => 'RJ',]);
        State::create(['uf' => 'RN',]);
        State::create(['uf' => 'RO',]);
        State::create(['uf' => 'RR',]);
        State::create(['uf' => 'RS',]);
        State::create(['uf' => 'SC',]);
        State::create(['uf' => 'SE',]);
        State::create(['uf' => 'SP',]);
        State::create(['uf' => 'TO',]);
    }
}