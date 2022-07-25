<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace    = 'App\Http\Controllers';
    protected $namespaceApi = 'App\Http\Controllers\Api';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapApiPedidos();
        $this->mapApiGenerales();
        $this->mapApiTercerosUsuarios();
        $this->mapFacturaElectronica();
        $this->mapWebRoutes();
        
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        /*Route::middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
            */

            Route::namespace($this->namespace)
                    ->middleware('api')
                    ->group( function() {
                            require base_path('routes/api.php');
            });  
    }

    protected function mapApiPedidos(){
         Route::middleware('api')
            ->namespace($this->namespaceApi)
            ->prefix('pedidos')
            ->group(base_path('routes/api/pedidos.php'));
    }

    protected function mapApiGenerales(){
        Route::middleware('api')
           ->namespace($this->namespaceApi)
           ->group(base_path('routes/api/generales.php'));
   }

   protected function mapApiTercerosUsuarios(){
    Route::middleware('api')
       ->namespace($this->namespaceApi)
       ->prefix('usuarios')
       ->group(base_path('routes/api/tercerosUsers.php'));
    }


    protected function mapFacturaElectronica(){
        Route::middleware('api')
           ->namespace($this->namespaceApi)
           ->prefix('invoices')
           ->group(base_path('routes/api/facuraElectronica.php'));
        }
 
}
