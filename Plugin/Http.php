<?php

namespace uft\honeybader_magento2\Plugin;

use Honeybadger\Honeybadger;
use uft\honeybader_magento2\Reporter;

class Http
{
	protected $reporter;
	public function __construct(Reporter $reporter)
	{
		$this->reporter = $reporter;
	}
	public function aroundCatchException($subject, $callable, $bootstrap, $exception)
	{
		$callable($bootstrap, $exception);
		$this->reporter->reportException($exception);
	}
}