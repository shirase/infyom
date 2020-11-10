<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Page;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        '_lft' => $faker->randomDigitNotNull,
        '_rgt' => $faker->randomDigitNotNull,
        'parent_id' => $faker->randomDigitNotNull,
        'title' => $faker->word,
        'slug' => $faker->word,
        'status' => $faker->word,
        'body' => $faker->text
    ];
});
