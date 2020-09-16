<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'publish_at' => $faker->date('Y-m-d H:i:s'),
        'title' => $faker->word,
        'alias' => $faker->word,
        'description' => $faker->word,
        'body' => $faker->text,
        'category_id' => $faker->randomDigitNotNull,
        'active' => $faker->word
    ];
});
