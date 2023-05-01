<?php

namespace CarBundle\Repository;

/**
 * CarRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CarRepository extends \Doctrine\ORM\EntityRepository
{

    public function FindCarsWithDetails(){
        $query_builder =  $this->createQueryBuilder('c');
        $query_builder ->select('c,make,model');
        $query_builder ->join('c.make','make');
        $query_builder ->join('c.model','model');
         return $query_builder->getQuery()->getResult();
        
    }
}