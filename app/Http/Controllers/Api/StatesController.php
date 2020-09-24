<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\State;

class StatesController extends Controller
{
    public function cities(State $state)
    {
        return response()->json($state->cities()->get());
    }
}
