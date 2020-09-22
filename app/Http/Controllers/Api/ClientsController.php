<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Client;
use App\Models\City;
use App\Models\State;
use App\Models\Plan;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return response()->json($clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:2'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $client = new Client;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->birthdate = $request->birthdate;

        $state = State::where('uf', $request->state)->first();
        if (!isset($state->id))
            return response()->json(['error' => 'Estado inválido']);

        $city = City::where([['name', '=', $request->city], ['state_id', '=', $state->id]])->first();
        if (!isset($city->id))
            return response()->json(['error' => 'Cidade inválida']);

        $client->city_id = $city->id;
        $client->save();

        return response()->json($client);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);

        if ($client)
            return response()->json($client);

        return response()->json(['error' => 'Cliente não encontrado']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'email' => 'email',
            'city' => 'string|max:255',
            'state' => 'string|max:2'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $client = Client::find($id);

        if (!$client)
            return response()->json(['error' => 'Cliente não encontrado']);

        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->birthdate = $request->birthdate;

        $state = State::where('uf', $request->state)->first();
        if (!isset($state->id))
            return response()->json(['error' => 'Estado inválido']);

        $city = City::where([['name', '=', $request->city], ['state_id', '=', $state->id]])->first();
        if (!isset($city->id))
            return response()->json(['error' => 'Cidade inválida']);

        $client->city_id = $city->id;
        $client->save();

        return response()->json($client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);

        if ($client) {
            // busca pelo plano Free
            $free_plan = Plan::where('fee', 0)->first();

            // testa se o cliente é de SP e possui o plano Free
            if (($client->city->state->uf == 'SP') && ($client->plans->contains($free_plan->id)))
                return response()->json(['message' => 'Este cliente não pode ser deletado por ser de SP e possuir o plano gratuito']);
            
            $client->delete();
            
            return response()->json(['message' => 'Cliente deletado com sucesso!']);
        }

        return response()->json(['error' => 'Cliente não encontrado']);
    }

    public function showPlans($id)
    {
        $client = Client::find($id);

        if (!$client)
            return response()->json(['error' => 'Cliente não encontrado']);

        return response()->json($client->plans()->get());
    }

    public function addPlan(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'plan' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $client = Client::find($id);

        if (!$client)
            return response()->json(['error' => 'Cliente não encontrado']);

        $plan = Plan::find($request->plan);

        if (!$plan)
            return response()->json(['error' => 'Plano não encontrado']);

        $client->plans()->detach($plan->id);
        $client->plans()->attach($plan->id);

        return response()->json($client->plans()->get());
    }

    public function removePlan(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'plan' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $client = Client::find($id);

        if (!$client)
            return response()->json(['error' => 'Cliente não encontrado']);

        $plan = Plan::find($request->plan);

        if (!$plan)
            return response()->json(['error' => 'Plano não encontrado']);

        $client->plans()->detach($plan->id);

        return response()->json($client->plans()->get());
    }
}
