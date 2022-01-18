<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];
    public function boot(){
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../../resources/views','event');
          
        $this->publishes([__DIR__.'/assets' => public_path('vendor/event'),], 'public');
        $this->publishes([__DIR__.'/views' => resource_path('views/vendor/event')]);
         
      }
    
}
