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
			// mpos
			case Api::KIND_MPOS :
				$class .= 'MPOS';
				break;

			// mmcFE
			case Api::KIND_MMCFE :
				$class .= 'mmcFE';
				break;

			// unknow
			default:
				throw new \Exception('Unknow api kind "' . $pool->getApi()->getKind() . '".');
		}
		return new $class();
	}

	/**
	 * Save pool
	 */
	private function _save()
	{
		$this->container->get('doctrine')->getManager()->flush();
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
	 * Get a pool
	 *
	 * @param int $id
	 * @return Pool
	 * @throws \Exception
	 */
	public function get($id)
	{
		$return = $this->container->get('doctrine')->getRepository('CryptoCurrenciesPoolsBundle:Pool')->findOneById($id);
		if ($return == null) {
			throw new \Exception('Pool "' . $id . '" not found.');
		}
		$this->refresh($return);
		return $return;
	}

	/**
	 * Get all pools
	 *
	 * @param boolean $forceRefresh
	 * @return Pool[]
	 */
	public function getAll($forceRefresh = false)
	{
		$return = $this->container->get('doctrine')->getRepository('CryptoCurrenciesPoolsBundle:Pool')->findBy(array(), array('name' => 'ASC'));
		foreach ($return as $pool) {
			$this->refresh($pool, $forceRefresh);
		}
		return $return;
	}

	/**
	 * Refresh all data
	 *
	 * @param Pool $pool
	 * @param boolean $force
	 */
	public function refresh(Pool $pool, $force = false)
	{
		$this->refreshPool($pool, $force);
		$this->refreshBlocks($pool, $force);
		$this->refreshNetwork($pool, $force);
		$this->refreshShares($pool, $force);
		$this->refreshUser($pool, $force);
		$this->refreshUserWorkers($pool, $force);
	}

	/**
	 * Refresh pool data
	 *
	 * @param Pool $pool
	 * @param boolean $force
	 */
	public function refreshPool(Pool $pool, $force = false)
	{

	}

	/**
	 * Refresh blocks data
	 *
	 * @param Pool $pool
	 * @param boolean $force
	 */
	public function refreshBlocks(Pool $pool, $force = false)
	{

	}

	/**
	 * Refresh network data
	 *
	 * @param Pool $pool
	 * @param boolean $force
	 */
	public function refreshNetwork(Pool $pool, $force = false)
	{

	}

	/**
	 * Refresh shares data
	 *
	 * @param Pool $pool
	 * @param boolean $force
	 */
	public function refreshShares(Pool $pool, $force = false)
	{

	}

	/**
	 * Refresh user data
	 *
	 * @param Pool $pool
	 * @param boolean $force
	 */
	public function refreshUser(Pool $pool, $force = false)
	{
		if ($pool->getRefreshEnabled() && ($force || $pool->getUser()->needUpdate())) {
			$user = $pool->getUser();
			$user->cleanRefreshErrors();
			$user->clean();
			$user->setLastUpdate(new \DateTime());

			$this->_getAPI($pool)->refreshUser($pool);
			$this->_save();
		}
	}

	/**
	 * Refresh user workers data
	 *
	 * @param Pool $pool
	 * @param boolean $force
	 */
	public function refreshUserWorkers(Pool $pool, $force = false)
	{

	}

}