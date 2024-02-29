<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customuser;

class CustomuserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customuser::factory()->count(50)->create();
    }
}
