<?php

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {

    return [
        'title' => $faker->sentence(8, true),
        'body' => $faker->text(200),
    ];

});
