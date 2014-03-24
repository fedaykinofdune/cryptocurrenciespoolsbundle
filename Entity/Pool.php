<?php
namespace kujaff\CryptoCurrenciesPoolsBundle\Entity;

/**
 * Pool
 */
class Pool
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
	private $address;

	/**
	 * @var integer
	 */
	private $hashrate;

	/**
	 * @var string
	 */
	private $efficiency;

	/**
	 * @var integer
	 */
	private $estimatedTime;

	/**
	 * @var string
	 */
	private $taxeFee;

	/**
	 * @var int
	 */
	private $workersCount;

	/**
	 * @var Server[]
	 */
	private $servers = array();

	/**
	 * @var string
	 */
	private $api;

	/**
	 * @var Blocks
	 */
	private $blocks;

	/**
	 * @var Network
	 */
	private $network;

	/**
	 * @var Shares
	 */
	private $shares;

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
	 * @return Pool
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
	 * Set address
	 *
	 * @param string $address
	 * @return Pool
	 */
	public function setAddress($address)
	{
		$this->address = $address;

		return $this;
	}

	/**
	 * Get address
	 *
	 * @return string
	 */
	public function getAddress()
	{
		return $this->address;
	}

	/**
	 * Set hashrate
	 *
	 * @param integer $hashrate
	 * @return Pool
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
	 * Set efficiency
	 *
	 * @param string $efficiency
	 * @return Pool
	 */
	public function setEfficiency($efficiency)
	{
		$this->efficiency = $efficiency;

		return $this;
	}

	/**
	 * Get efficiency
	 *
	 * @return string
	 */
	public function getEfficiency()
	{
		return $this->efficiency;
	}

	/**
	 * Set estimatedTime
	 *
	 * @param integer $estimatedTime
	 * @return Pool
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
	 * Set taxeFee
	 *
	 * @param string $taxeFee
	 * @return Pool
	 */
	public function setTaxeFee($taxeFee)
	{
		$this->taxeFee = $taxeFee;

		return $this;
	}

	/**
	 * Get taxeFee
	 *
	 * @return string
	 */
	public function getTaxeFee()
	{
		return $this->taxeFee;
	}

	/**
	 * Define workers count
	 *
	 * @param int$count
	 * @return Pool
	 */
	public function setWorkerCount($count)
	{
		$this->workersCount = $count;
		return $this;
	}

	/**
	 * Get workers count
	 *
	 * @return int
	 */
	public function getWorkerCount()
	{
		return $this->workersCount;
	}

	/**
	 * Add server
	 *
	 * @param Server $server
	 * @return Pool
	 */
	public function addServer(Server $server)
	{
		$this->servers[] = $server;
		return $this;
	}

	/**
	 * Get servers
	 *
	 * @return Server[]
	 */
	public function getServers()
	{
		return $this->servers;
	}

	/**
	 * Remove server
	 *
	 * @param Server $server
	 */
	public function removeServer(Server $server)
	{
		$this->servers->removeElement($server);
	}

	/**
	 * Set api
	 *
	 * @param Api $api
	 * @return Pool
	 */
	public function setApi(Api $api)
	{
		$this->api = $api;
		return $this;
	}

	/**
	 * Get api
	 *
	 * @return Api
	 */
	public function getApi()
	{
		return $this->api;
	}

	/**
	 * Define blocks
	 *
	 * @param Blocks $blocks
	 * @return Pool
	 */
	public function setBlocks(Blocks $blocks)
	{
		$this->blocks = $blocks;
		return $this;
	}

	/**
	 * Get blocks
	 *
	 * @return Blocks
	 */
	public function getBlocks()
	{
		return $this->blocks;
	}

	/**
	 * Define network
	 *
	 * @param Network $network
	 * @return Pool
	 */
	public function setNetwork(Network $network)
	{
		$this->network = $network;
		return $this;
	}

	/**
	 * Get network
	 *
	 * @return Network
	 */
	public function getNetwork()
	{
		return $this->network;
	}

	/**
	 * Define shares
	 *
	 * @param Shares $shares
	 * @return Pool
	 */
	public function setShares(Shares $shares)
	{
		$this->shares = $shares;
		return $this;
	}

	/**
	 * Get shares
	 *
	 * @return Shares
	 */
	public function getShares()
	{
		return $this->shares;
	}

	/**
	 * Define user
	 *
	 * @param User $user
	 * @return Pool
	 */
	public function setUser(User $user)
	{
		$this->user = $user;
		return $this;
	}

	/**
	 * Return user
	 *
	 * @return User
	 */
	public function getUser()
	{
		return $this->user;
	}

}