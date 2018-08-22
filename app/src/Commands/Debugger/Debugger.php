<?php

namespace h4kuna\Cli\App\Commands\Debugger;

use h4kuna\Cli\App\Debug\Config;
use Symfony\Component\Console\Command\Command;

abstract class Debugger extends Command
{
	/** @var Config */
	protected $debugConfig;


	public function __construct(Config $debugConfig)
	{
		parent::__construct();
		$this->debugConfig = $debugConfig;
	}

}
