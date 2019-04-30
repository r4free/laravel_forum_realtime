<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Thread::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => implode(' ', $faker->paragraphs),
        'user_id' => 1
    ];
});

$factory->define(App\Reply::class, function (Faker $faker) {
    return [
        'body' => implode(' ', $faker->paragraphs),
    ];
});

$factory->define(\App\Departamento::class, function (Faker $faker) {
    return [
        'nome' => $faker->word.$faker->word,
    ];
});

$factory->define(\App\Assunto::class, function (Faker $faker) {
    return [
        'nome' => $faker->word.$faker->word,
    ];
});

$factory->define(\App\Execucao::class, function (Faker $faker) {
    return [
        'nome' => $faker->word.$faker->word,
    ];
});

$factory->define(\App\Fechamento::class, function (Faker $faker) {
    return [
        'nome' => $faker->word.$faker->word,
    ];
});

$factory->define(\App\Fluxo::class, function (Faker $faker) {
    return [
        'fechamento_id' => random_int(1, 20),
        'assunto_id' => random_int(1, 20),
        'execucao_id' => random_int(1, 20),
        'departamento_id' => random_int(1, 5    ),
    ];
});

$factory->define(\App\Link::class, function (Faker $faker) {
    return [
        'nome' => $faker->word.$faker->word,
        'url' => $faker->url,
        'fechamento_id' => random_int(1, 20),
        'nova_aba' => random_int(0, 1)
    ];
});
