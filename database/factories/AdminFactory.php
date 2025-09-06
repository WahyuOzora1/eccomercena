<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // return [
        //     'name' => 'Superadmin',
        //     'email' => 'superadmin@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => hash::make('superadmin123'), // password
        //     'remember_token' => Str::random(10),
        // ];
        return [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => hash::make('admin123'), // password
            'remember_token' => Str::random(10),
        ];
    }
}
