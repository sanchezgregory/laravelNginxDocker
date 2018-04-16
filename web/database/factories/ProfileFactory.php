<?php

use App\Profile;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'profile' => $faker->text(200),
        'user_id' => $faker->unique()->randomElement(iterator_to_array(DB::table('users')->pluck('id'))),
        // 'user_id' => $faker->unique()->numberBetween($min = 1, $max = 10),
    ];
});
