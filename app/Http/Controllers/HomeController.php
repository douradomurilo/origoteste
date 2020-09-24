<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\State;
use App\Models\City;
use App\Models\Plan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clients = Client::all();

        return view('home', [
            'clients' => $clients
        ]);
    }

    public function editClient(Client $client)
    {
        $states = State::all();
        $cities = City::where('state_id', $client->city->state_id)->get();
        $plans = Plan::all();

        return view('client.edit', [
            'client' => $client,
            'states' => $states,
            'cities' => $cities,
            'plans' => $plans,
            'action' => 'edit'
        ]);
    }

    public function newClient()
    {
        $states = State::all();
        $plans = Plan::all();

        return view('client.edit', [
            'states' => $states,
            'plans' => $plans,
            'action' => 'new'
        ]);
    }
}
