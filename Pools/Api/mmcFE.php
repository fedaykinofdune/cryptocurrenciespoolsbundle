<?php
namespace kujaff\CryptoCurrenciesPoolsBundle\Pools\Api;

use kujaff\CryptoCurrenciesPoolsBundle\Entity\Pool;

/**
 * Connect to mmcFE API
 */
class mmcFE implements Api
{
	const API_NONE = 1;
	const API_HTTP = 2;
	const API_HTML = 3;

	/**
	 * Call mmcFE Api
	 *
	 * @param Pool $pool
	 * @param $string $apiKey
	 * @return array
	 */
	private function _call(Pool $pool, $apiKey = null)
	{
		$params = array();
		if ($apiKey != null) {
			$params['api_key'] = $apiKey;
		}
		$address = $pool->getAddress() . '/api.php?' . http_build_query($params);
		$ch = curl_init($address);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$json = curl_exec($ch);

		$return = json_decode($json, true);

		if ($json == 'Invalid Key.') {
			$pool->addRefreshError('accessKey', 'Vérifiez votre clef d\'API.');
			$return = false;
		}

		curl_close($ch);
		return $return;
	}

	/**
	 * Get api method (HTTP with accessKey, HTML with login / password, or none)
	 *
	 * @param Pool $pool
	 * @return int
	 */
	private function _getAPIMethod(Pool $pool)
	{
		if ($pool->getApi()->getAccessKey() != null) {
			return self::API_HTTP;
		} else if ($pool->getApi()->getLogin() != null && $pool->getApi()->getPassword() != null) {
			return self::API_HTML;
		}
		return self::API_NONE;
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
		$apiMethod = $this->_getAPIMethod($pool);
		if ($apiMethod != self::API_HTTP) {
			return null;
		}

		$user = $pool->getUser();

		$data = $this->_call($pool, $pool->getApi()->getAccessKey());
		if ($data === false) {
			return false;
		}

		$user->setBalanceConfirmed($data['confirmed_rewards']);
		$user->setHashrate($data['total_hashrate']);

		return true;
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