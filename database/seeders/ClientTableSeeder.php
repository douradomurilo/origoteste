<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\City;
use App\Models\State;

class ClientTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('clients')->delete();

        $state = State::where('uf', 'SP')->first();
        $city = City::where([['name', '=', 'Araraquara'], ['state_id', '=', $state->id]])->first();
        Client::create(['name' => 'Claudianus Boast', 'email' => 'cboast0@fastcompany.com', 'phone' => '(19) 957645371', 'city_id' => $city->id, 'birthdate' => '1993-06-07']);

        $state = State::where('uf', 'SP')->first();
        $city = City::where([['name', '=', 'Limeira'], ['state_id', '=', $state->id]])->first();
        Client::create(['name' => 'Loni Jennions', 'email' => 'ljennions1@va.gov', 'phone' => '(19) 905613161', 'city_id' => $city->id, 'birthdate' => '1985-05-09']);

        $state = State::where('uf', 'SP')->first();
        $city = City::where([['name', '=', 'Araraquara'], ['state_id', '=', $state->id]])->first();
        Client::create(['name' => 'Margi Gilhouley', 'email' => 'mgilhouley2@telegraph.co.uk', 'phone' => '(19) 966290104', 'city_id' => $city->id, 'birthdate' => '1984-09-13']);

        $state = State::where('uf', 'SP')->first();
        $city = City::where([['name', '=', 'Rio Claro'], ['state_id', '=', $state->id]])->first();
        Client::create(['name' => 'Lexy Sprulls', 'email' => 'lsprulls3@moonfruit.com', 'phone' => '(19) 976121601', 'city_id' => $city->id, 'birthdate' => '1999-10-19']);

        $state = State::where('uf', 'SP')->first();
        $city = City::where([['name', '=', 'Rio Claro'], ['state_id', '=', $state->id]])->first();
        Client::create(['name' => 'Marie Shatliff', 'email' => 'mshatliff4@cbslocal.com', 'phone' => '(19) 991376354', 'city_id' => $city->id, 'birthdate' => '1990-07-20']);

        $state = State::where('uf', 'SP')->first();
        $city = City::where([['name', '=', 'Araraquara'], ['state_id', '=', $state->id]])->first();
        Client::create(['name' => 'Graig Mouncey', 'email' => 'gmouncey5@so-net.ne.jp', 'phone' => '(19) 941806149', 'city_id' => $city->id, 'birthdate' => '1990-03-27']);

        $state = State::where('uf', 'MG')->first();
        $city = City::where([['name', '=', 'Areado'], ['state_id', '=', $state->id]])->first();
        Client::create(['name' => 'Laurice Liger', 'email' => 'lliger0@php.net', 'phone' => '(35) 971740954', 'city_id' => $city->id, 'birthdate' => '1992-10-25']);

        $state = State::where('uf', 'MG')->first();
        $city = City::where([['name', '=', 'Belo Horizonte'], ['state_id', '=', $state->id]])->first();
        Client::create(['name' => 'Kendrick Sooper', 'email' => 'ksooper1@slate.com', 'phone' => '(31) 944324086', 'city_id' => $city->id, 'birthdate' => '1981-06-02']);

        $state = State::where('uf', 'MG')->first();
        $city = City::where([['name', '=', 'Belo Horizonte'], ['state_id', '=', $state->id]])->first();
        Client::create(['name' => 'Gordon Levington', 'email' => 'glevington2@hpost.com', 'phone' => '(31) 922405868', 'city_id' => $city->id, 'birthdate' => '1993-11-25']);

        $state = State::where('uf', 'MG')->first();
        $city = City::where([['name', '=', 'Areado'], ['state_id', '=', $state->id]])->first();
        Client::create(['name' => 'Noam Scolland', 'email' => 'nscolland3@mozilla.org', 'phone' => '(35) 996817669', 'city_id' => $city->id, 'birthdate' => '1999-12-31']);

        $state = State::where('uf', 'MG')->first();
        $city = City::where([['name', '=', 'Areado'], ['state_id', '=', $state->id]])->first();
        Client::create(['name' => 'Lindon Skehens', 'email' => 'lskehens4@npr.org', 'phone' => '(35) 967671104', 'city_id' => $city->id, 'birthdate' => '1985-01-10']);

        $state = State::where('uf', 'MG')->first();
        $city = City::where([['name', '=', 'Areado'], ['state_id', '=', $state->id]])->first();
        Client::create(['name' => 'Kimbra Rase', 'email' => 'krase5@topsy.com', 'phone' => '(35) 999428030', 'city_id' => $city->id, 'birthdate' => '1999-05-05']);

        $state = State::where('uf', 'MG')->first();
        $city = City::where([['name', '=', 'Belo Horizonte'], ['state_id', '=', $state->id]])->first();
        Client::create(['name' => 'Lorenzo Fisk', 'email' => 'lfisk6@businessweek.com', 'phone' => '(31) 912695467', 'city_id' => $city->id, 'birthdate' => '1985-12-22']);

        $state = State::where('uf', 'MG')->first();
        $city = City::where([['name', '=', 'Itapeva'], ['state_id', '=', $state->id]])->first();
        Client::create(['name' => 'Bourke Flavelle', 'email' => 'lfisk6@businessweek.com', 'phone' => '(35) 959386145', 'city_id' => $city->id, 'birthdate' => '1984-04-10']);

        $state = State::where('uf', 'MG')->first();
        $city = City::where([['name', '=', 'Itapeva'], ['state_id', '=', $state->id]])->first();
        Client::create(['name' => 'Curran McSharry', 'email' => 'cmcsharry8@webeden.co.uk', 'phone' => '(35) 902916131', 'city_id' => $city->id, 'birthdate' => '1983-01-15']);

        $state = State::where('uf', 'MG')->first();
        $city = City::where([['name', '=', 'Belo Horizonte'], ['state_id', '=', $state->id]])->first();
        Client::create(['name' => 'Aveline Dowtry', 'email' => 'adowtry9@miibeian.gov.cn', 'phone' => '(31) 945227500', 'city_id' => $city->id, 'birthdate' => '1994-12-23']);

        $state = State::where('uf', 'MG')->first();
        $city = City::where([['name', '=', 'Belo Horizonte'], ['state_id', '=', $state->id]])->first();
        Client::create(['name' => 'John Sebastian', 'email' => 'jsebastiana@cbslocal.com', 'phone' => '(31) 907366740', 'city_id' => $city->id, 'birthdate' => '1998-04-06']);

        $state = State::where('uf', 'MG')->first();
        $city = City::where([['name', '=', 'Itapeva'], ['state_id', '=', $state->id]])->first();
        Client::create(['name' => 'Reynolds Greenan', 'email' => 'rgreenanb@bloomberg.com', 'phone' => '(35) 923551410', 'city_id' => $city->id, 'birthdate' => '1985-07-19']);
    }
}