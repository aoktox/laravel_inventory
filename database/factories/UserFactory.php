<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('rahasia)'),
        'remember_token' => str_random(10),
        'is_admin'=>false
    ];
});

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'name' => 'Item - '.str_random(5),
        'desc' => $faker->text,
        'qty' => $faker->numberBetween(0,100),
        'price' => $faker->numberBetween(500000,1000000),
        'purchased_at'=> $faker->dateTime,
        'status' => rand(1,2)
    ];
});

$factory->define(App\Transaction::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::inRandomOrder()->first()->id,
        'submitted_at'=>\Carbon\Carbon::now()
    ];
});

$factory->define(App\TransactionDetail::class, function (Faker $faker) {
    return [
        'transaction_id' => \App\Transaction::inRandomOrder()->first()->id,
        'item_id' => \App\Item::inRandomOrder()->first()->id,
        'desc' => $faker->text(10),
        'qty' => rand(1,5)
    ];
});