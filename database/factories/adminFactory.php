<?php

namespace Database\Factories;

use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class adminFactory extends Factory
{
    // /**
    //  * Define the model's default state.
    //  *
    //  @return array
    // //  */
    protected $model = User::class;
    public function definition()
    {

            return [
                'name' => 'admin',
                'email' => 'admin@email.com',
                'is_admin'=>1,
                'email_verified_at' => now(),
                'password' =>Hash::make('admin'), // password
                'remember_token' => Str::random(10),
            ];

    }
}
