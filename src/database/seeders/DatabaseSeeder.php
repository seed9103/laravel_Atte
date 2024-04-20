<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TimeStamp;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        TimeStamp::factory()->count(20)->create();
    }
}
