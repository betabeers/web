<?php

$factory->define(App\Models\Job::class, function (Faker\Generator $faker) {

    $title = $faker->sentence;

    return [
        'user_id' => function () {
            return factory(App\Models\User::class)->create()->id;
        },
        'title' => $title,
        'body' => $faker->paragraph,
        'featured' => $faker->boolean(30),
        'email' => $faker->safeEmail,
        'price' => $faker->randomElement(['10000€- 20000€', '15000€- 20000€', '15000€ - 25000€', '25000€ - 40000€', '30000€ - 60000€']),
        'visits' => $faker->randomNumber,
        'company' => $faker->company,
        'interested' => $faker->randomNumber,
        'visible' => $faker->boolean(90),
        'slug' => str_slug($title),
        'date_featured' => $faker->dateTimeBetween('-12 months', 'now'),
        'paid' => $faker->boolean(90),
        'url' => $faker->url,
        'tweeted' => $faker->randomNumber,
        'sent_feedback' => $faker->boolean
    ];
});
