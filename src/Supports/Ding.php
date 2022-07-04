<?php

namespace Rainsens\Dinglog\Supports;

use Exception;
use AlibabaCloud\Tea\Utils\Utils;
use Illuminate\Support\Facades\Log;
use Darabonba\OpenApi\Models\Config;
use Illuminate\Support\Facades\Cache;
use AlibabaCloud\Tea\Exception\TeaError;
use AlibabaCloud\SDK\Dingtalk\Voauth2_1_0\Dingtalk;
use AlibabaCloud\SDK\Dingtalk\Voauth2_1_0\Models\GetAccessTokenRequest;

class Ding
{
	public static $cacheKey = 'ding_token';
	
	public static function client()
	{
		$config = new Config([]);
		$config->protocol = "https";
		$config->regionId = "central";
		return new Dingtalk($config);
	}
	
	public static function token()
	{
		if ($token = Cache::get(self::$cacheKey)) {
			Log::debug("Get old ding token");
			return Cache::get(self::$cacheKey);
		}
		
		Log::debug("Get new ding token");
		
		$client = self::client();
		
		$request = new GetAccessTokenRequest([
			"appKey" => "dingv3tyjakgd8eary56",
			"appSecret" => "PoHokRDOVnBnW31J1EPnjEBnbKpYe4BxERL4JS2lMwhqlMyBbPLCdTtl3dSiZ6tM"
		]);
		
		try {
			
			$response = $client->getAccessToken($request);
			$content = $response->body;
			Cache::put(self::$cacheKey, $content->accessToken, $content->expireIn);
			
			return $content->accessToken;
			
		} catch (Exception $e) {
			if (!($e instanceof TeaError)) {
				$e = new TeaError([], $e->getMessage(), $e->getCode(), $e);
			}
			if (Utils::empty_($e->code) and !Utils::empty_($e->message)) {
				Log::debug($e->message);
			}
			
			return null;
		}
	}
}
