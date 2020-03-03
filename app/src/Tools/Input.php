<?php declare(strict_types=1);

namespace h4kuna\Cli\App\Tools;

use h4kuna\Cli\App\Exceptions\InvalidStateException;
use Symfony\Component\Console\Input\InputInterface;

final class Input
{

	public static function toBool(InputInterface $input, string $name): bool
	{
		$value = $input->getOption($name);
		if (!is_bool($value)) {
			throw new InvalidStateException(sprintf('Value must be bool for option: "%s".', $name));
		}
		return $value;
	}


	public static function fileContent(string $filename): string
	{
		$content = file_get_contents($filename);
		if ($content === FALSE) {
			throw new InvalidStateException(sprintf('File is not readable "%s".', $filename));
		}
		return $content;
	}

}
