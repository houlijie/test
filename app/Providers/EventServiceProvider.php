<?php

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
        
        'App\Events\UserCreateEvent' => [ 
            'App\Listeners\UserCreateListenser',
        ],

        'App\Events\ArticleCreateEvent' => [ 
            'App\Listeners\ArticleCreateListenser',
        ],
    ];
}
