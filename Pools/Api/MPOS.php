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

		$return = array(
			'data' => json_decode($json, true),
			'errors' => array()
		);

		if ($json == 'Access denied') {
			$return['errors'][] = 'Vérifiez votre clef d\'API.';
		} else if ($json == '400 Bad Request') {
			$return['errors'][] = 'Action "' . $action . '" non reconnue.';
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
		return (array_key_exists($action, $data) && array_key_exists('version', $data[$action]) && $data[$action]['version'] == '1.0.0');
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
		$user = $pool->getUser();

		$call = $this->_call($pool, 'getuserstatus');
		if (count($call['errors']) > 0) {
			return $call['errors'];
		}
		$data = $call['data'];

		if ($this->_isV1($data, 'getuserstatus')) {
			$finalData = $data['getuserstatus']['data'];
			$user->setHashrate($finalData['hashrate'] * 1000);
			$user->setShareRate($finalData['sharerate']);
			$user->setValidShares($finalData['shares']['valid']);
			$user->setInvalidShares($finalData['shares']['invalid']);

			$call = $this->_call($pool, 'getuserbalance');
			if (count($call['errors']) > 0) {
				return $call['errors'];
			}
			$data = $call['data'];

			if ($this->_isV1($data, 'getuserbalance')) {
				$finalData = $data['getuserbalance']['data'];
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

		$user->setLastUpdate(new \DateTime());
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