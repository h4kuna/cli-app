<?php declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$tempDir = __DIR__ . '/temp';
$debuggerFile = __DIR__ . '/config/debugger-enable';

$configurator = new Nette\Configurator;

if (is_file($debuggerFile)) {
	$configurator->setDebugMode(TRUE);
}
$configurator->enableTracy($tempDir);
$configurator->setTimeZone('Europe/Prague');
$configurator->setTempDirectory($tempDir);
$configurator->addConfig([
	'parameters' => [
		'debuggerFile' => $debuggerFile,
	],
]);

$configurator->addConfig(__DIR__ . '/config/config.neon');

$localNeon = __DIR__ . '/config/config.local.neon';
!is_file($localNeon) && touch($localNeon);
$configurator->addConfig($localNeon);

$container = $configurator->createContainer();

return $container;
