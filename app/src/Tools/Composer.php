<?php declare(strict_types=1);

namespace h4kuna\Cli\App\Tools;

use h4kuna\Cli\App\Exceptions\CommandException;

class Composer
{
	/** @var string */
	private $composerPath;

	/** @var string */
	private $rootDir;


	public function __construct(string $composerPath, string $rootDir)
	{
		$this->composerPath = $composerPath;
		$this->rootDir = $rootDir;
	}


	public function install(): bool
	{
		if (!$this->isComposerInstalled() && $this->downloadComposer()) {
			$this->composerInstall();
			return TRUE;
		}
		return FALSE;
	}


	private function downloadComposer(): bool
	{
		$composerDir = dirname($this->composerPath);
		$composerSetup = $composerDir . '/composer-setup.php';
		copy('https://getcomposer.org/installer', $composerSetup);
		if (hash_file('SHA384', $composerSetup) !== rtrim(file_get_contents('https://composer.github.io/installer.sig'))) {
			return FALSE;
		}

		$this->installComposer($composerSetup);
		unlink($composerSetup);
		return TRUE;
	}


	private function composerInstall(): void
	{
		self::execute(sprintf('"%s" --working-dir="%s" install -qa', $this->composerPath, $this->rootDir));
	}


	private function isComposerInstalled(): bool
	{
		return is_file($this->composerPath);
	}


	private function installComposer(string $composerSetup): void
	{
		self::execute(sprintf('php %s --install-dir="%s" --filename="%s"', $composerSetup, dirname($this->composerPath), basename($this->composerPath)));
	}


	private static function execute(string $command): array
	{
		exec($command, $output, $returnCode);
		if ($returnCode !== 0) {
			throw new CommandException(implode(PHP_EOL, $output), $returnCode);
		}
		return $output;
	}

}