<?php

namespace App\Providers;

use App\Http\Middleware\NoAuth;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $this->routes(function () {
            Route::prefix('doc')
                ->middleware(NoAuth::class)
                ->group(base_path('routes/doc.php'))
            ;
        });
    }
}
