<?php declare(strict_types=1);

namespace h4kuna\Cli\App\Tools;

use Nette\Utils;

class Debugger
{
	/** @var string */
	private $debuggerFile;

	/** @var string */
	private $tempDir;


	public function __construct(string $debuggerFile, string $tempDir)
	{
		$this->debuggerFile = $debuggerFile;
		$this->tempDir = $tempDir;
	}


	public function enable(): void
	{
		touch($this->debuggerFile);
	}


	public function disable(): void
	{
		if ($this->isEnabled()) {
			unlink($this->debuggerFile);
			Utils\FileSystem::delete($this->tempDir);
		}
	}


	public function isEnabled(): bool
	{
		return is_file($this->debuggerFile);
	}

}
