<?php
namespace kujaff\CryptoCurrenciesPoolsBundle\Install;

use kujaff\VersionsBundle\Installer\EasyInstaller;
use kujaff\VersionsBundle\Installer\Install;
use kujaff\VersionsBundle\Installer\Update;
use kujaff\VersionsBundle\Installer\Uninstall;
use kujaff\VersionsBundle\Versions\Version;
use kujaff\VersionsBundle\Entity\BundleVersion;

/**
 * Install / update / uninstall
 */
class Installer extends EasyInstaller implements Install, Update, Uninstall
{

	/**
	 * Get bundle name
	 *
	 * @return string
	 */
	public function getBundleName()
	{
		return 'CryptoCurrenciesPoolsBundle';
	}

	/**
	 * Install 0.0.1
	 *
	 * @return Version
	 */
	public function install()
	{
		if ($this->container->get('bundle.version')->getBundleVersion('CryptoCurrenciesBundle')->isInstalled() == false) {
			throw new \Exception('Bundle "CryptoCurrenciesBundle" must be installed before CryptoCurrenciesPoolsBundle.');
		}

		$this->_executeSQL('CREATE TABLE pools (id INT AUTO_INCREMENT NOT NULL, blocks_id INT DEFAULT NULL, network_id INT DEFAULT NULL, shares_id INT DEFAULT NULL, user_id INT DEFAULT NULL, currency_id INT NOT NULL, lastUpdate DATETIME DEFAULT NULL, name VARCHAR(50) NOT NULL, address VARCHAR(255) NOT NULL, hashrate INT DEFAULT NULL, efficiency NUMERIC(2, 2) DEFAULT NULL, api_id INT DEFAULT NULL, taxeFee NUMERIC(2, 2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
		$this->_executeSQL('ALTER TABLE pools ADD CONSTRAINT FK_1F7A78B738248176 FOREIGN KEY (currency_id) REFERENCES cryptocurrencies(id);');
		$this->_executeSQL('CREATE INDEX IDX_1F7A78B738248176 ON pools(currency_id);');
		$this->_executeSQL('CREATE UNIQUE INDEX UNIQ_1F7A78B754963938 ON pools(api_id);');
		$this->_executeSQL('CREATE UNIQUE INDEX UNIQ_1F7A78B7EE2E1C8C ON pools(blocks_id);');
		$this->_executeSQL('CREATE UNIQUE INDEX UNIQ_1F7A78B734128B91 ON pools(network_id);');
		$this->_executeSQL('CREATE UNIQUE INDEX UNIQ_1F7A78B7F65A5046 ON pools(shares_id);');
		$this->_executeSQL('CREATE UNIQUE INDEX UNIQ_1F7A78B7A76ED395 ON pools(user_id);');

		$this->_executeSQL('CREATE TABLE pools_apis (id INT AUTO_INCREMENT NOT NULL, pool_id INT NOT NULL, kind SMALLINT UNSIGNED NOT NULL, accessKey VARCHAR(255) DEFAULT NULL, login VARCHAR(50) DEFAULT NULL, password VARCHAR(100) DEFAULT NULL, UNIQUE INDEX UNIQ_4E6918367B3406DF (pool_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
		$this->_executeSQL('ALTER TABLE pools ADD CONSTRAINT FK_1F7A78B754963938 FOREIGN KEY (api_id) REFERENCES pools_apis(id);');
		$this->_executeSQL('ALTER TABLE pools_apis ADD CONSTRAINT FK_4E6918367B3406DF FOREIGN KEY (pool_id) REFERENCES pools (id);');

		$this->_executeSQL('CREATE TABLE pools_shares (id INT AUTO_INCREMENT NOT NULL, pool_id INT NOT NULL, round INT DEFAULT NULL, rate NUMERIC(2, 2) DEFAULT NULL, estimated INT DEFAULT NULL, lastUpdate DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_D0D7D7DA7B3406DF (pool_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
		$this->_executeSQL('ALTER TABLE pools ADD CONSTRAINT FK_1F7A78B7F65A5046 FOREIGN KEY (shares_id) REFERENCES pools_shares(id);');

		$this->_executeSQL('CREATE TABLE pools_network (id INT AUTO_INCREMENT NOT NULL, pool_id INT NOT NULL, hashrate INT DEFAULT NULL, estimatedTime INT DEFAULT NULL, nextDifficulty NUMERIC(15, 10) DEFAULT NULL, blocksUntilDiffChange INT DEFAULT NULL, difficulty NUMERIC(15, 10) DEFAULT NULL, currentBlock INT DEFAULT NULL, lastBlock INT DEFAULT NULL, nextBlock INT DEFAULT NULL, lastUpdate DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_5F7109C77B3406DF (pool_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
		$this->_executeSQL('ALTER TABLE pools ADD CONSTRAINT FK_1F7A78B734128B91 FOREIGN KEY (network_id) REFERENCES pools_network(id);');

		$this->_executeSQL('CREATE TABLE pools_blocks (id INT AUTO_INCREMENT NOT NULL, pool_id INT NOT NULL, last INT DEFAULT NULL, currentBlockHeight INT DEFAULT NULL, estimatedTime INT DEFAULT NULL, progress SMALLINT DEFAULT NULL, timeSinceLast INT DEFAULT NULL, lastUpdate DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_8E6533DE7B3406DF (pool_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
		$this->_executeSQL('ALTER TABLE pools ADD CONSTRAINT FK_1F7A78B7EE2E1C8C FOREIGN KEY (blocks_id) REFERENCES pools_blocks(id);');

		$this->_executeSQL('CREATE TABLE pools_users (id INT AUTO_INCREMENT NOT NULL, pool_id INT DEFAULT NULL, balanceConfirmed NUMERIC(20, 10) DEFAULT NULL, balanceUnconfirmed NUMERIC(20, 10) DEFAULT NULL, balanceOrphaned NUMERIC(20, 10) DEFAULT NULL, hashrate INT DEFAULT NULL, shareRate NUMERIC(2, 2) DEFAULT NULL, validShares INT DEFAULT NULL, invalidShares INT DEFAULT NULL, donate NUMERIC(2, 2) DEFAULT NULL, isAnonymous TINYINT(1) DEFAULT NULL, lastUpdate DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_432E65037B3406DF (pool_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
		$this->_executeSQL('ALTER TABLE pools ADD CONSTRAINT FK_1F7A78B7A76ED395 FOREIGN KEY (user_id) REFERENCES pools_users(id);');

		$this->_executeSQL('CREATE TABLE pools_servers (id INT AUTO_INCREMENT NOT NULL, pool_id INT DEFAULT NULL, address VARCHAR(255) NOT NULL, port INT NOT NULL, INDEX IDX_707F7B8C7B3406DF (pool_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
		$this->_executeSQL('CREATE TABLE pools_users_workers (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, password VARCHAR(100) NOT NULL, monitor TINYINT(1) DEFAULT NULL, hashrate INT DEFAULT NULL, difficulty NUMERIC(15, 10) DEFAULT NULL, INDEX IDX_B991BEC3A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');

		return new Version('0.0.1');
	}

	/**
	 * Uninstall bundle
	 */
	public function uninstall()
	{
		$this->_dropTables(array(
			'pools_apis',
			'pools_shares',
			'pools_network',
			'pools_blocks',
			'pools_users_workers',
			'pools_users',
			'pools_servers',
			'pools'
		));
	}

	/**
	 * Update bundle
	 *
	 * @param BundleVersion $bundleVersion
	 */
	public function update(BundleVersion $bundleVersion)
	{
		return $this->_updateOneVersionOneMethod($this, $bundleVersion);
	}

	public function update_0_0_2()
	{
		$this->_executeSQL('ALTER TABLE pools ADD refreshEnabled TINYINT(1) DEFAULT 1 NOT NULL;');
		$this->_executeSQL('ALTER TABLE pools ADD refreshErrors LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json_array)\', CHANGE refreshEnabled refreshEnabled TINYINT(1) NOT NULL;');
		$this->_executeSQL('ALTER TABLE pools_shares ADD refreshErrors LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json_array)\';');
		$this->_executeSQL('ALTER TABLE pools_network ADD refreshErrors LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json_array)\';');
		$this->_executeSQL('ALTER TABLE pools_blocks ADD refreshErrors LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json_array)\';');
		$this->_executeSQL('ALTER TABLE pools_users ADD refreshErrors LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json_array)\';');
		$this->_executeSQL('ALTER TABLE pools_users CHANGE pool_id pool_id INT NOT NULL;');
		$this->_executeSQL('ALTER TABLE pools_users_workers ADD refreshErrors LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json_array)\';');
		$this->_executeSQL('ALTER TABLE pools_users_workers ADD lastUpdate DATETIME DEFAULT NULL;');
	}

}