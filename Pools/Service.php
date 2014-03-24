<?php
namespace kujaff\CryptoCurrenciesPoolsBundle\Pools;

use kujaff\CryptoCurrenciesPoolsBundle\Entity\Pool;
use Symfony\Component\DependencyInjection\ContainerInterface;
use kujaff\CryptoCurrenciesPoolsBundle\Entity\Api;
use kujaff\CryptoCurrenciesPoolsBundle\Pools\Api\Api as PoolApi;

class Service
{
	/**
	 * @var ContainerInterface;
	 */
	private $container;

	/**
	 * Get API for the pool
	 *
	 * @param Pool $pool
	 * @return PoolApi
	 * @throws \Exception
	 */
	private function _getAPI(Pool $pool)
	{
		$class = '\kujaff\CryptoCurrenciesPoolsBundle\Pools\Api\\';
		switch ($pool->getApi()->getKind()) {
			case Api::KIND_MPOS :
				$class .= 'MPOS';
				break;
			default:
				throw new \Exception('Unknow api kind "' . $pool->getApi()->getKind() . '".');
		}
		return new $class();
	}

	/**
	 * Constructor
	 *
	 * @param ContainerInterface $container
	 */
	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
	}

	/**
	 * Refresh all data
	 *
	 * @param Pool $pool
	 */
	public function refresh(Pool $pool)
	{
		$this->refreshBlocks($pool);
		$this->refreshNetwork($pool);
		$this->refreshShares($pool);
		$this->refreshUser($pool);
		$this->refreshUserWorkers($pool);
	}

	/**
	 * Refresh blocks data
	 *
	 * @param Pool $pool
	 */
	public function refreshBlocks(Pool $pool)
	{

	}

	/**
	 * Refresh network data
	 *
	 * @param Pool $pool
	 */
	public function refreshNetwork(Pool $pool)
	{

	}

	/**
	 * Refresh shares data
	 *
	 * @param Pool $pool
	 */
	public function refreshShares(Pool $pool)
	{

	}

	/**
	 * Refresh user data
	 *
	 * @param Pool $pool
	 */
	public function refreshUser(Pool $pool)
	{
		$this->_getAPI($pool)->refreshUser($pool);
	}

	/**
	 * Refresh user workers data
	 *
	 * @param Pool $pool
	 */
	public function refreshUserWorkers(Pool $pool)
	{

	}

}