<?php declare(strict_types=1);

namespace h4kuna\Cli\App\Commands\Tools\Debugger;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class Enable extends Debugger
{
	protected static $defaultName = 'tools:debugger:enable';


	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$this->debugConfig->enable();
		$output->writeln('Now debugger is enabled.');

		return 0;
	}

}
