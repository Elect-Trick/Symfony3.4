<?php

namespace ServicesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTimeZone;
use DateTime;
use ServicesBundle\Entity\Ticket_Comment;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket")
 * @ORM\Entity(repositoryClass="ServicesBundle\Repository\TicketRepository")
 */
class Ticket
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
     * @ORM\Column(name="ticket_reference", type="string", length=255)
     */
    private $ticketReference;

    /**
     * @var int
     *
     * @ORM\Column(name="status_id", type="integer")
     */
    private $statusId;

    /**
     * @var string
     *
     * @ORM\Column(name="network_id", type="string", length=255)
     */
    private $networkId;

    /**
     * @var int
     *
     * @ORM\Column(name="location_id", type="integer")
     * @ORM\ManyToOne(targetEntity="OrdersBundle\Entity\Sdu_Locations")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="tickets")
     */
    private $locationId;

    /**
     * @var string
     *
     * @ORM\Column(name="location_type", type="string", length=20)
     */
    private $locationType;

    /**
     * @var int
     *
     * @ORM\Column(name="service_id", type="integer")
     */
    private $serviceId;

    /**
     * @var int
     *
     * @ORM\Column(name="fault_id", type="integer")
     */
    private $faultId;

    /**
     * @var string
     *
     * @ORM\Column(name="fault_description", type="text")
     */
    private $faultDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="client_name", type="string", length=255)
     */
    private $clientName;

    /**
     * @var string
     *
     * @ORM\Column(name="client_surname", type="string", length=255)
     */
    private $clientSurname;

    /**
     * @var string
     *
     * @ORM\Column(name="client_contact_number", type="string", length=255)
     */
    private $clientContactNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="client_email", type="string", length=255)
     */
    private $clientEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="alternative_contact_name", type="string", length=255, nullable=true)
     */
    private $alternativeContactName;

    /**
     * @var string
     *
     * @ORM\Column(name="alternative_number", type="string", length=255, nullable=true)
     */
    private $alternativeNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime")
     */
    private $creationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_updated", type="datetime")
     */
    private $lastUpdated;

    /**
     * @var int
     *
     * @ORM\Column(name="organization_id", type="integer")
     */
    private $organizationId;

    /**
     * @var int
     *
     * @ORM\Column(name="technician_id", type="integer", nullable=true)
     * @ORM\OneToOne(targetEntity="UserBundle\Entity\Technicians")
     * @ORM\JoinColumn(name="technician_id", referencedColumnName="id")
     */
    private $technicianId;

    /**
     * ORM\ManyToOne(targetEntity="OrdersBundle\Entity\Sdu_Locations")
     * @ORM\JoinColumn(name="sdu_location", referencedColumnName="tickets")
     */
    private $sduLocation;
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
     * Set ticketReference
     *
     * @param string $ticketReference
     *
     * @return Ticket
     */
    public function setTicketReference($ticketReference)
    {
        $this->ticketReference = $ticketReference;

        return $this;
    }

    /**
     * Get ticketReference
     *
     * @return string
     */
    public function getTicketReference()
    {
        return $this->ticketReference;
    }

    /**
     * Set statusId
     *
     * @param integer $statusId
     *
     * @return Ticket
     */
    public function setStatusId($statusId)
    {
        $this->statusId = $statusId;

        return $this;
    }

    /**
     * Get statusId
     *
     * @return int
     */
    public function getStatusId()
    {
        return $this->statusId;
    }

    /**
     * Set networkId
     *
     * @param string $networkId
     *
     * @return Ticket
     */
    public function setNetworkId($networkId)
    {
        $this->networkId = $networkId;

        return $this;
    }

    /**
     * Get networkId
     *
     * @return string
     */
    public function getNetworkId()
    {
        return $this->networkId;
    }

    /**
     * Set locationId
     *
     * @param integer $locationId
     *
     * @return Ticket
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;

        return $this;
    }

    /**
     * Get locationId
     *
     * @return int
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Set locationType
     *
     * @param string $locationType
     *
     * @return Ticket
     */
    public function setLocationType($locationType)
    {
        $this->locationType = $locationType;

        return $this;
    }

    /**
     * Get locationType
     *
     * @return string
     */
    public function getLocationType()
    {
        return $this->locationType;
    }

    /**
     * Set serviceId
     *
     * @param integer $serviceId
     *
     * @return Ticket
     */
    public function setServiceId($serviceId)
    {
        $this->serviceId = $serviceId;

        return $this;
    }

    /**
     * Get serviceId
     *
     * @return int
     */
    public function getServiceId()
    {
        return $this->serviceId;
    }

    /**
     * Set faultId
     *
     * @param integer $faultId
     *
     * @return Ticket
     */
    public function setFaultId($faultId)
    {
        $this->faultId = $faultId;

        return $this;
    }

    /**
     * Get faultId
     *
     * @return int
     */
    public function getFaultId()
    {
        return $this->faultId;
    }

    /**
     * Set faultDescription
     *
     * @param string $faultDescription
     *
     * @return Ticket
     */
    public function setFaultDescription($faultDescription)
    {
        $this->faultDescription = $faultDescription;

        return $this;
    }

    /**
     * Get faultDescription
     *
     * @return string
     */
    public function getFaultDescription()
    {
        return $this->faultDescription;
    }

    /**
     * Set clientName
     *
     * @param string $clientName
     *
     * @return Ticket
     */
    public function setClientName($clientName)
    {
        $this->clientName = $clientName;

        return $this;
    }

    /**
     * Get clientName
     *
     * @return string
     */
    public function getClientName()
    {
        return $this->clientName;
    }

    /**
     * Set clientSurname
     *
     * @param string $clientSurname
     *
     * @return Ticket
     */
    public function setClientSurname($clientSurname)
    {
        $this->clientSurname = $clientSurname;

        return $this;
    }

    /**
     * Get clientSurname
     *
     * @return string
     */
    public function getClientSurname()
    {
        return $this->clientSurname;
    }

    /**
     * Set clientContactNumber
     *
     * @param string $clientContactNumber
     *
     * @return Ticket
     */
    public function setClientContactNumber($clientContactNumber)
    {
        $this->clientContactNumber = $clientContactNumber;

        return $this;
    }

    /**
     * Get clientContactNumber
     *
     * @return string
     */
    public function getClientContactNumber()
    {
        return $this->clientContactNumber;
    }

    /**
     * Set clientEmail
     *
     * @param string $clientEmail
     *
     * @return Ticket
     */
    public function setClientEmail($clientEmail)
    {
        $this->clientEmail = $clientEmail;

        return $this;
    }

    /**
     * Get clientEmail
     *
     * @return string
     */
    public function getClientEmail()
    {
        return $this->clientEmail;
    }

    /**
     * Set alternativeContactName
     *
     * @param string $alternativeContactName
     *
     * @return Ticket
     */
    public function setAlternativeContactName($alternativeContactName)
    {
        $this->alternativeContactName = $alternativeContactName;

        return $this;
    }

    /**
     * Get alternativeContactName
     *
     * @return string
     */
    public function getAlternativeContactName()
    {
        return $this->alternativeContactName;
    }

    /**
     * Set alternativeNumber
     *
     * @param string $alternativeNumber
     *
     * @return Ticket
     */
    public function setAlternativeNumber($alternativeNumber)
    {
        $this->alternativeNumber = $alternativeNumber;

        return $this;
    }

    /**
     * Get alternativeNumber
     *
     * @return string
     */
    public function getAlternativeNumber()
    {
        return $this->alternativeNumber;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Ticket
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set lastUpdated
     *
     * @param \DateTime $lastUpdated
     *
     * @return Ticket
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;

        return $this;
    }

    /**
     * Get lastUpdated
     *
     * @return \DateTime
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * Set organizationId
     *
     * @param integer $organizationId
     *
     * @return Ticket
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
     * Set technicianId
     *
     * @param integer $technicianId
     *
     * @return Ticket
     */
    public function setTechnicianId($technicianId)
    {
        $this->technicianId = $technicianId;

        return $this;
    }

    /**
     * Get technicianId
     *
     * @return int
     */
    public function getTechnicianId()
    {
        return $this->technicianId;
    }

    public function __construct($input)
    {

        $data = json_decode($input);
        $time_zone = new DateTimeZone('Africa/Harare');
        $this->setLastUpdated(new DateTime('now', $time_zone));
        $this->setCreationDate(new DateTime('now', $time_zone));
        $this->setAlternativeContactName($data->alternative_contact_name);
        $this->setAlternativeNumber($data->alternative_number);
        $this->setClientContactNumber(198764477);
        $this->setClientEmail($data->client_email);
        $this->setClientName($data->client_name);
        $this->setClientSurname($data->client_surname);
        $this->setFaultDescription($data->fault_description);
        $this->setFaultId($data->fault_id);
        $this->setLocationId($data->location_id);
        $this->setLocationType($data->location_type);
        $this->setNetworkId($data->network_id);
        $this->setOrganizationId($data->organization_id);
        $this->setServiceId($data->service_id);
        $this->setTechnicianId(0);
        $this->setTicketReference("Bloop");
        $this->setStatusId($data->ticket_status);
    }

   
}
