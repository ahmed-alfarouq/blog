<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register('App\Providers\FakerServiceProvider');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::automaticallyEagerLoadRelationships();
        RateLimiter::for('auth', function (Request $request) {
            return Limit::perMinute(3)->by($request->user()?->id ?: $request->ip())->response(function (Request $request, array $headers) {
                return back()->withErrors([
                    'login' => 'Too many attempts. Try again after 1 minute.'
                ]);
            });
        });
    }
}
