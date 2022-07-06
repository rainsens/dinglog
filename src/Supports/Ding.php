<?php

namespace Rainsens\Dinglog\Supports;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\GuzzleException;

class Ding
{
	const MSG_TEXT = 'text';
	const MSG_LINK= 'link';
	const MSG_MARKDOWN = 'markdown';
	
	protected static $hook = "https://oapi.dingtalk.com/robot/send";
	
	protected static function uri()
	{
		return self::$hook . '?access_token='. config('dinglog.token');
	}
	
	public static function pushText($content)
	{
		$http = new Client();
		
		$data = [
			'msgtype' => self::MSG_TEXT,
			self::MSG_TEXT => ['content' => $content]
		];
		
		try {
			
			$http->post(self::uri(), [
				'headers' => ['content-type' => 'application/json'],
				'body' => json_encode($data)
			]);
			
		} catch (GuzzleException $exception) {
			Log::debug($exception->getMessage());
		}
	}
	
	public static function pushLink($title, $text, $url, $pic = null)
	{
		$http = new Client();
		
		$data = [
			'msgtype' => self::MSG_LINK,
			self::MSG_LINK => [
				'title' => $title,
				'text' => $text,
				'picUrl' => $pic,
				'messageUrl' => $url,
			]
		];
		
		try {
			
			$http->post(self::uri(), [
				'headers' => ['content-type' => 'application/json'],
				'body' => json_encode($data)
			]);
			
		} catch (GuzzleException $exception) {
			Log::debug($exception->getMessage());
		}
	}
	
	public static function pushMarkdown($title, $text)
	{
		$http = new Client();
		
		$data = [
			'msgtype' => self::MSG_MARKDOWN,
			self::MSG_MARKDOWN => [
				'title' => $title,
				'text' => $text,
			]
		];
		
		try {
			
			$http->post(self::uri(), [
				'headers' => ['content-type' => 'application/json'],
				'body' => json_encode($data)
			]);
			
		} catch (GuzzleException $exception) {
			Log::debug($exception->getMessage());
		}
	}
	
	public static function pushException($fullUrl, $msg, $file, $code, $line, $trace)
	{
		$content = "URL: $fullUrl\nMessage: $msg\nFile: $file\nCode: $code\nLine: $line\nTrace: $trace";
		self::pushText($content);
	}
}
