<?php

namespace h4kuna\Cli\App\Commands\Tools\Debugger;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Status extends Debugger
{
	protected function configure()
	{
		$this->setName('tools:debugger:status');
	}


	protected function execute(InputInterface $input, OutputInterface $output)
	{
		if ($this->debugConfig->isEnabled()) {
			$output->writeln('Is enabled.');
		} else {
			$output->writeln('Is disabled.');
		}
	}

}
