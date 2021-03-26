<?php

namespace uft\honeybader_magento2\Plugin;

use Honeybadger\Honeybadger;

class Http
{
	public function aroundCatchException($subject, $callable, $bootstrap, $exception)
	{
		$callable($bootstrap, $exception);
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$deploymentConfig = $objectManager->get(\Magento\Framework\App\DeploymentConfig::class); 
		$config = $deploymentConfig->get('honeybadger');
		$hb = new Honeybadger($config);
		$hb->notify($exception);
	}
}