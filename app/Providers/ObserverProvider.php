<?php

namespace App\Providers;

use App\Observers\LogObserver;
use App\Sections\Log\Models\Log;
use Illuminate\Support\ServiceProvider;

class ObserverProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Log::observe(LogObserver::class);
    }
}
