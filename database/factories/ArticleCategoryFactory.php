<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ArticleCategory;
use Faker\Generator as Faker;

$factory->define(ArticleCategory::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'alias' => $faker->word
    ];
});
