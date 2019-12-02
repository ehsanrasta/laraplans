<?php

use EhsanRasta\Laraplans\Models\Plan;
use EhsanRasta\Laraplans\Tests\Models\User;
use EhsanRasta\Laraplans\Models\PlanSubscription;

$factory->define(PlanSubscription::class, function (Faker\Generator $faker) {
    return [
        'subscribable_id' => factory(User::class)->create()->id,
        'subscribable_type' => User::class,
        'plan_id' => factory(Plan::class)->create()->id,
        'name' => $faker->word
    ];
});
