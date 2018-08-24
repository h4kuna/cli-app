<?php

namespace h4kuna\Cli\App\Tools;

class Debugger
{
	private $debuggerFile;


	public function __construct($debuggerFile)
	{
		$this->debuggerFile = $debuggerFile;
	}


	public function enable()
	{
		touch($this->debuggerFile);
	}


	public function disable()
	{
		if ($this->isEnabled()) {
			unlink($this->debuggerFile);
		}
	}


	public function isEnabled()
	{
		return is_file($this->debuggerFile);
	}

}
