<?php declare(strict_types=1);

namespace h4kuna\Cli\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloWorld extends Command
{
	protected function configure()
	{
		$this->setName('hello:world');
	}


	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$output->writeln('Hello world!');
	}

}
