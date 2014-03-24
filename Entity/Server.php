<?php
namespace kujaff\CryptoCurrenciesPoolsBundle\Entity;

/**
 * Server
 */
class Server
{
	/**
	 * @var integer
	 */
	private $id;

	/**
	 * @var string
	 */
	private $address;

	/**
	 * @var integer
	 */
	private $port;

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
	 * Set address
	 *
	 * @param string $address
	 * @return Server
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
	 * Set port
	 *
	 * @param integer $port
	 * @return Server
	 */
	public function setPort($port)
	{
		$this->port = $port;

		return $this;
	}

	/**
	 * Get port
	 *
	 * @return integer
	 */
	public function getPort()
	{
		return $this->port;
	}

	/**
	 * Define pool
	 *
	 * @param Pool $pool
	 * @return Server
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