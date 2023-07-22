<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTimeZone;
use DateTime;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class User implements UserInterface
{

    public function __construct($input)
    {

        $time_zone = new DateTimeZone('Africa/Harare');
        $this->setUserLastLogin(new DateTime('now', $time_zone));
        $this->setUserAccountName($input->account_name);
        $this->setUserName($input->e_mail);
        $options = [
            "cost" => 12,
        ];
        $hashed_password = password_hash($input->password, PASSWORD_BCRYPT, $options);
        $this->setPassword($hashed_password);
        $roles = array();
        array_push($roles, $input->user_role,"ROLE_PUBLIC");
        $this->setOrganizationId($input->organization);
        $this->setRoles($roles);
        // $this->setUserLastLogin($data->userLastLogin);
        $this->setIsActive(true);
    }


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="user_account_name", type="string", length=255, unique=false)
     */
    private $userAccountName;

    /**
     * @var string
     *
     * @ORM\Column(name="user_email", type="string", length=255, unique=true)
     */
    private $userEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, unique=false)
     */
    private $password;

    /**
     * @var int
     *
     * @ORM\Column(name="organization_id", type="integer")
     */
    private $organizationId;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="array")
     */
    private $roles;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="user_last_login", type="datetime", nullable=true)
     */
    private $userLastLogin;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_Active", type="boolean")
     */
    private $isActive;
 




    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userAccountName
     *
     * @param string $userAccountName
     *
     * @return User
     */
    public function setUserAccountName($userAccountName)
    {
        $this->userAccountName = $userAccountName;

        return $this;
    }

    /**
     * Get userAccountName
     *
     * @return string
     */
    public function getUserAccountName()
    {
        return $this->userAccountName;
    }

    /**
     * Set userEmail
     *
     * @param string $userEmail
     *
     * @return User
     */
    public function setUserName($userEmail)
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    /**
     * Get userEmail
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userEmail;
    }
  

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return string
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return User
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set organizationId
     *
     * @param integer $organizationId
     *
     * @return User
     */
    public function setOrganizationId($organizationId)
    {
        $this->organizationId = $organizationId;

        return $this;
    }

    /**
     * Get organizationId
     *
     * @return int
     */
    public function getOrganizationId()
    {
        return $this->organizationId;
    }



    /**
     * Set userLastLogin
     *
     * @param \DateTime $userLastLogin
     *
     * @return User
     */
    public function setUserLastLogin($userLastLogin)
    {
        $this->userLastLogin = $userLastLogin;

        return $this;
    }

    /**
     * Get userLastLogin
     *
     * @return \DateTime
     */
    public function getUserLastLogin()
    {
        return $this->userLastLogin;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return bool
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    public function __toString()
    {
        return $this->getUserName();
    }

    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    public function serialize()
    {
        return serialize([
            $this->id,
            $this->userEmail,
            $this->userAccountName,
            $this->password,
            // $this->roles,
            // $this->salt,
            // $this->isActive,
            // $this->userLastLogin,
            // $this->organizationId
        ]);
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->userEmail,
            $this->userAccountName,
            $this->password,
            // $this->roles,
            // $this->salt,
            // $this->isActive,
            // $this->userLastLogin,
            // $this->organizationId

            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }
    public function eraseCredentials()
    {
    }

    /**
     * Set userEmail
     *
     * @param string $userEmail
     *
     * @return User
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    /**
     * Get userEmail
     *
     * @return string
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }


}
