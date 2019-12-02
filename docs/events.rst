Events
======

The following are the events fired by the package:

- ``EhsanRasta\Laraplans\Events\SubscriptionCreated``: Fired when a subscription is created.
- ``EhsanRasta\Laraplans\Events\SubscriptionRenewed``: Fired when a subscription is renewed using the ``renew()`` method.
- ``EhsanRasta\Laraplans\Events\SubscriptionCanceled``: Fired when a subscription is canceled using the ``cancel()`` method.
- ``EhsanRasta\Laraplans\Events\SubscriptionPlanChanged``: Fired when a subscription's plan is changed; it will be fired once the ``PlanSubscription`` model is saved. Plan change is determined by comparing the original and current value of ``plan_id``.