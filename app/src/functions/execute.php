<?php declare(strict_types=1);

namespace h4kuna\Cli\App\functions;

use h4kuna\Cli\App\Exceptions\CommandException;

function execute(string $command): array
{
	exec($command, $output, $returnCode);
	if ($returnCode !== 0) {
		throw new CommandException(implode(PHP_EOL, $output), $returnCode);
	}
	return $output;
}


function executell(string $command): string
{
	$output = execute($command);
	return end($output);
}
