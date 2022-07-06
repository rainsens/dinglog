<?php

namespace Rainsens\Dinglog\Providers;

use Rainsens\Dinglog\Dinglog;
use Illuminate\Support\ServiceProvider;

class DinglogServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->mergeConfigFrom(__DIR__.'/../../config/dinglog.php', 'dinglog');
		
		$this->app->bind('dinglog', function () {
			return new Dinglog();
		});
	}
	
	public function boot()
	{
		$this->publishes([__DIR__.'/../../config/dinglog.php' => config_path('dinglog.php')], 'config');
	}
}
