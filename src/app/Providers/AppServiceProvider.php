<?php

namespace App\Providers;

use App\Http\Controllers\PostController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
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

        View::composer(['layouts.sidebar-left', 'components.posts.post-form'], function ($view) {
            $categories = Cache::remember('sidebar_categories_' . Auth::id(), now()->addHours(24), function () {
                return Category::select('id', 'name', 'slug')
                    ->withCount(['favorites' => function ($query) {
                        $query->where('user_id', Auth::id());
                    }])
                    ->get()
                    ->map(function ($category) {
                        $category->is_favorited = $category->favorites_count > 0;
                        return $category;
                    });
            });

            $view->with('categories', $categories);
        });

        View::composer('layouts.sidebar-right', function ($view) {
            $popularPosts = app(PostController::class)->getPopularPosts();
            $view->with('popularPosts', $popularPosts);
        });
    }
}
