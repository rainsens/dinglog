<?php

namespace Rainsens\Dinglog\Tests;

use Rainsens\Dinglog\Facades\Dinglog;
use Rainsens\Dinglog\Providers\DinglogServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
	public function setUp(): void
	{
		parent::setUp();
	}
	
	public function getPackageProviders($app)
	{
		return [
			DinglogServiceProvider::class,
		];
	}
	
	public function getPackageAliases($app)
	{
		return [
			'Dinglog' => Dinglog::class
		];
	}
	
	public function getEnvironmentSetUp($app)
	{
		config(['dinglog.app_key' => null]);
		config(['dinglog.app_secret' => null]);
		config(['dinglog.token_cache_key' => 'ding_token']);
	}
}
