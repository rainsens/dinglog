<?php

namespace Rainsens\Dinglog\Facades;

use Illuminate\Support\Facades\Facade;

class Dinglog extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'dinglog';
	}
}
