<?php

namespace AppBundle\Repository;

/**
 * LocationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LocationRepository extends \Doctrine\ORM\EntityRepository {

    public function fulltextQuery($q) {
        $qb = $this->createQueryBuilder('e');
        $qb->addSelect("MATCH_AGAINST (e.city, e.region, e.country) AGAINST (:q BOOLEAN) as HIDDEN score");
        $qb->add('where', "MATCH_AGAINST (e.city, e.region, e.country) AGAINST (:q BOOLEAN) > 0");
        $qb->orderBy('score', 'desc');
        $qb->setParameter('q', $q);
        return $qb->getQuery();
    }

}
