<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\System\Module;

class ModuleTableSeeder extends Seeder
{
    public function run()
    {
        $data = file_get_contents("database/Queries/modules.json");
        $module = json_decode($data, true);
        foreach ($module as $value) {
            Module::create([
                'title' => $value['title'],
                'description' => $value['description'],
                'is_state' => $value['is_state'],
            ]);
        }
    }
}
