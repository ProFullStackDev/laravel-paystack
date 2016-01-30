<?php

namespace Unicodeveloper\Paystack;

use Illuminate\Support\ServiceProvider;

class PaystackServiceProvider extends ServiceProvider {

  /*
   * Indicates if loading of the provider is deferred.
   *
   * @var bool
   */
  protected $defer = false;

  /**
   * Publishes all the config file this package needs to function
   * @return void
   */
  public function boot()
  {
        $config = realpath(__DIR__.'/../resources/config/paystack.php');

        $this->publishes([
            $config => config_path('paystack.php')
        ]);
  }

  /**
   * Register the application services.
   *
   * @return void
   */
  public function register()
  {
        $this->app->bind('laravel-paystack', function() {

          return new Paystack;

        });
  }

  /**
   * Get the services provided by the provider
   * @return array
   */
  public function provides()
  {
      return ['laravel-paystack'];
  }
}