<?php

namespace App\Providers;

use Faker\Generator;
use FakerRestaurant\Provider\fr_FR\Restaurant;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Paginator::useBootstrapFive();
        if (class_exists(Generator::class)) {
            $this->app->extend(Generator::class, function (Generator $faker) {
                $faker->addProvider(new Restaurant($faker));

                return $faker;
            });
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
