<?php
namespace kujaff\CryptoCurrenciesPoolsBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use kujaff\CryptoCurrenciesBundle\Entity\Currency;

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
	 * @var \DateTime
	 */
	private $lastUpdate;

	/**
	 * Indicate is pool is used by a miner
	 *
	 * @var boolean
	 */
	private $used;

	/**
	 * @var Currency
	 */
	private $currency;

	/**
	 * @var array
	 */
	private $refreshErrors = array();

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->api = new Api();
		$this->api->setPool($this);
		$this->blocks = new Blocks();
		$this->blocks->setPool($this);
		$this->network = new Network();
		$this->network->setPool($this);
		$this->servers = new ArrayCollection();
		$this->shares = new Shares();
		$this->shares->setPool($this);
		$this->user = new User();
		$this->user->setPool($this);
	}

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
	public function setWorkersCount($count)
	{
		$this->workersCount = $count;
		return $this;
	}

	/**
	 * Get workers count
	 *
	 * @return int
	 */
	public function getWorkersCount()
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
	 * Count servers
	 *
	 * @return int
	 */
	public function countServers()
	{
		return count($this->servers);
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
	 * Indicate if pool is used by a miner
	 *
	 * @param boolean $refresh
	 * @return boolean
	 */
	public function getUsed($refresh = false)
	{
		if ($refresh || $this->used === null) {
			$this->used = false;
			$rigs = _service('rigs')->getAllFilled();
			foreach ($rigs->getAll() as $rig) {
				foreach ($rig->getMiners()->toArray() as $miner) {
					if ($miner->getActivePool() != null) {
						foreach ($this->getServers() as $server) {
							if ($miner->getActivePool()->getURL() == $server->getAddress() . ':' . $server->getPort()) {
								$this->used = true;
								break 3;
							}
						}
					}
				}
			}
		}
		return $this->used;
	}

	/**
	 * Define currency
	 *
	 * @param Currency $currency
	 * @return Pool
	 */
	public function setCurrency(Currency $currency)
	{
		$this->currency = $currency;
		return $this;
	}

	/**
	 * Get currency
	 *
	 * @return Currency
	 */
	public function getCurrency()
	{
		return $this->currency;
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

}