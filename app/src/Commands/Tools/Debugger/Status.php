<?php declare(strict_types=1);

namespace h4kuna\Cli\App\Commands\Tools\Debugger;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Status extends Debugger
{

	protected function configure(): void
	{
		$this->setName('tools:debugger:status');
	}


	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		if ($this->debugConfig->isEnabled()) {
			$output->writeln('Is enabled.');
		} else {
			$output->writeln('Is disabled.');
		}
		return 0;
	}

}
