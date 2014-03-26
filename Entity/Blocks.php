<?php
namespace kujaff\CryptoCurrenciesPoolsBundle\Entity;

/**
 * Blocks
 */
class Blocks
{
	/**
	 * @var integer
	 */
	private $id;

	/**
	 * @var integer
	 */
	private $last;

	/**
	 * @var integer
	 */
	private $currentBlockHeight;

	/**
	 * @var string
	 */
	private $estimatedTime;

	/**
	 * @var integer
	 */
	private $progress;

	/**
	 * @var integer
	 */
	private $timeSinceLast;

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
	 * Set last
	 *
	 * @param integer $last
	 * @return Blocks
	 */
	public function setLast($last)
	{
		$this->last = $last;

		return $this;
	}

	/**
	 * Get last
	 *
	 * @return integer
	 */
	public function getLast()
	{
		return $this->last;
	}

	/**
	 * Set currentBlockHeight
	 *
	 * @param integer $currentBlockHeight
	 * @return Blocks
	 */
	public function setCurrentBlockHeight($currentBlockHeight)
	{
		$this->currentBlockHeight = $currentBlockHeight;

		return $this;
	}

	/**
	 * Get currentBlockHeight
	 *
	 * @return integer
	 */
	public function getCurrentBlockHeight()
	{
		return $this->currentBlockHeight;
	}

	/**
	 * Set estimatedTime
	 *
	 * @param string $estimatedTime
	 * @return Blocks
	 */
	public function setEstimatedTime($estimatedTime)
	{
		$this->estimatedTime = $estimatedTime;

		return $this;
	}

	/**
	 * Get estimatedTime
	 *
	 * @return string
	 */
	public function getEstimatedTime()
	{
		return $this->estimatedTime;
	}

	/**
	 * Set progress
	 *
	 * @param integer $progress
	 * @return Blocks
	 */
	public function setProgress($progress)
	{
		$this->progress = $progress;

		return $this;
	}

	/**
	 * Get progress
	 *
	 * @return integer
	 */
	public function getProgress()
	{
		return $this->progress;
	}

	/**
	 * Set timeSinceLast
	 *
	 * @param integer $timeSinceLast
	 * @return Blocks
	 */
	public function setTimeSinceLast($timeSinceLast)
	{
		$this->timeSinceLast = $timeSinceLast;

		return $this;
	}

	/**
	 * Get timeSinceLast
	 *
	 * @return integer
	 */
	public function getTimeSinceLast()
	{
		return $this->timeSinceLast;
	}

	/**
	 * Define pool
	 *
	 * @param Pool $pool
	 * @return Blocks
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