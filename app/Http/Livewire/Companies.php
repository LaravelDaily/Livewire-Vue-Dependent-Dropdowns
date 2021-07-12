<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use Livewire\Component;

class Companies extends Component
{
    public $countries;
    public $cities;

    public $name;
    public $country;
    public $city;

    public function mount()
    {
        $this->countries = Country::all();
        $this->cities = collect();
    }

    public function render()
    {
        return view('livewire.companies', [
            'companies' => Company::with('city.country')->latest()->take(5)->get()
        ]);
    }

    public function updatedCountry($value)
    {
        $this->cities = City::where('country_id', $value)->get();
    }

    public function storeCompany()
    {
        $this->validate([
            'name' => 'required',
            'city' => 'required',
        ]);

        Company::create([
            'name' => $this->name,
            'city_id' => $this->city,
        ]);

        $this->name = '';
        $this->country = '';
        $this->city = '';
        $this->cities = collect();
    }
}
