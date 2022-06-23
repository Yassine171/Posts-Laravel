<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        post::factory(50)->create();
    }
}
