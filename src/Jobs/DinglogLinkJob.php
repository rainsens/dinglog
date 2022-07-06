<?php

namespace Rainsens\Dinglog\Jobs;

use Illuminate\Bus\Queueable;
use Rainsens\Dinglog\Supports\Ding;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DinglogLinkJob implements ShouldQueue
{
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
	
	private $title;
	private $text;
	private $url;
	
	private $pic;
	
	public function __construct($title, $text, $url, $pic = null)
	{
		$this->title = $title;
		$this->text = $text;
		$this->url = $url;
		$this->pic = $pic;
	}
	
	public function handle()
	{
		Ding::pushLink($this->title, $this->text, $this->url, $this->pic);
	}
}
