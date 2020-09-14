<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\System\Customer;

class CustomersTableSeeder extends Seeder
{
    public function run()
    {
        $data = file_get_contents("database/Queries/customers.json");
        $customer = json_decode($data, true);
        foreach ($customer as $value) {
            Customer::create([
                'person_id' => $value['person_id'],
                'state_customer' => $value['state_customer'],
            ]);
        }
    }
}
