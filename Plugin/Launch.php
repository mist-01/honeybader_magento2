<?php

namespace uft\honeybader_magento2\Plugin;

use Exception;
use Honeybadger\Honeybadger;
use uft\honeybader_magento2\Reporter;

use Magento\Framework\AppInterface;
use RuntimeException;

class Launch
{

    protected $reporter;
	public function __construct(Reporter $reporter)
	{
		$this->reporter = $reporter;
	}

    public function aroundLaunch(AppInterface $subject, callable $proceed)
    {
        // We need this method since aroundException in Http doesn't appear to catch Errors, where as this does:
        try {
            return $proceed();
        } catch (\Throwable $ex) {
            try {
                $this->reporter->reportException($ex);
            } catch (\Throwable $e) {
                // fail silently if honeybadger isn't working
            }
            if ($ex instanceof Exception) {
                throw $ex;
            } else {
                throw new RuntimeException($ex->getMessage(), $ex->getCode(), $ex);
            }
        }
    }
}
