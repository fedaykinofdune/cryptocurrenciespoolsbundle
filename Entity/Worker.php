<?php
namespace kujaff\CryptoCurrenciesPoolsBundle\Entity;

/**
 * Worker
 */
class Worker
{
	/**
	 * @var integer
	 */
	private $id;

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string
	 */
	private $password;

	/**
	 * @var boolean
	 */
	private $monitor;

	/**
	 * @var integer
	 */
	private $hashrate;

	/**
	 * @var string
	 */
	private $difficulty;

	/**
	 * @var User
	 */
	private $user;

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
	 * Set name
	 *
	 * @param string $name
	 * @return Worker
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Get name
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set password
	 *
	 * @param string $password
	 * @return Worker
	 */
	public function setPassword($password)
	{
		$this->password = $password;

		return $this;
	}

	/**
	 * Get password
	 *
	 * @return string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Set monitor
	 *
	 * @param boolean $monitor
	 * @return Worker
	 */
	public function setMonitor($monitor)
	{
		$this->monitor = $monitor;

		return $this;
	}

	/**
	 * Get monitor
	 *
	 * @return boolean
	 */
	public function getMonitor()
	{
		return $this->monitor;
	}

	/**
	 * Set hashrate
	 *
	 * @param integer $hashrate
	 * @return Worker
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
	 * Set difficulty
	 *
	 * @param string $difficulty
	 * @return Worker
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
	 * Define pool
	 *
	 * @param User $pool
	 * @return Worker
	 */
	public function setUser(User $user)
	{
		$this->user = $user;
		return $this;
	}

	/**
	 * Get pool
	 *
	 * @return User
	 */
	public function getUser()
	{
		return $this->user;
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

	/**
	 * Indicate if worker is enabled
	 *
	 * @return boolean
	 */
	public function getEnabled()
	{
		return ($this->getHashrate() > 0);
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
	 * Clean data
	 */
	public function clean()
	{

	}

}