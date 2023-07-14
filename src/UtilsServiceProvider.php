<?php

namespace Masterei\Utils;

use Illuminate\Support\ServiceProvider;

class UtilsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->bindFacades([
            'utility-cast' => Cast::class,
            'utility-regex' => Regex::class,

        ]);
    }

    public function boot(): void
    {

    }

    protected function bindFacades(array $classes = []): void
    {
        foreach ($classes as $key => $class){
            $this->app->bind($key, function () use ($class) {
                return new $class();
            });
        }
    }
}
