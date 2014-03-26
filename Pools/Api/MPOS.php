<?php
namespace kujaff\CryptoCurrenciesPoolsBundle\Pools\Api;

use kujaff\CryptoCurrenciesPoolsBundle\Entity\Pool;

/**
 * Connect to MPOS API
 */
class MPOS implements Api
{
	const API_NONE = 1;
	const API_HTTP = 2;
	const API_HTML = 3;

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

		$return = json_decode($json, true);

		if ($json == 'Access denied') {
			$pool->addRefreshError('accessKey', 'Vérifiez votre clef d\'API.');
			$return = false;
		} else if ($json == '400 Bad Request') {
			$pool->addRefreshError('badRequest', 'Requête d\'appel à l\'API mal formée.');
			$return = false;
		} else if ($json == 501) {
			$pool->addRefreshError('unknowAction', 'L\'action "' . $action . '" n\'existe pas.');
			$return = false;
		}

		curl_close($ch);
		return $return;
	}

	/**
	 * Indicate if MPOS Api version is 1.0.0
	 *
	 * @param array $data
	 * @param string $action
	 * @return boolean
	 */
	private function _isV1($data, $action)
	{
		return (is_array($data) && array_key_exists($action, $data) && array_key_exists('version', $data[$action]) && $data[$action]['version'] == '1.0.0');
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

		$data = $this->_call($pool, 'getuserstatus');
		if ($data === false) {
			return false;
		}

		if ($this->_isV1($data, 'getuserstatus')) {
			$finalData = $data['getuserstatus']['data'];
			$user->setHashrate($finalData['hashrate'] * 1000);
			$user->setShareRate($finalData['sharerate']);
			$user->setValidShares($finalData['shares']['valid']);
			$user->setInvalidShares($finalData['shares']['invalid']);

			$dataBalance = $this->_call($pool, 'getuserbalance');
			if ($dataBalance === false) {
				return false;
			}

			if ($this->_isV1($dataBalance, 'getuserbalance')) {
				$finalData = $dataBalance['getuserbalance']['data'];
				$user->setBalanceConfirmed($finalData['confirmed']);
				$user->setBalanceUnconfirmed($finalData['unconfirmed']);
				$user->setBalanceOrphaned($finalData['orphaned']);
			}
		} else {
			$finalData = $data['getuserstatus'];
			$user->setHashrate($finalData['hashrate'] * 1000);
			$user->setShareRate($finalData['sharerate']);
			$user->setBalanceConfirmed($finalData['balance']);
		}
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