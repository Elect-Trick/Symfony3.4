<?php

namespace ServicesBundle\Repository;

/**
 * Ticket_CommentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class Ticket_CommentRepository extends \Doctrine\ORM\EntityRepository
{
    public function fetchTicketComments($input)
    {
        $ticket_id = json_decode($input)->ticket_id;
        // $page = json_decode($input)->page;

        $query_builder = $this->createQueryBuilder('c');

        $query_builder->select('
        c.id as comment_id,
       c.replierEmail as replier_email,
       c.comment,
       c.replyDate as reply_date,
       c.ticketId as ticket_id
       ');


        $query_builder->where($query_builder->expr()->eq('c.ticketId', ':ticket_id'));
        // $query_builder->leftJoin('UserBundle\Entity\Technicians', 'u', 'WITH', 'c.technicianId = u.id');
        $query_builder->setParameter('ticket_id', $ticket_id);
        $result = $query_builder->getQuery()->getResult();
        return $result;
    }
}