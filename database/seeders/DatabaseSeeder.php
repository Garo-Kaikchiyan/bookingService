<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Employee::factory(10)->create();
        $offices = \App\Models\Office::factory(5)->create();
        foreach ($offices as $office) {
            \App\Models\OfficeSeat::factory(rand(4,8))->create(['office_id' => $office->id]);
        }

        $bookingTypeNames = ['All day', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'];
        foreach ($bookingTypeNames as $typeName) {
            \App\Models\BookingType::factory()->create(['name' => $typeName]);
        }
    }
}
