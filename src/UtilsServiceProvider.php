<?php

namespace Masterei\Utils;

use Illuminate\Support\ServiceProvider;

class UtilsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('utility-cast', function() {
            return new Cast();
        });
    }

    public function boot(): void
    {

    }
}
