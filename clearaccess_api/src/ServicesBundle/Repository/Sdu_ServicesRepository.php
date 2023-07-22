<?php

namespace ServicesBundle\Repository;

use Doctrine\DBAL\Types\Type;
use ServicesBundle\Entity\Sdu_Services;

/**
 * Sdu_ServicesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class Sdu_ServicesRepository extends \Doctrine\ORM\EntityRepository
{

    public function findDuplicateService(Sdu_Services $input)
    {
        $query_builder = $this->createQueryBuilder('s');
        $query_builder->select('s.locationId');
        $query_builder->where($query_builder->expr()->andX(
            $query_builder->expr()->eq('s.serviceStatus', ':service_status'),
            $query_builder->expr()->eq('s.locationId', ':location_id')
        ));
        $query_builder->setParameter('service_status', $input->getServiceStatus(), Type::INTEGER);
        $query_builder->setParameter('location_id', $input->getLocationId(), Type::INTEGER);
        $result = $query_builder->getQuery()->getResult();

        return $result;
    }

    /**
     * This function is used to retrieve a location then place a order based on that location.
     * Accepts an object with the location type and location search string. 
     * It then returns a id and type, possibly more...
     *
     * 
     * 
     */
    public function findServiceByLocation(string $unit, string $sdu_street_name, string $surburb)
    {

        if (empty($surburb)) {
            $query_builder = $this->getEntityManager()->createQuery('select
            l.locationId as location_id,
            l.sduUnit as unit,
            l.sduStreetName as street_name,
            l.sduSurburb as surburb,
            l.locationType as location_type,
            s.serviceId as service_id,
            s.product as product_id ,
            s.organizationId as organization_id,
            s.ispOrderNumber as isp_order_number,
            s.orderType as order_type,
            s.networkId as network_id,
            s.ispMacModem as isp_modem_mac,
            s.serviceStatus as service_status,
            s.lastUpdated as last_updated,
            s.vlan,
            o.clientName as client_name,
            o.clientSurname as client_surname,
            o.clientEmail as client_email,
            o.clientContactNumber as client_contact_number,
            o.orderNumber as order_number,
           
            p.productName as product_name
            from OrdersBundle\Entity\Sdu_Locations l 
            inner join ServicesBundle\Entity\Sdu_Services s WITH s.locationId=l.locationId
            inner join OrdersBundle\Entity\Sdu_Orders o with o.orderId=s.orderId
            inner join OrdersBundle\Entity\Products p with p.productId=s.product

             where l.sduUnit like :unit AND  l.sduStreetName like :street_name');
            $query_builder->setParameter('unit', '%' . $unit . '%', Type::STRING);
            $query_builder->setParameter('street_name', '%' . $sdu_street_name . '%', Type::STRING);
            $result = $query_builder->getResult();
            return $result;
        } else {

            $query_builder = $this->getEntityManager()->createQuery(
            'select
            l.locationId as location_id,
            l.sduUnit as unit,
            l.sduStreetName as street_name,
            l.sduSurburb as surburb,
            l.locationType as location_type,
            s.product as product_id ,
            s.organizationId as organization_id,
            s.ispOrderNumber as isp_order_number,
            s.orderType as order_type,
            s.networkId as network_id,
            s.ispMacModem as isp_modem_mac,
            s.serviceStatus as service_status,
            s.lastUpdated as last_updated,
            s.vlan,
            o.clientName as client_name,
            o.clientSurname as client_surname,
            o.clientEmail as client_email,
            o.clientContactNumber as client_contact_number,
            o.orderNumber as order_number
            from OrdersBundle\Entity\Sdu_Locations l 
            inner join ServicesBundle\Entity\Sdu_Services s WITH s.locationId=l.locationId
            inner join OrdersBundle\Entity\Sdu_Orders o with o.orderId=s.orderId
            inner join OrdersBundle\Entity\Products p with p.productId=s.product
             where( l.sduUnit like :unit AND  l.sduStreetName like :street_name AND  l.sduSurburb like :surburb)');
            $query_builder->setParameter('unit', '%' . $unit . '%', Type::STRING);
            $query_builder->setParameter('street_name', '%' . $sdu_street_name . '%', Type::STRING);
            $query_builder->setParameter('surburb', '%' . $surburb . '%', Type::STRING);
            $result = $query_builder->getResult();
            return $result;
        }
    }

    /**
     * This function is used to retrieve a location then place a order based on that location.
     * Accepts an object with the location type and location search string. 
     * It then returns a id and type, possibly more...
     *
     * 
     * 
     */
    public function findByFSAN(string $fsan)
    {

        if (!empty($fsan)) {
            $query_builder = $this->getEntityManager()->createQuery('select
            l.locationId as location_id,
            l.sduUnit as unit,
            l.sduStreetName as street_name,
            l.sduSurburb as surburb,
            l.locationType as location_type,
            s.serviceId as service_id,
            s.product as product_id ,
            s.organizationId as organization_id,
            s.ispOrderNumber as isp_order_number,
            s.orderType as order_type,
            s.networkId as network_id,
            s.ispMacModem as isp_modem_mac,
            s.serviceStatus as service_status,
            s.lastUpdated as last_updated,
            s.vlan,
            o.clientName as client_name,
            o.clientSurname as client_surname,
            o.clientEmail as client_email,
            o.clientContactNumber as client_contact_number,
            o.orderNumber as order_number
            from OrdersBundle\Entity\Sdu_Locations l 
            inner join ServicesBundle\Entity\Sdu_Services s WITH s.locationId=l.locationId
            inner join OrdersBundle\Entity\Sdu_Orders o with o.orderId=s.orderId
             where s.networkId like :fsan');
            $query_builder->setParameter('fsan', '%' . $fsan . '%', Type::STRING);
            $result = $query_builder->getResult();
            return $result;
        }
    }
}