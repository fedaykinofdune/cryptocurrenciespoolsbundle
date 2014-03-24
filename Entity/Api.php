<?php
namespace kujaff\CryptoCurrenciesPoolsBundle\Entity;

/**
 * Api to get pool data
 */
class Api
{
	const KIND_MPOS = 1;
	/**
	 * @var integer
	 */
	private $id;

	/**
	 * @var integer
	 */
	private $kind;

	/**
	 * @var string
	 */
	private $accessKey;

	/**
	 * @var string
	 */
	private $login;

	/**
	 * @var string
	 */
	private $password;

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
	 * Define kind
	 * @param int $kind Use self::KIND_XXX
	 * @return Api
	 */
	public function setKind($kind)
	{
		$this->kind = $kind;
		return $this;
	}

	/**
	 * Get kind
	 *
	 * @return int
	 */
	public function getKind()
	{
		return $this->kind;
	}

	/**
	 * Define access key
	 * @param string $key
	 * @return Api
	 */
	public function setAccessKey($key)
	{
		$this->accessKey = $key;
		return $this;
	}

	/**
	 * Return access key
	 *
	 * @return string
	 */
	public function getAccessKey()
	{
		return $this->accessKey;
	}

	/**
	 * Define login
	 *
	 * @param string $login
	 * @return Api
	 */
	public function setLogin($login)
	{
		$this->login = $login;
		return $this;
	}

	/**
	 * Get login
	 *
	 * @return string
	 */
	public function getLogin()
	{
		return $this->login;
	}

	/**
	 * Define password
	 *
	 * @param string $password
	 * @return Api
	 */
	public function setPassword($password)
	{
		$this->password = $password;
		return $this;
	}

	/**
	 * Return password
	 *
	 * @return string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Set pool
	 *
	 * @param Pool $pool
	 * @return Api
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