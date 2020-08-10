<?php declare(strict_types=1);

namespace h4kuna\Cli\App\Commands\Tools\Debugger;

use h4kuna\Cli\App\Tools\Input;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

final class Disable extends Debugger
{
	protected static $defaultName = 'tools:debugger:disable';


	protected function configure(): void
	{
		$this->addOption('force', 'f', InputOption::VALUE_NONE, 'Force purge temp and log dirs.');
	}


	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$this->debugConfig->disable(Input::toBool($input, 'force'));
		$output->writeln('Now debugger is disabled.');

		return self::SUCCESS;
	}

}
