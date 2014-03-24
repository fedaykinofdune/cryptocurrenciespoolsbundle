<?php
namespace kujaff\CryptoCurrenciesPoolsBundle\Install;

use kujaff\VersionsBundle\Installer\EasyInstaller;
use kujaff\VersionsBundle\Installer\Install;
use kujaff\VersionsBundle\Installer\Uninstall;
use kujaff\VersionsBundle\Versions\Version;

class Installer extends EasyInstaller implements Install, Uninstall
{

	public function getBundleName()
	{
		return 'CryptoCurrenciesPoolsBundle';
	}

	public function install()
	{
		$this->_executeSQL('CREATE TABLE pools_shares (id INT AUTO_INCREMENT NOT NULL, pool_id INT DEFAULT NULL, round INT DEFAULT NULL, rate NUMERIC(2, 2) DEFAULT NULL, estimated INT DEFAULT NULL, UNIQUE INDEX UNIQ_D0D7D7DA7B3406DF (pool_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
		$this->_executeSQL('CREATE TABLE pools (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, address VARCHAR(255) NOT NULL, hashrate INT DEFAULT NULL, efficiency NUMERIC(2, 2) DEFAULT NULL, estimatedTime INT DEFAULT NULL, taxeFee NUMERIC(2, 2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
		$this->_executeSQL('CREATE TABLE pools_network (id INT AUTO_INCREMENT NOT NULL, pool_id INT DEFAULT NULL, hashrate INT DEFAULT NULL, estimatedTime INT DEFAULT NULL, nextDifficulty NUMERIC(15, 10) DEFAULT NULL, blocksUntilDiffChange INT DEFAULT NULL, difficulty NUMERIC(15, 10) DEFAULT NULL, currentBlock INT DEFAULT NULL, lastBlock INT DEFAULT NULL, nextBlock INT DEFAULT NULL, UNIQUE INDEX UNIQ_5F7109C77B3406DF (pool_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
		$this->_executeSQL('CREATE TABLE pools_blocks (id INT AUTO_INCREMENT NOT NULL, pool_id INT DEFAULT NULL, last INT DEFAULT NULL, currentBlockHeight INT DEFAULT NULL, estimatedTime INT DEFAULT NULL, progress SMALLINT DEFAULT NULL, timeSinceLast INT DEFAULT NULL, UNIQUE INDEX UNIQ_8E6533DE7B3406DF (pool_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
		$this->_executeSQL('CREATE TABLE pools_users (id INT AUTO_INCREMENT NOT NULL, pool_id INT DEFAULT NULL, apiKey VARCHAR(255) DEFAULT NULL, balanceConfirmed NUMERIC(20, 10) DEFAULT NULL, balanceUnconfirmed NUMERIC(20, 10) DEFAULT NULL, balanceOrphaned NUMERIC(20, 10) DEFAULT NULL, hashrate INT DEFAULT NULL, shareRate NUMERIC(2, 2) DEFAULT NULL, validShares INT DEFAULT NULL, invalidShares INT DEFAULT NULL, donate NUMERIC(2, 2) DEFAULT NULL, isAnonymous TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_432E65037B3406DF (pool_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
		$this->_executeSQL('CREATE TABLE pools_servers (id INT AUTO_INCREMENT NOT NULL, pool_id INT DEFAULT NULL, address VARCHAR(255) NOT NULL, port INT NOT NULL, INDEX IDX_707F7B8C7B3406DF (pool_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
		$this->_executeSQL('CREATE TABLE pools_users_workers (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, password VARCHAR(100) NOT NULL, monitor TINYINT(1) DEFAULT NULL, hashrate INT DEFAULT NULL, difficulty NUMERIC(15, 10) DEFAULT NULL, INDEX IDX_B991BEC3A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');

		$this->_executeSQL('ALTER TABLE pools_shares ADD CONSTRAINT FK_D0D7D7DA7B3406DF FOREIGN KEY (pool_id) REFERENCES pools (id);');
		$this->_executeSQL('ALTER TABLE pools_network ADD CONSTRAINT FK_5F7109C77B3406DF FOREIGN KEY (pool_id) REFERENCES pools (id);');
		$this->_executeSQL('ALTER TABLE pools_blocks ADD CONSTRAINT FK_8E6533DE7B3406DF FOREIGN KEY (pool_id) REFERENCES pools (id);');
		$this->_executeSQL('ALTER TABLE pools_users ADD CONSTRAINT FK_432E65037B3406DF FOREIGN KEY (pool_id) REFERENCES pools (id);');
		$this->_executeSQL('ALTER TABLE pools_servers ADD CONSTRAINT FK_707F7B8C7B3406DF FOREIGN KEY (pool_id) REFERENCES pools (id);');
		$this->_executeSQL('ALTER TABLE pools_users_workers ADD CONSTRAINT FK_B991BEC3A76ED395 FOREIGN KEY (user_id) REFERENCES pools_users (id);');

		return new Version('0.0.1');
	}

	public function uninstall()
	{
		$this->_dropTables(array(
			'pools_shares',
			'pools_network',
			'pools_blocks',
			'pools_users_workers',
			'pools_users',
			'pools_servers',
			'pools'
		));
	}

}