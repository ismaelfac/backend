<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\System\Person;

class PersonTableSeeder extends Seeder
{
    public function run()
    {
        $data = file_get_contents("database/Queries/people.json");
        $person = json_decode($data, true);
        foreach ($person as $value) {
            Person::create([
                'type_dni' => $value['type_dni'],
                'dni' => $value['dni'],
                "business_name" => $value['business_name'],
                'first_name' => $value['first_name'],
                'last_name' => $value['last_name'],
                'slug' => $value['slug'],
                'phone' => $value['phone'],
                'landline' => $value['landline'],
                'email' => $value['email'],
                'address' => $value['address'],
                'country_id' => $value['country_id'],
                'departament_id' => $value['departament_id'],
                'municipality_id' => $value['municipality_id'],
                'location_id' => $value['location_id'],
                'neighborhood_id' => $value['neighborhood_id'],
                'latitude' => $value['latitude'],
                'longitude' => $value['longitude'],
                'birthdate' => $value['birthdate'],
                'state_people' => $value['state_people'],
            ]);
        }
    }
}
