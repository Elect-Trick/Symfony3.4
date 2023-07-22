<?php

namespace ServicesBundle\Repository;

use Doctrine\DBAL\Types\Type;
use ServicesBundle\Entity\Ticket;
use ServicesBundle\Entity\Ticket_Comment;

/**
 * TicketRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TicketRepository extends \Doctrine\ORM\EntityRepository
{

    public function findDuplicateTicket(Ticket $input)
    {


        $query_builder = $this->createQueryBuilder('t');
        $query_builder->select('t.id');
        $query_builder->where($query_builder->expr()->andX(
            $query_builder->expr()->notIn('t.statusId', 5),
            $query_builder->expr()->eq('t.locationId', ':location_id'),
            $query_builder->expr()->eq('t.serviceId', ':service_id'),
            $query_builder->expr()->eq('t.locationType', ':location_type')

        ));

        $query_builder->setParameter('location_id', $input->getLocationId(), Type::INTEGER);
        $query_builder->setParameter('service_id', $input->getServiceId(), Type::INTEGER);
        $query_builder->setParameter('location_type', $input->getLocationType(), Type::INTEGER);
        $result = $query_builder->getQuery()->getResult();
        return $result;
    }

    public function countEntries()
    {
        $query_builder = $this->createQueryBuilder('t');
        $query_builder->select('count(t.id)');
        $result = $query_builder->getQuery()->getSingleScalarResult();

        return $result;
    }

    public function fetchTickets($input)
    {
        $type = json_decode($input)->type;
        // Pagination
        $page = json_decode($input)->page;

        $query_builder = $this->createQueryBuilder('t');

        $query_builder->select('
        t.id as ticket_id,
        t.ticketReference as ticket_reference,
        t.statusId as ticket_status,
        t.networkId as network_id,
        t.locationId as location_id,
        t.locationType as location_type,
        t.serviceId as service_id,
        t.faultId as fault_id,
        t.faultDescription as fault_description,
        t.clientName as client_name,
        t.clientSurname as client_surname,
        t.clientContactNumber as client_contact_number,
        t.clientEmail as client_email,
        t.alternativeNumber as alternative_number,
        t.creationDate as creation_date,
        t.lastUpdated as last_updated,
        t.organizationId as organization_id,
        t.technicianId as tech_id,
        u.id,
        u.techName as tech_name,
        u.techSurname as tech_surname,
        u.contactNumber as contact_number');

        $query2 = $this->createQueryBuilder('c');
        $query2->select('count(c.id)');
        $page_size = 2;
        $off_set = ($page -1) *$page_size;


        switch ($type) {
            case 'open':
                # code...

                $query_builder->where($query_builder->expr()->notIn('t.statusId', ':order_status'));
                $query2->where($query2->expr()->notIn('c.statusId', ':order_status'));

                break;

            case 'closed':

                $query_builder->where($query_builder->expr()->in('t.statusId', ':order_status'));
                $query2->where($query2->expr()->in('c.statusId', ':order_status'));
                # code...
                break;
        }
        $query_builder ->setFirstResult($off_set);
        $query_builder ->setMaxResults($page_size);
        $query_builder->leftJoin('UserBundle\Entity\Technicians', 'u', 'WITH', 't.technicianId = u.id');
        $query_builder->setParameter('order_status', 5);
        $query_builder->addSelect('(' . $query2->getDQL() . ') as total_entries');
        $result = $query_builder->getQuery()->getResult();
        return $result;
    }


    /**
     * Marks the ticket as on of the statuses below. 
     *  States:  
     *Open = 1,
     *Assigned To Tech' = 2,
     *Resolved- ISP To Confirm' = 3,
     *Disputed' = 4,
     *Closed' = 5,
     *
     * accepts a comment object that includes a ticket_id field and new status of ticket. 
     * Adds a comment to the ticket for ISP or FNO to dispute, accept and or resolve.
     * 
     */
    public function updateTicket($input)
    {


        try {
            //code...
            $ticket_id = json_decode($input)->ticket_id;
            $status_id = json_decode($input)->status_id;


            $query_builder = $this->createQueryBuilder('t');
            $query_builder->update('ServicesBundle\Entity\Ticket', 't');
            $query_builder->set('t.statusId', ':status_id');
            $query_builder->where('t.id =:ticket_id');
            if (!empty(json_decode($input)->technician_id)) {
                $tech_id = json_decode($input)->technician_id;
                $query_builder->set('t.technicianId', ':tech_id');
                $query_builder->setParameter('tech_id', $tech_id);
            }
            $query_builder->setParameter('status_id', $status_id);
            $query_builder->setParameter('ticket_id', $ticket_id);
            $query_builder->getQuery()->getResult();

            return true;
        } catch (\Throwable $th) {

            return false;
        }
    }




    /**
     * Retrieves tickets associated with a particular location
     * Accepts a location id of type int. 
     * 
     */
    public function findTicketsByLocation($input)
    {
        $type = json_decode($input)->type;
        $organization_id = json_decode($input)->organization_id;
        $query_builder = $this->createQueryBuilder('t');
        $query_builder->select('
        t.id as ticket_id,
        t.ticketReference as ticket_reference,
        t.statusId as ticket_status,
        t.networkId as network_id,
        t.locationId as location_id,
        t.locationType as location_type,
        t.serviceId as service_id,
        t.faultId as fault_id,
        t.faultDescription as fault_description,
        t.clientName as client_name,
        t.clientSurname as client_surname,
        t.clientContactNumber as client_contact_number,
        t.clientEmail as client_email,
        t.alternativeNumber as alternative_number,
        t.creationDate as creation_date,
        t.lastUpdated as last_updated,
        t.organizationId as organization_id,
        t.technicianId as tech_id,
        u.id,
        u.techName as tech_name,
        u.techSurname as tech_surname,
        u.contactNumber as contact_number');

        switch ($type) {
            case 'ticket_id':
                $search_string = json_decode($input)->searchString;
                // echo "search string is ". $search_string;
                # code...
                $query_builder->where($query_builder->expr()->andX(
                    // $query_builder->expr()->eq('t.locationId', ':location_id'),
                    $query_builder->expr()->like('t.ticketReference', ':ticket_reference'),
                    $query_builder->expr()->eq('t.organizationId', ':organization_id')
                ));
                // $query_builder->setParameter('location_id', $location_id);
                $query_builder->setParameter('ticket_reference', $search_string);
                $query_builder->setParameter('organization_id', $organization_id);
                break;

            case 'sdu':
                # code...
                $location_id = json_decode($input)->page;

                $query_builder->where($query_builder->expr()->andX(
                    $query_builder->expr()->eq('t.locationId', ':location_id'),
                    $query_builder->expr()->eq('t.locationType', ':location_type'),
                    $query_builder->expr()->eq('t.organizationId', ':organization_id')
                ));
                $query_builder->setParameter('location_id', $location_id);
                $query_builder->setParameter('location_type', $type);
                $query_builder->setParameter('organization_id', $organization_id);
                break;

            case 'mdu':
                $location_id = json_decode($input)->page;

                $query_builder->where($query_builder->expr()->andX(
                    $query_builder->expr()->eq('t.locationId', ':location_id'),
                    $query_builder->expr()->eq('t.locationType', ':location_type'),
                    $query_builder->expr()->eq('t.organizationId', ':organization_id')
                ));
                $query_builder->setParameter('location_id', $location_id);
                $query_builder->setParameter('location_type', $type);
                $query_builder->setParameter('organization_id', $organization_id);
                break;
        }

        // $query2 = $this->createQueryBuilder('c');
        // $query2->select('count(c.id)');

        // $query2->where($query2->expr()->notIn('c.statusId', ':order_status'));


        $query_builder->leftJoin('UserBundle\Entity\Technicians', 'u', 'WITH', 't.technicianId = u.id');
        $query_builder->orderBy('t.creationDate', 'DESC');
        // $query_builder->leftJoin('ServicesBundle\Entity\Ticket_Comment', 'c', 'WITH', 'c.ticketId = t.id');
        // $query_builder->Join('ServicesBundle\Entity\Ticket_Comment', 'c');

        // $query_builder->addSelect('(' . $query2->getDQL() . ') as total_entries');
        $result = $query_builder->getQuery()->getResult();
        return $result;
    }
}
