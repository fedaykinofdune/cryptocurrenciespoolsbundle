<?php
namespace kujaff\CryptoCurrenciesPoolsBundle\Pools;

use Doctrine\ORM\Event\LifecycleEventArgs;
use kujaff\CryptoCurrenciesPoolsBundle\Entity\Pool;

/**
 * Listen doctrine events
 */
class DoctrineListener
{

	/**
	 * Clean data before update if pool refresh is not enabled
	 *
	 * @param LifecycleEventArgs $args
	 */
	public function preUpdate(LifecycleEventArgs $args)
	{
		if ($args->getEntity() instanceof Pool && $args->getEntity()->getRefreshEnabled() == false) {
			$args->getEntity()->clean();
			$args->getEntity()->getBlocks()->clean();
			$args->getEntity()->getNetwork()->clean();
			$args->getEntity()->getShares()->clean();
			$args->getEntity()->getUser()->clean();
			foreach ($args->getEntity()->getUser()->getWorkers()->toArray() as $worker) {
				$worker->clean();
			}
		}
	}

}