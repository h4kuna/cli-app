<?php declare(strict_types=1);

namespace h4kuna\Test;

require_once __DIR__ . '/../bootstrap.php';

use Tester\Assert;
use Tester\TestCase;

final class ExampleTest extends TestCase
{

	public function testBase(): void
	{
		Assert::true(true);
	}

}

(new ExampleTest())->run();
