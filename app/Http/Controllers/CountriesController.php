<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Resources\CountriesResource;

class CountriesController extends Controller
{
    public function __invoke()
    {
        return CountriesResource::collection(Country::all());
    }
}
