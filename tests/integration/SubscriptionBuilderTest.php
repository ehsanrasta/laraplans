<?php

namespace EhsanRasta\Laraplans\Tests\Integration\Models;

use EhsanRasta\Laraplans\Models\Plan;
use EhsanRasta\Laraplans\Tests\TestCase;
use EhsanRasta\Laraplans\Tests\Models\User;
use EhsanRasta\Laraplans\SubscriptionBuilder;

class SubscriptionBuilderTest extends TestCase
{
    /**
     * Can create new user subscription.
     *
     * @test
     * @return void
     */
    public function it_can_create_new_subscriptions()
    {
        $user = User::create([
            'email' => 'ehsan@email.dev',
            'name' => 'Ehsan',
            'password' => 'password'
        ]);

        $plan = Plan::create([
            'name' => 'Pro',
            'description' => 'Pro plan',
            'price' => 9.99,
            'interval' => 'month',
            'interval_count' => 1,
            'trial_period_days' => 15,
        ]);

        // Create Subscription
        $user->newSubscription('main', $plan)->create();
        $user->newSubscription('second', $plan)->create([
            'name' => 'override' // test if data can be override
        ]);

        $this->assertEquals(2, $user->subscriptions->count());
        $this->assertEquals('main', $user->subscription('main')->name);
        $this->assertEquals('override', $user->subscription('override')->name);
        $this->assertTrue($user->subscribed('main'));
        $this->assertTrue($user->subscribed('override'));
    }
}
