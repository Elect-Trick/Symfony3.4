<?php

namespace ServicesBundle\Repository;

use Doctrine\DBAL\Types\Type;
use ServicesBundle\Entity\Regrade;

/**
 * RegradeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RegradeRepository extends \Doctrine\ORM\EntityRepository
{

    public function findDuplicateOrder(Regrade $input)
    {
        $query_builder = $this->createQueryBuilder('r');
        $query_builder->select('r.id');
        $query_builder->where($query_builder->expr()->andX(
            $query_builder->expr()->eq('r.orderStatus', ':order_status'),
            $query_builder->expr()->eq('r.serviceId', ':service_id')
        ));
        $query_builder->setParameter('order_status', $input->getOrderStatus(), Type::INTEGER);
        $query_builder->setParameter('service_id', $input->getServiceId(), Type::INTEGER);
        $query_builder->groupBy('r.id');
        $result = $query_builder->getQuery()->getResult();

        return $result;
    }
    public function countEntries()
    {
        $query_builder = $this->createQueryBuilder('r');
        $query_builder->select('count(r.id)');
        $result = $query_builder->getQuery()->getSingleScalarResult();

        return $result;
    }

    public function retrieveRegradeOrders(string $type, int $page)
    {
        //  order_status is used to filter out pending regrade orders

        $order_status = 1;

        $page_size = 2;
        $off_set = ($page - 1) * $page_size;

        $count_query = $this->createQueryBuilder('c');
        $count_query->select('count(c.id)');
        $count_query->where($count_query->expr()->in('c.orderStatus', ':order_status'));
        $count_query->setParameter('order_status', $order_status);

        $query_builder = $this->createQueryBuilder('r');
        $query_builder->select('
        r.id as id, 
        r.productId as product,
        r.oldProduct as old_product,
        r.ispReference as isp_reference,
        r.serviceId as service_id,
        r.locationType as location_type,
        r.orderStatus as order_status,
        r.orderType as order_type,
        r.creationDate as creation_date,
        r.orderNumber as order_number');
        $query_builder->where($query_builder->expr()->in('r.orderStatus', ':order_status'));

        $query_builder->setFirstResult($off_set);
        $query_builder->setMaxResults($page_size);
        $query_builder->setParameter('order_status', $order_status);
        $query_builder->addSelect('(' . $count_query->getDQL() . ') as totalEntries');

        $result = $query_builder->getQuery()->getResult();

        // $merged = array_merge($result,  $result2);

        return $result;
    }

    
}
