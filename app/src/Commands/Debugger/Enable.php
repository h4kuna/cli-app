<?php

namespace h4kuna\Cli\App\Commands\Debugger;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Enable extends Debugger
{
	protected function configure()
	{
		$this->setName('debugger:enable');
	}


	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$this->debugConfig->enable();
		$output->writeln('Now debugger is enabled.');
	}

}
