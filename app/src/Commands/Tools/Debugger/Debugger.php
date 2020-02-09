<?php declare(strict_types=1);

namespace h4kuna\Cli\App\Commands\Tools\Debugger;

use h4kuna\Cli\App\Tools\Debugger AS AppDebugger;
use Symfony\Component\Console\Command\Command;

abstract class Debugger extends Command
{
	/** @var AppDebugger */
	protected $debugConfig;


	public function __construct(AppDebugger $debugConfig)
	{
		parent::__construct();
		$this->debugConfig = $debugConfig;
	}

}
