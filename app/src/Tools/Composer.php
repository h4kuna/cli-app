<?php declare(strict_types=1);

namespace h4kuna\Cli\App\Tools;

use function h4kuna\Cli\App\functions\execute;

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


	public function install()
	{
		if ($this->installMe()) {
			execute(sprintf('%s --working-dir="%s" install -qa', $this->composerPath, $this->rootDir));
			return TRUE;
		} else {
			return FALSE;
		}
	}


	private function installMe()
	{
		if (!is_file($this->composerPath)) {
			$composerDir = dirname($this->composerPath);
			$composerSetup = $composerDir . '/composer-setup.php';
			copy('https://getcomposer.org/installer', $composerSetup);
			if (hash_file('SHA384', $composerSetup) !== rtrim(file_get_contents('https://composer.github.io/installer.sig'))) {
				return FALSE;
			}
			execute(sprintf('php %s --install-dir="%s" --filename="%s"', $composerSetup, dirname($this->composerPath), basename($this->composerPath)));
			unlink($composerSetup);
		}
		return TRUE;
	}

}