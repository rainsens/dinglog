<?php

namespace Rainsens\Dinglog\Jobs;

use Illuminate\Bus\Queueable;
use Rainsens\Dinglog\Supports\Ding;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;

class DinglogMarkdownJob implements ShouldQueue
{
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
	
	private $title;
	private $text;
	
	public function __construct($title, $text)
	{
		$this->title = $title;
		$this->text = $text;
	}
	
	public function handle()
	{
		Ding::pushMarkdown($this->title, $this->text);
	}
}
