<?php

namespace Rainsens\Dinglog\Jobs;

use Illuminate\Bus\Queueable;
use Rainsens\Dinglog\Supports\Ding;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DinglogExceptionJob implements ShouldQueue
{
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
	
	private $fullUrl;
	
	private $msg;
	private $file;
	private $code;
	private $line;
	private $trace;
	
	public function __construct($fullUrl, $msg, $file, $code, $line, $trace)
	{
		$this->fullUrl = $fullUrl;
		
		$this->msg = $msg;
		$this->file = $file;
		$this->code = $code;
		$this->line = $line;
		$this->trace = $trace;
	}
	
	public function handle()
	{
		Ding::pushException(
			$this->fullUrl,
			$this->msg,
			$this->file,
			$this->code,
			$this->line,
			$this->trace
		);
	}
}
