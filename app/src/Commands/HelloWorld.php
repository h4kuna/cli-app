<?php declare(strict_types=1);

namespace h4kuna\Cli\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class HelloWorld extends Command
{
	protected static $defaultName = 'hello:world';


	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$output->writeln('Hello world!');

		return 0;
	}

}
