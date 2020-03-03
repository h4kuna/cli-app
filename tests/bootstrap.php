<?php declare(strict_types=1);

use Tracy\Debugger;
use Nette\Utils;

require __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('Europe/Prague');
Tester\Environment::setup();

$tempDir = __DIR__ . '/../temp/tests';
Utils\FileSystem::createDir($tempDir);

Debugger::enable(Debugger::DEVELOPMENT, $tempDir);
