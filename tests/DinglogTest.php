<?php

namespace Rainsens\Dinglog\Tests;

use Rainsens\Dinglog\Supports\Ding;
use AlibabaCloud\SDK\Dingtalk\Voauth2_1_0\Dingtalk;

class DinglogTest extends TestCase
{
	/** @test */
	public function can_get_ding_talk_client()
	{
		$client = Ding::authClient();
		$this->assertInstanceOf(DingTalk::class, $client);
	}
	
	/** @test */
	public function can_get_ding_talk_token()
	{
		$token = Ding::token();
		$this->assertTrue((bool)$token);
	}
}
