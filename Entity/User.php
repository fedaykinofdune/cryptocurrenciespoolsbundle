<?php
namespace kujaff\CryptoCurrenciesPoolsBundle\Entity;

/**
 * User
 */
class User
{
	/**
	 * @var integer
	 */
	private $id;

	/**
	 * @var string
	 */
	private $balanceConfirmed;

	/**
	 * @var string
	 */
	private $balanceUnconfirmed;

	/**
	 * @var string
	 */
	private $balanceOrphaned;

	/**
	 * @var integer
	 */
	private $hashrate;

	/**
	 * @var string
	 */
	private $shareRate;

	/**
	 * @var integer
	 */
	private $validShares;

	/**
	 * @var integer
	 */
	private $invalidShares;

	/**
	 * @var string
	 */
	private $donate;

	/**
	 * @var boolean
	 */
	private $isAnonymous;

	/**
	 * @var Pool
	 */
	private $pool;

	/**
	 * @var Worker[]
	 */
	private $workers;

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
	 * Set balanceConfirmed
	 *
	 * @param string $balanceConfirmed
	 * @return User
	 */
	public function setBalanceConfirmed($balanceConfirmed)
	{
		$this->balanceConfirmed = $balanceConfirmed;

		return $this;
	}

	/**
	 * Get balanceConfirmed
	 *
	 * @return string
	 */
	public function getBalanceConfirmed()
	{
		return $this->balanceConfirmed;
	}

	/**
	 * Set balanceUnconfirmed
	 *
	 * @param string $balanceUnconfirmed
	 * @return User
	 */
	public function setBalanceUnconfirmed($balanceUnconfirmed)
	{
		$this->balanceUnconfirmed = $balanceUnconfirmed;

		return $this;
	}

	/**
	 * Get balanceUnconfirmed
	 *
	 * @return string
	 */
	public function getBalanceUnconfirmed()
	{
		return $this->balanceUnconfirmed;
	}

	/**
	 * Set balanceOrphaned
	 *
	 * @param string $balanceOrphaned
	 * @return User
	 */
	public function setBalanceOrphaned($balanceOrphaned)
	{
		$this->balanceOrphaned = $balanceOrphaned;

		return $this;
	}

	/**
	 * Get balanceOrphaned
	 *
	 * @return string
	 */
	public function getBalanceOrphaned()
	{
		return $this->balanceOrphaned;
	}

	/**
	 * Set hashrate
	 *
	 * @param integer $hashrate
	 * @return User
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
	 * Set shareRate
	 *
	 * @param string $shareRate
	 * @return User
	 */
	public function setShareRate($shareRate)
	{
		$this->shareRate = $shareRate;

		return $this;
	}

	/**
	 * Get shareRate
	 *
	 * @return string
	 */
	public function getShareRate()
	{
		return $this->shareRate;
	}

	/**
	 * Set validShares
	 *
	 * @param integer $validShares
	 * @return User
	 */
	public function setValidShares($validShares)
	{
		$this->validShares = $validShares;

		return $this;
	}

	/**
	 * Get validShares
	 *
	 * @return integer
	 */
	public function getValidShares()
	{
		return $this->validShares;
	}

	/**
	 * Set invalidShares
	 *
	 * @param integer $invalidShares
	 * @return User
	 */
	public function setInvalidShares($invalidShares)
	{
		$this->invalidShares = $invalidShares;

		return $this;
	}

	/**
	 * Get invalidShares
	 *
	 * @return integer
	 */
	public function getInvalidShares()
	{
		return $this->invalidShares;
	}

	/**
	 * Set donate
	 *
	 * @param string $donate
	 * @return User
	 */
	public function setDonate($donate)
	{
		$this->donate = $donate;

		return $this;
	}

	/**
	 * Get donate
	 *
	 * @return string
	 */
	public function getDonate()
	{
		return $this->donate;
	}

	/**
	 * Set isAnonymous
	 *
	 * @param boolean $isAnonymous
	 * @return User
	 */
	public function setIsAnonymous($isAnonymous)
	{
		$this->isAnonymous = $isAnonymous;

		return $this;
	}

	/**
	 * Get isAnonymous
	 *
	 * @return boolean
	 */
	public function getIsAnonymous()
	{
		return $this->isAnonymous;
	}

	/**
	 * Define pool
	 *
	 * @param Pool $pool
	 * @return User
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
	 * Add worker
	 *
	 * @param Worker $server
	 * @return User
	 */
	public function addWorker(Worker $worker)
	{
		$this->workers[] = $worker;
		return $this;
	}

	/**
	 * Get workers
	 *
	 * @return Worker[]
	 */
	public function getWorkers()
	{
		return $this->workers;
	}

	/**
	 * Remove worker
	 *
	 * @param Worker $worker
	 */
	public function removeServer(Worker $worker)
	{
		$this->workers->removeElement($worker);
	}

}