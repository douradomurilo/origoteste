<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'city_id',
        'birthdate',
    ];

    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'client_plan');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
}
