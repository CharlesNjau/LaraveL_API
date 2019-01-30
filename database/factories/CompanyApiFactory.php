<?php

use Faker\Generator as Faker;

$factory->define(App\CompanyData::class, function (Faker $faker) {
    return [
        //
        'first_name'=>$faker->text(10),
        'last_name'=>$faker->text(10),
        'compnay_bio'=>$faker->text(10),
        'web_site'=>$faker->text(15),
        'title'=>$faker->text(10)
    ];
});
