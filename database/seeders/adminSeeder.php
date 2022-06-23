<?php

namespace Database\Seeders;
use Faker\Factory;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
{
    // /**
    //    * @return void
    //  */
    public function run()
    {
        //
        Admin::factory()->count(1)->create();
    }
}
