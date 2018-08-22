<?php declare(strict_types=1);

namespace h4kuna\Cli\App;

trait MemoryStorage
{
	private $memoryStorage = [];


	/**
	 * @param string|array $key
	 * @param callable $callback
	 * @return mixed
	 */
	final protected function memory($key, callable $callback)
	{
		if (is_array($key)) {
			$key = implode('.', $key);
		}
		if (isset($this->memoryStorage[$key]) === FALSE) {
			return $this->memoryStorage[$key] = $callback();
		}
		return $this->memoryStorage[$key];
	}

}
