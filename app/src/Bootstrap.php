<?php declare(strict_types=1);

namespace h4kuna\Cli\App;

use Nette;

final class Bootstrap
{

	public static function createContainer(): Nette\DI\Container
	{
		$tempDir = __DIR__ . '/../../temp';
		$logDir = $tempDir . '/log';
		$debuggerFile = __DIR__ . '/../config/debugger-enable';

		$configurator = new Nette\Configurator;

		if (is_file($debuggerFile)) {
			$configurator->setDebugMode(TRUE);
		}
		$configurator->enableTracy($logDir);
		$configurator->setTimeZone('Europe/Prague');
		$configurator->setTempDirectory($tempDir);
		$configurator->addConfig([
			'parameters' => [
				'debuggerFile' => $debuggerFile,
				'hostname' => php_uname('n'),
				'logDir' => $logDir,
			],
		]);

		$configurator->addConfig(__DIR__ . '/../config/config.neon');

		$localNeon = __DIR__ . '/../config/config.local.neon';
		!is_file($localNeon) && touch($localNeon);
		$configurator->addConfig($localNeon);

		$container = $configurator->createContainer();
		return $container;
	}

}
