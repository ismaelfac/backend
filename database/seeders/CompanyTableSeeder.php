<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\System\Company;

class CompanyTableSeeder extends Seeder
{
    public function run()
    {
        $data = file_get_contents("database/Queries/companies.json");
        $company = json_decode($data, true);
        foreach ($company as $value) {
            Company::create([
                'person_id' => $value['person_id'],
                'state_company' => $value['state_company'],
            ]);
        }
    }
}
