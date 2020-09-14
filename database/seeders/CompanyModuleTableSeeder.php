<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\System\CompanyModule;

class CompanyModuleTableSeeder extends Seeder
{
    public function run()
    {
        $data = file_get_contents("database/Queries/company_module.json");
        $company_module = json_decode($data, true);
        foreach ($company_module as $value) {
            CompanyModule::create([
                'company_id' => $value['company_id'],
                'module_id' => $value['module_id'],
            ]);
        }
    }
}
