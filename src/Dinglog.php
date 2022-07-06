<?php

namespace Rainsens\Dinglog;

use Rainsens\Dinglog\Jobs\DinglogLinkJob;
use Rainsens\Dinglog\Jobs\DinglogTextJob;
use Rainsens\Dinglog\Jobs\DinglogMarkdownJob;
use Rainsens\Dinglog\Jobs\DinglogExceptionJob;

class Dinglog
{
	public function text($content)
	{
		dispatch(new DinglogTextJob($content));
	}
	
	public function link($title, $text, $url, $pic = null)
	{
		dispatch(new DinglogLinkJob($title, $text, $url, $pic));
	}
	
	public function markdown($title, $text)
	{
		dispatch(new DinglogMarkdownJob($title, $text));
	}
	
	public function exception($msg, $file, $code, $line, $trace)
	{
		$fullUrl = app('request')->fullUrl();
		dispatch(new DinglogExceptionJob($fullUrl, $msg, $file, $code, $line, $trace));
	}
}
