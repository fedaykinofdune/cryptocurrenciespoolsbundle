<?php
namespace kujaff\CryptoCurrenciesPoolsBundle\Pools\Api;

use kujaff\CryptoCurrenciesPoolsBundle\Entity\Pool;

/**
 * Connect to MPOS API
 */
class MPOS implements Api
{

	/**
	 * Call MPOS Api
	 *
	 * @param Pool $pool
	 * @param string $action
	 * @return array
	 */
	private function _call(Pool $pool, $action)
	{
		$params = array(
			'page' => 'api',
			'api_key' => $pool->getApi()->getAccessKey(),
			'action' => $action
		);
		$address = $pool->getAddress() . '/index.php?' . http_build_query($params);
		$ch = curl_init($address);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$json = curl_exec($ch);
		curl_close($ch);
		return json_decode($json, true);
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
		$data = $this->_call($pool, 'getuserstatus');
		d($data);
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