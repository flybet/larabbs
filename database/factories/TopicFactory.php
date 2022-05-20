<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Topic::class, function (Faker $faker) {
    $sentence = $faker->word();
    $updated_at = $faker->dateTimeThisMonth();
    $created_at = $faker->dateTimeThisMonth($updated_at);
    return [
        'title' => $sentence,
        'body' => $faker->text(),
        'reply_count'=>0,
        'view_count'=>0,
        'last_reply_user_id'=>0,
        'order'=>0,
        'excerpt' => $sentence,
        'created_at' => $created_at,
        'updated_at' => $updated_at,
    ];
});
