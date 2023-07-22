<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Technicians
 *
 * @ORM\Table(name="technicians")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\TechniciansRepository")
 */
class Technicians
{
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
     * @ORM\Column(name="tech_name", type="string", length=255)
     */
    private $techName;

    /**
     * @var string
     *
     * @ORM\Column(name="tech_surname", type="string", length=255)
     */
    private $techSurname;

    /**
     * @var string
     *
     * @ORM\Column(name="tech_email", type="string", length=255)
     */
    private $techEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_number", type="string", length=255)
     */
    private $contactNumber;


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
     * Set techName
     *
     * @param string $techName
     *
     * @return Technicians
     */
    public function setTechName($techName)
    {
        $this->techName = $techName;

        return $this;
    }

    /**
     * Get techName
     *
     * @return string
     */
    public function getTechName()
    {
        return $this->techName;
    }

    /**
     * Set techSurname
     *
     * @param string $techSurname
     *
     * @return Technicians
     */
    public function setTechSurname($techSurname)
    {
        $this->techSurname = $techSurname;

        return $this;
    }

    /**
     * Get techSurname
     *
     * @return string
     */
    public function getTechSurname()
    {
        return $this->techSurname;
    }

    /**
     * Set techEmail
     *
     * @param string $techEmail
     *
     * @return Technicians
     */
    public function setTechEmail($techEmail)
    {
        $this->techEmail = $techEmail;

        return $this;
    }

    /**
     * Get techEmail
     *
     * @return string
     */
    public function getTechEmail()
    {
        return $this->techEmail;
    }

    /**
     * Set contactNumber
     *
     * @param string $contactNumber
     *
     * @return Technicians
     */
    public function setContactNumber($contactNumber)
    {
        $this->contactNumber = $contactNumber;

        return $this;
    }

    /**
     * Get contactNumber
     *
     * @return string
     */
    public function getContactNumber()
    {
        return $this->contactNumber;
    }
}
