<?php

namespace uft\honeybader_magento2;

use Honeybadger\Honeybadger;
use Throwable;

class Reporter
{
    /**
     * @var Honeybadger
     */
    public $honeyBadger;

	public function __construct(\Magento\Framework\App\DeploymentConfig $deploymentConfig)
	{
        $config = $deploymentConfig->get('honeybadger');
		$this->honeyBadger = new Honeybadger($config);
	}

    public function reportException(Throwable $exception)
	{
		$this->honeyBadger->notify($exception);
	}

}
