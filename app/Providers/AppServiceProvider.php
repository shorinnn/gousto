<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Recipe\RecipeInterface;
use App\Repositories\Recipe\RecipeEloquentRepository;

use App\Repositories\RecipeRating\RecipeRatingInterface;
use App\Repositories\RecipeRating\RecipeRatingEloquentRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RecipeInterface::class, RecipeEloquentRepository::class);

        $this->app->bind(RecipeRatingInterface::class, RecipeRatingEloquentRepository::class);
    }
}
