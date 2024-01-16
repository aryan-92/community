<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            ['name' => 'Andaman and Nicobar Islands', 'status' => 'active'],
            ['name' => 'Andhra Pradesh', 'status' => 'active'],
            ['name' => 'Arunachal Pradesh', 'status' => 'active'],
            ['name' => 'Assam', 'status' => 'active'],
            ['name' => 'Bihar', 'status' => 'active'],
            ['name' => 'Chandigarh', 'status' => 'active'],
            ['name' => 'Chhattisgarh', 'status' => 'active'],
            ['name' => 'Dadra and Nagar Haveli', 'status' => 'active'],
            ['name' => 'Delhi', 'status' => 'active'],
            ['name' => 'Puducherry', 'status' => 'active'],
            ['name' => 'Goa', 'status' => 'active'],
            ['name' => 'Gujarat', 'status' => 'active'],
            ['name' => 'Haryana', 'status' => 'active'],
            ['name' => 'Himachal Pradesh', 'status' => 'active'],
            ['name' => 'Jharkhand', 'status' => 'active'],
            ['name' => 'Karnataka', 'status' => 'active'],
            ['name' => 'Kerala', 'status' => 'active'],
            ['name' => 'Lakshadweep', 'status' => 'active'],
            ['name' => 'Madhya Pradesh', 'status' => 'active'],
            ['name' => 'Maharashtra', 'status' => 'active'],
            ['name' => 'Manipur', 'status' => 'active'],
            ['name' => 'Meghalaya', 'status' => 'active'],
            ['name' => 'Mizoram', 'status' => 'active'],
            ['name' => 'Nagaland', 'status' => 'active'],
            ['name' => 'Odisha', 'status' => 'active'],
            ['name' => 'Punjab', 'status' => 'active'],
            ['name' => 'Rajasthan', 'status' => 'active'],
            ['name' => 'Sikkim', 'status' => 'active'],
            ['name' => 'Tamil Nadu', 'status' => 'active'],
            ['name' => 'Telangana', 'status' => 'active'],
            ['name' => 'Tripura', 'status' => 'active'],
            ['name' => 'Uttar Pradesh', 'status' => 'active'],
            ['name' => 'Uttarakhand', 'status' => 'active'],
            ['name' => 'West Bengal', 'status' => 'active'],
            ['name' => 'Jammu & Kashmir', 'status' => 'active'],

            // Add more states if needed
        ];

        // Insert states into the 'states' table
        DB::table('states')->insert($states);
    }
}
