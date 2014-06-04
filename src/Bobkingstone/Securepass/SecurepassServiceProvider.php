<?php namespace Bobkingstone\Securepass;

use Illuminate\Support\ServiceProvider;

/**
 * Class SecurepassServiceProvider
 * @package Bobkingstone\Securepass
 */
class SecurepassServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('bobkingstone/securepass');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app['Securepass'] = $this->app->share(function($app)
        {
            return new securepass;
        });

        $this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Securepass', 'Bobkingstone\Securepass\Facades\Securepass');
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('securepass');
	}

}
