<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Resources\CitiesResource;

class CitiesController extends Controller
{
    public function index(Country $country)
    {
        return CitiesResource::collection(
            City::where('country_id', $country->id)->get()
        );
    }
}
