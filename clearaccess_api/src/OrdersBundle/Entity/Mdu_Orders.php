<?php

namespace OrdersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;
use DateTimeZone;

/**
 * Mdu_Orders
 *
 * @ORM\Table(name="mdu__orders")
 * @ORM\Entity(repositoryClass="OrdersBundle\Repository\Mdu_OrdersRepository")
 */
class Mdu_Orders
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
     * @ORM\Column(name="location_type", type="string", length=20)
     */
    private $locationType;

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
     * @ORM\Column(name="client_email", type="string", length=255)
     */
    private $clientEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="client_contact_number", type="string", length=255)
     */
    private $clientContactNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="client_id_number", type="string", length=255)
     */
    private $clientIdNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="order_type", type="integer")
     */
    private $orderType;

    /**
     * @var string
     *
     * @ORM\Column(name="isp_reference", type="string", length=255)
     */
    private $ispReference;

    /**
     * @var int
     *
     * @ORM\Column(name="order_status", type="integer")
     */
    private $orderStatus;

    /**
     * @var int
     *
     * @ORM\Column(name="organization_id", type="integer")
     */
    private $organizationId;

    /**
     * @var string
     *
     * @ORM\Column(name="order_number", type="string", length=255, nullable=true)
     */
    private $orderNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="date")
     */
    private $creationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="network_id", type="string", length=255, nullable=true)
     */
    private $networkId;

    /**
     * @var int
     *
     * @ORM\Column(name="techincian_id", type="integer")
     */
    private $techncianId;

    /**
     * @var bool
     *
     * @ORM\Column(name="order_fulfilled", type="boolean")
     */
    private $orderFulfilled;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="scheduled_date", type="date", nullable=true)
     */
    private $scheduledDate;

    /**
     * @var Products
     *
     * @ORM\OneToOne(targetEntity="OrdersBundle\Entity\Products" )
     * @ORM\JoinColumn(name="product", referencedColumnName="product_id")
     * @ORM\Column(unique=false)
     */
    private $product;

    /**
     * @var int
     * @ORM\OneToOne(targetEntity="OrdersBundles\Entity\Mdu_Locations")
     * @ORM\JoinColumn(name="location", referencedColumnName="location_id")
     * @ORM\Column(unique=false)
     * 
     */
    private $location;


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
     * Set locationType
     *
     * @param string $locationType
     *
     * @return Mdu_Orders
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
     * Set clientName
     *
     * @param string $clientName
     *
     * @return Mdu_Orders
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
     * @return Mdu_Orders
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
     * Set clientEmail
     *
     * @param string $clientEmail
     *
     * @return Mdu_Orders
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
     * Set clientContactNumber
     *
     * @param string $clientContactNumber
     *
     * @return Mdu_Orders
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
     * Set clientIdNumber
     *
     * @param string $clientIdNumber
     *
     * @return Mdu_Orders
     */
    public function setClientIdNumber($clientIdNumber)
    {
        $this->clientIdNumber = $clientIdNumber;

        return $this;
    }

    /**
     * Get clientIdNumber
     *
     * @return string
     */
    public function getClientIdNumber()
    {
        return $this->clientIdNumber;
    }

    /**
     * Set orderType
     *
     * @param integer $orderType
     *
     * @return Mdu_Orders
     */
    public function setOrderType($orderType)
    {
        $this->orderType = $orderType;

        return $this;
    }

    /**
     * Get orderType
     *
     * @return int
     */
    public function getOrderType()
    {
        return $this->orderType;
    }

    /**
     * Set ispReference
     *
     * @param string $ispReference
     *
     * @return Mdu_Orders
     */
    public function setIspReference($ispReference)
    {
        $this->ispReference = $ispReference;

        return $this;
    }

    /**
     * Get ispReference
     *
     * @return string
     */
    public function getIspReference()
    {
        return $this->ispReference;
    }

    /**
     * Set orderStatus
     *
     * @param integer $orderStatus
     *
     * @return Mdu_Orders
     */
    public function setOrderStatus($orderStatus)
    {
        $this->orderStatus = $orderStatus;

        return $this;
    }

    /**
     * Get orderStatus
     *
     * @return int
     */
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * Set organizationId
     *
     * @param integer $organizationId
     *
     * @return Mdu_Orders
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
     * Set orderNumber
     *
     * @param string $orderNumber
     *
     * @return Mdu_Orders
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    /**
     * Get orderNumber
     *
     * @return string
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Mdu_Orders
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
     * Set networkId
     *
     * @param string $networkId
     *
     * @return Mdu_Orders
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
     * Set techincianId
     *
     * @param integer $techincianId
     *
     * @return Mdu_Orders
     */
    public function setTechnicianId($techncianId)
    {
        $this->techncianId = $techncianId;

        return $this;
    }

    /**
     * Get techincianId
     *
     * @return int
     */
    public function getTechnicianId()
    {
        return $this->techncianId;
    }

    /**
     * Set orderFulfilled
     *
     * @param boolean $orderFulfilled
     *
     * @return Mdu_Orders
     */
    public function setOrderFulfilled($orderFulfilled)
    {
        $this->orderFulfilled = $orderFulfilled;

        return $this;
    }

    /**
     * Get orderFulfilled
     *
     * @return bool
     */
    public function getOrderFulfilled()
    {
        return $this->orderFulfilled;
    }

    /**
     * Set scheduledDate
     *
     * @param \DateTime $scheduledDate
     *
     * @return Mdu_Orders
     */
    public function setScheduledDate($scheduledDate)
    {
        $this->scheduledDate = $scheduledDate;

        return $this;
    }

    /**
     * Get scheduledDate
     *
     * @return \DateTime
     */
    public function getScheduledDate()
    {
        return $this->scheduledDate;
    }

    /**
     * Set product
     *
     * @param string $product
     *
     * @return Mdu_Orders
     */
    public function setProductId($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return string
     */
    public function getProductId()
    {
        return $this->product;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Mdu_Orders
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }
    public function __construct($input, $product)
    {
        $data = json_decode($input);

        $this->setLocation($data->location_id);
        $this->setLocationType($data->location_type);
        $this->setClientName($data->client_name);
        $this->setClientSurname($data->client_surname);
        $this->setClientEmail($data->email);
        $this->setClientContactNumber($data->contact_number);
        $this->setClientIdNumber($data->id_number);
        $this->setOrderType($data->order_type);
        $this->setIspReference($data->isp_reference);
        $this->setOrderStatus(1);
        $this->setOrganizationId($data->organization_id);
        $this->setOrderNumber(null);
        $time_zone = new DateTimeZone('Africa/Harare');

        $this->setCreationDate(new DateTime('now',$time_zone));
        $this->setNetworkId($data->network_id);
        $this->setTechnicianId(0);
        $this->setOrderFulfilled(false);
        $this->setScheduledDate(null);
        $this->setProductId($product);

    }

    /**
     * Set techncianId
     *
     * @param integer $techncianId
     *
     * @return Mdu_Orders
     */
    public function setTechncianId($techncianId)
    {
        $this->techncianId = $techncianId;

        return $this;
    }

    /**
     * Get techncianId
     *
     * @return integer
     */
    public function getTechncianId()
    {
        return $this->techncianId;
    }

    /**
     * Set product
     *
     * @param string $product
     *
     * @return Mdu_Orders
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return string
     */
    public function getProduct()
    {
        return $this->product;
    }

  
}
