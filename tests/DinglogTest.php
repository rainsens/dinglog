<?php

namespace Rainsens\Dinglog\Tests;

use PHPUnit\Framework\TestCase;

class DinglogTest extends TestCase
{
	/** @test */
	public function can_get_ding_talk_token()
	{
		$accessToken = new MockedAccessToken();
		$this->assertEquals('mocked_token', $accessToken->token());
	}
	
	/** @test */
	public function can_get_ding_talk_token_string()
	{
	
	}
}
