<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create(['name' => 'Apple', 'city_id' => 1]);
        Company::create(['name' => 'Microsoft', 'city_id' => 2]);
        Company::create(['name' => 'Facebook', 'city_id' => 3]);
    }
}
