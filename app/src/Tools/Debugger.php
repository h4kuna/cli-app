<?php declare(strict_types=1);

namespace h4kuna\Cli\App\Tools;

use Symfony\Component\Process\Process;

final class Debugger
{
	/** @var string */
	private $debuggerFile;

	/** @var string */
	private $tempDir;

	/** @var string */
	private $logDir;


	public function __construct(string $debuggerFile, string $tempDir, string $logDir)
	{
		$this->debuggerFile = $debuggerFile;
		$this->tempDir = $tempDir;
		$this->logDir = $logDir;
	}


	public function enable(): void
	{
		touch($this->debuggerFile);
	}


	public function disable(bool $purgeDirs): void
	{
		if ($this->isEnabled()) {
			unlink($this->debuggerFile);
			$this->clearTempAndLog();
		} elseif ($purgeDirs) {
			$this->clearTempAndLog();
		}
	}


	public function isEnabled(): bool
	{
		return is_file($this->debuggerFile);
	}


	private function clearTempAndLog(): void
	{
		Process::fromShellCommandline(sprintf("rm -r '%s'*", $this->tempDir . DIRECTORY_SEPARATOR))->mustRun();
		Process::fromShellCommandline(sprintf("find '%s' -type f -mtime +30 -delete", $this->logDir . DIRECTORY_SEPARATOR))->mustRun();
	}

}
