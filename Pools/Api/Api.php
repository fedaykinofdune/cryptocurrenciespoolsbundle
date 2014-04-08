<?php
namespace kujaff\CryptoCurrenciesPoolsBundle\Pools\Api;

use kujaff\CryptoCurrenciesPoolsBundle\Entity\Pool;

/**
 * API to contact pool to retrive data
 */
interface Api
{

	/**
	 * Refresh blocks data
	 *
	 * @param Pool $pool
	 */
	public function refreshBlocks(Pool $pool);

	/**
	 * Refresh network data
	 *
	 * @param Pool $pool
	 */
	public function refreshNetwork(Pool $pool);

	/**
	 * Refresh shares data
	 *
	 * @param Pool $pool
	 */
	public function refreshShares(Pool $pool);

	/**
	 * Refresh user data
	 *
	 * @param Pool $pool
	 */
	public function refreshUser(Pool $pool);

	/**
	 * Refresh user workers data
	 *
	 * @param Pool $pool
	 */
	public function refreshUserWorkers(Pool $pool);
}