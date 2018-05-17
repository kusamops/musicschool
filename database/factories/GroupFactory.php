<?php

use Faker\Generator as Faker;

$factory->define(App\Group::class, function (Faker $faker) {
    return [
        'teacher_id' => factory(App\Teacher::class)->create()->id
    ];
});
