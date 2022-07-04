<?php

namespace Rainsens\Dinglog\Providers;

use Rainsens\Dinglog\Dinglog;
use Illuminate\Support\ServiceProvider;

class DinglogServiceProvider extends ServiceProvider
{
	public function boot()
	{
	
	}
	
	public function register()
	{
		$this->app->bind('dinglog', function () {
			return new Dinglog();
		});
	}
}
