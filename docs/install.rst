Installation
============

Composer
--------

.. code-block:: bash

    $ composer require ehsanrasta/laraplans

Service Provider
----------------

Add ``EhsanRasta\Laraplans\LaraplansServiceProvider::class`` to your application service providers file: ``config/app.php``.

.. code-block:: php

    'providers' => [
        /**
         * Third Party Service Providers...
         */
        EhsanRasta\Laraplans\LaraplansServiceProvider::class,
    ]

Config File and Migrations
--------------------------

Publish package config file and migrations with the following command:

.. code-block:: bash

    php artisan vendor:publish --provider="EhsanRasta\Laraplans\LaraplansServiceProvider"

Then run migrations:

.. code-block:: bash

    php artisan migrate

Traits and Contracts
--------------------

Add ``EhsanRasta\Laraplans\Traits\PlanSubscriber`` trait and ``EhsanRasta\Laraplans\Contracts\PlanSubscriberInterface`` contract to your ``User`` model.

See the following example:

.. code-block:: php

    namespace App\Models;

    use Illuminate\Foundation\Auth\User as Authenticatable;
    use EhsanRasta\Laraplans\Contracts\PlanSubscriberInterface;
    use EhsanRasta\Laraplans\Traits\PlanSubscriber;

    class User extends Authenticatable implements PlanSubscriberInterface
    {
        use PlanSubscriber;
