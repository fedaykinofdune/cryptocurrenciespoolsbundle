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

}