<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Pastor::class, function (Faker\Generator $faker) {
    $users = App\User::pluck('id')->toArray();
    return [
        'name' => $faker->unique()->name,
        'description' => $faker->text,
        'user_id' => $faker->randomElement($users)
    ];
});
- See more at: https://arjunphp.com/create-rest-laravel-framework/#sthash.9o15kjiN.dpuf
