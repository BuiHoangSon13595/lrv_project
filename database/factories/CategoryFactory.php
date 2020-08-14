<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $name = $faker->name;
    $slug = \Str::slug($name);
    return [
        'name' => $name,
        'slug' => $slug,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
