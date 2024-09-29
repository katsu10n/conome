<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        View::composer('layouts.app', function ($view) {
            $categories = Category::all()->map(function ($category) {
                return [
                    'name' => $category->name,
                    // 'url' => route('category.show', $category),
                    'url' => "",
                ];
            });

            $view->with('categories', $categories);
        });
    }
}
