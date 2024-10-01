<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;
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

        View::composer(['layouts.sidebar-left', 'components.posts.create'], function ($view) {
            $categories = Cache::remember('sidebar_categories', now()->addHours(24), function () {
                return Category::select('id', 'name')->get();
            });

            $view->with('categories', $categories);
        });
    }
}
