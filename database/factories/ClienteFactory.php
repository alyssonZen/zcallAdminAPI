<?php

use Faker\Generator as Faker;

$factory->define(App\Clientes::class, function (Faker $faker) {
    return [
        'cliente' => $faker->company,
        'cpf_cnpj' => $faker->numerify('##.###.###/00##-##'),
        'insc_estadual' => $faker->numerify('########'),
        'login' => $faker->userName,
        'senha' => $faker->password,
        'banco' => $faker->numerify('zcall##'),
    ];
});
