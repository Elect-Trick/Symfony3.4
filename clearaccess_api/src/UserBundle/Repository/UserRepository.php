<?php

namespace UserBundle\Repository;

use Doctrine\DBAL\Types\Type;
use stdClass;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use UserBundle\Entity\User;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{

    public function FindByEmail(string $email)
    {

        //    Set Parameter is awesome, no more long sql prepare statements
        // Here  we are running a search query based on the user's email
        $query_builder =  $this->createQueryBuilder('u');
        $query_builder->select('u.userAccountName as account_name, u.userEmail as e_mail, u.password, u.organizationId as organization, u.roles as roles,u.userLastLogin, u.isActive ');
        $query_builder->Where('u.userEmail = :email');
        $query_builder->setParameter('email', $email);
        $result = $query_builder->getQuery()->getResult();

        return  $result;
    }
    public function fetchUsers(int $page)
    {
        $page_size = 2;
        $off_set = ($page - 1) * $page_size;

        //    Set Parameter is awesome, no more long sql prepare statements
        // Here  we are running a search query based on the user's email
        $query_builder =  $this->createQueryBuilder('u');
        $query_builder->select('u.userAccountName as account_name,
         u.userEmail as email,
          u.organizationId as organization,
          u.roles as roles ,
          u.userLastLogin,
           u.isActive ');
        $query2 = $this->createQueryBuilder('c');
        $query2->select('count(c.id)');
        $query2->where($query2->expr()->isNotNull('c.id'));
        $query_builder ->setFirstResult($off_set);
        $query_builder->setMaxResults($page_size);
        $query_builder ->addSelect('('. $query2->getDQL(). ') as totalEntries');
        $result = $query_builder->getQuery()->getResult();

        return  $result;
    }
    public function findDuplicateUser(User $input)
    {
        $query_builder = $this->createQueryBuilder('u');
        $query_builder->select('u.userEmail');
        $query_builder->where($query_builder->expr()->eq('u.userEmail', ':email'));
        $query_builder->setParameter('email', '%' . $input->getUserEmail(), Type::INTEGER);
        $query_builder->setMaxResults(1);
        $result = $query_builder->getQuery()->getResult();
        return $result;
    }
}