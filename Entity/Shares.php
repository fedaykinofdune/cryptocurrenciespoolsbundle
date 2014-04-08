<?php
namespace kujaff\CryptoCurrenciesPoolsBundle\Entity;

/**
 * Shares
 */
class Shares
{
	/**
	 * @var integer
	 */
	private $id;

	/**
	 * @var integer
	 */
	private $round;

	/**
	 * @var string
	 */
	private $rate;

	/**
	 * @var integer
	 */
	private $estimated;

	/**
	 * @var Pool
	 */
	private $pool;

	/**
	 * @var \DateTime
	 */
	private $lastUpdate;

	/**
	 * @var array
	 */
	private $refreshErrors = array();

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set round
	 *
	 * @param integer $round
	 * @return Shares
	 */
	public function setRound($round)
	{
		$this->round = $round;

		return $this;
	}

	/**
	 * Get round
	 *
	 * @return integer
	 */
	public function getRound()
	{
		return $this->round;
	}

	/**
	 * Set rate
	 *
	 * @param string $rate
	 * @return Shares
	 */
	public function setRate($rate)
	{
		$this->rate = $rate;

		return $this;
	}

	/**
	 * Get rate
	 *
	 * @return string
	 */
	public function getRate()
	{
		return $this->rate;
	}

	/**
	 * Set estimated
	 *
	 * @param integer $estimated
	 * @return Shares
	 */
	public function setEstimated($estimated)
	{
		$this->estimated = $estimated;

		return $this;
	}

	/**
	 * Get estimated
	 *
	 * @return integer
	 */
	public function getEstimated()
	{
		return $this->estimated;
	}

	/**
	 * Define pool
	 *
	 * @param Pool $pool
	 * @return Shares
	 */
	public function setPool(Pool $pool)
	{
		$this->pool = $pool;
		return $this;
	}

	/**
	 * Get pool
	 *
	 * @return Pool
	 */
	public function getPool()
	{
		return $this->pool;
	}

	/**
	 * Define last update
	 *
	 * @param \DateTime $lastUpdate
	 */
	public function setLastUpdate($lastUpdate)
	{
		$this->lastUpdate = $lastUpdate;
	}

	/**
	 * Get last update
	 *
	 * @return \DateTime
	 */
	public function getLastUpdate()
	{
		return $this->lastUpdate;
	}

	/**
	 * Add a refresh error message
	 *
	 * @param string $id
	 * @param string $message
	 */
	public function addRefreshError($id, $message)
	{
		$this->refreshErrors[$id] = $message;
		return $this;
	}

	/**
	 * Get refresh errors
	 *
	 * @return array
	 */
	public function getRefreshErrors()
	{
		return $this->refreshErrors;
	}

	/**
	 * Clean refresh errors
	 */
	public function cleanRefreshErrors()
	{
		$this->refreshErrors = array();
	}

	/**
	 * Count refresh errors
	 *
	 * @return int
	 */
	public function countRefreshErrors()
	{
		return count($this->refreshErrors);
	}

	/**
	 * Indicate if data needs update
	 *
	 * @return boolean
	 */
	public function needUpdate()
	{
		return ($this->getLastUpdate() == null || time() - $this->getLastUpdate()->format('U') > 1 * 60);
	}

	/**
	 * Clean data
	 */
	public function clean()
	{

	}

}