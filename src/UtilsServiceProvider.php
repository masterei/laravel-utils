<?php

namespace Masterei\Utils;

use Illuminate\Support\ServiceProvider;

class UtilsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        BindFacade::bind($this, [
            'utility-cast' => Cast::class,

        ]);
    }

    public function boot(): void
    {

    }
}
