<?php
namespace kujaff\CryptoCurrenciesPoolsBundle\Entity;

/**
 * Network
 */
class Network
{
	/**
	 * @var integer
	 */
	private $id;

	/**
	 * @var integer
	 */
	private $hashrate;

	/**
	 * @var integer
	 */
	private $estimatedTime;

	/**
	 * @var string
	 */
	private $nextDifficulty;

	/**
	 * @var integer
	 */
	private $blocksUntilDiffChange;

	/**
	 * @var string
	 */
	private $difficulty;

	/**
	 * @var integer
	 */
	private $currentBlock;

	/**
	 * @var integer
	 */
	private $lastBlock;

	/**
	 * @var integer
	 */
	private $nextBlock;

	/**
	 * @var Pool
	 */
	private $pool;

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
	 * Set hashrate
	 *
	 * @param integer $hashrate
	 * @return Network
	 */
	public function setHashrate($hashrate)
	{
		$this->hashrate = $hashrate;

		return $this;
	}

	/**
	 * Get hashrate
	 *
	 * @return integer
	 */
	public function getHashrate()
	{
		return $this->hashrate;
	}

	/**
	 * Set estimatedTime
	 *
	 * @param integer $estimatedTime
	 * @return Network
	 */
	public function setEstimatedTime($estimatedTime)
	{
		$this->estimatedTime = $estimatedTime;

		return $this;
	}

	/**
	 * Get estimatedTime
	 *
	 * @return integer
	 */
	public function getEstimatedTime()
	{
		return $this->estimatedTime;
	}

	/**
	 * Set nextDifficulty
	 *
	 * @param string $nextDifficulty
	 * @return Network
	 */
	public function setNextDifficulty($nextDifficulty)
	{
		$this->nextDifficulty = $nextDifficulty;

		return $this;
	}

	/**
	 * Get nextDifficulty
	 *
	 * @return string
	 */
	public function getNextDifficulty()
	{
		return $this->nextDifficulty;
	}

	/**
	 * Set blocksUntilDiffChange
	 *
	 * @param integer $blocksUntilDiffChange
	 * @return Network
	 */
	public function setBlocksUntilDiffChange($blocksUntilDiffChange)
	{
		$this->blocksUntilDiffChange = $blocksUntilDiffChange;

		return $this;
	}

	/**
	 * Get blocksUntilDiffChange
	 *
	 * @return integer
	 */
	public function getBlocksUntilDiffChange()
	{
		return $this->blocksUntilDiffChange;
	}

	/**
	 * Set difficulty
	 *
	 * @param string $difficulty
	 * @return Network
	 */
	public function setDifficulty($difficulty)
	{
		$this->difficulty = $difficulty;

		return $this;
	}

	/**
	 * Get difficulty
	 *
	 * @return string
	 */
	public function getDifficulty()
	{
		return $this->difficulty;
	}

	/**
	 * Set currentBlock
	 *
	 * @param integer $currentBlock
	 * @return Network
	 */
	public function setCurrentBlock($currentBlock)
	{
		$this->currentBlock = $currentBlock;

		return $this;
	}

	/**
	 * Get currentBlock
	 *
	 * @return integer
	 */
	public function getCurrentBlock()
	{
		return $this->currentBlock;
	}

	/**
	 * Set lastBlock
	 *
	 * @param integer $lastBlock
	 * @return Network
	 */
	public function setLastBlock($lastBlock)
	{
		$this->lastBlock = $lastBlock;

		return $this;
	}

	/**
	 * Get lastBlock
	 *
	 * @return integer
	 */
	public function getLastBlock()
	{
		return $this->lastBlock;
	}

	/**
	 * Set nextBlock
	 *
	 * @param integer $nextBlock
	 * @return Network
	 */
	public function setNextBlock($nextBlock)
	{
		$this->nextBlock = $nextBlock;

		return $this;
	}

	/**
	 * Get nextBlock
	 *
	 * @return integer
	 */
	public function getNextBlock()
	{
		return $this->nextBlock;
	}

	/**
	 * Define pool
	 *
	 * @param Pool $pool
	 * @return Network
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

}