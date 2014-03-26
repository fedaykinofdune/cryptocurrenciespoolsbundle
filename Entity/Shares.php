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
	 * Indicate if data needs update
	 *
	 * @return boolean
	 */
	public function needUpdate()
	{
		return ($this->getLastUpdate() == null || time() - $this->getLastUpdate()->format('U') > 1 * 60);
	}

}