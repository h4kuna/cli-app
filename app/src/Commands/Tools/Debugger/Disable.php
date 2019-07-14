<?php

namespace h4kuna\Cli\App\Commands\Tools\Debugger;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Disable extends Debugger
{
	protected function configure()
	{
		$this->setName('tools:debugger:disable');
	}


	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$this->debugConfig->disable();
		$output->writeln('Now debugger is disabled.');
	}

}