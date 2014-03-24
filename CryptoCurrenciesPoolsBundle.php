<?php
namespace kujaff\CryptoCurrenciesPoolsBundle;

use kujaff\VersionsBundle\Versions\VersionnedBundle;
use kujaff\VersionsBundle\Versions\Version;

class CryptoCurrenciesPoolsBundle extends VersionnedBundle
{

	public function __construct()
	{
		$this->version = new Version('0.0.1');
	}

}