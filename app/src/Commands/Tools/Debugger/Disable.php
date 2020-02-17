<?php declare(strict_types=1);

namespace h4kuna\Cli\App\Commands\Tools\Debugger;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Disable extends Debugger
{

	protected function configure()
	{
		$this->setName('tools:debugger:disable')
			->addOption('force', 'f', InputOption::VALUE_NONE, 'Force purge temp and log dirs.');
	}


	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$this->debugConfig->disable($input->getOption('force'));
		$output->writeln('Now debugger is disabled.');
		return 0;
	}

}
