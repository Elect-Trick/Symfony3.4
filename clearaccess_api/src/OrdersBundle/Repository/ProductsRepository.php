<?php

namespace OrdersBundle\Repository;

/**
 * ProductsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductsRepository extends \Doctrine\ORM\EntityRepository
{

    public function fetchProducts()
    {
        $query_builder = $this->createQueryBuilder('p');
        $query_builder->select('p.productId as product_id,
        p.productName as product_name,
        p.productPrice as product_price');
        $result = $query_builder->getQuery()->execute();
        

        return $result;
    }
}