<?php

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;
    $name = $faker->name;

    return [
        'name' => $name,
        'email' => $faker->unique->safeEmail,
        'password' => $password ?: bcrypt('secret'),
        'slug' => str_slug($name),
        'remember_token' => str_random(60),
        'admin' => $faker->boolean(2),
        'moderator' => $faker->boolean(5),
        'body' => $faker->optional->paragraph,
        'phone' => $faker->optional->phoneNumber,
        'freelance' => $faker->boolean,
        'visible' => $faker->boolean(90),
        'karma' => $faker->numberBetween(0, 5000),
        'votes' => $faker->numberBetween(0, 5000),
        'visits' => $faker->numberBetween(0, 5000),
        'total_logins' => $faker->numberBetween(0, 200),
        'last_login' => $faker->optional->date,
        'portafolio' => $faker->optional->paragraph,
        'lookingfor' => $faker->optional->paragraph,
        'banned' => $faker->boolean(0.5),
        'unemployed' => $faker->boolean(10),
        'can_contact' => $faker->boolean,
        'alert_commercial' => $faker->boolean,
        'ip' => $faker->optional->ipv4,
        'company_name' => $faker->optional->company
    ];
});