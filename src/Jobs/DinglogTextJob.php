<?php

namespace Rainsens\Dinglog\Jobs;

use Illuminate\Bus\Queueable;
use Rainsens\Dinglog\Supports\Ding;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DinglogTextJob implements ShouldQueue
{
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
	
	private $content;
	
	public function __construct($content)
	{
		$this->content = $content;
	}
	
	public function handle()
	{
		Ding::pushText($this->content);
	}
}
