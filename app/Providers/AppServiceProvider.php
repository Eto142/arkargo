<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Named rate limiter for contact form to prevent abuse
        RateLimiter::for('contact', function (Request $request) {
            // Use a combined key of IP + email (when available) to be more granular
            $key = $request->ip();
            if ($request->filled('email')) {
                $key .= '|' . $request->input('email');
            }

            // Allow a reasonable number of submissions per hour per key
            return Limit::perHour(20)->by($key);
        });
    }
}
