<?php

namespace OrdersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;
use DateTimeZone;

/**
 * Sdu_Orders
 *
 * @ORM\Table(name="sdu__orders")
 * @ORM\Entity(repositoryClass="OrdersBundle\Repository\Sdu_OrdersRepository")
 * 
 */
class Sdu_Orders
{
    /**
     * @var int
     *
     * @ORM\Column(name="order_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $orderId;

    /**
     * @var int
     * @ORM\OneToOne(targetEntity="OrdersBundles\Entity\Sdu_Locations" ,inversedBy="order")
     * @ORM\JoinColumn(name="location", referencedColumnName="order")
     * @ORM\Column(unique=false)
     * 
     */
    protected $location;

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
     * @var int
     *
     * @ORM\Column(name="client_contact_number", type="string", length=20)
     */
    private $clientContactNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="client_id_number", type="integer")
     */
    private $clientIdNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="order_type", type="integer")
     */
    private $orderType;

    /**
     * @var Products
     *
     * @ORM\OneToOne(targetEntity="OrdersBundle\Entity\Products" )
     * @ORM\JoinColumn(name="product", referencedColumnName="product_id")
     * @ORM\Column(unique=false)
     */
    private $product;

    /**
     * @var string
     *
     * @ORM\Column(name="isp_reference", type="string", length=255, unique=false)
     */
    private $ispReference;

    /**
     * @var int
     *
     * @ORM\Column(name="order_status", type="integer")
     * 
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
     * 
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orderNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="date", nullable=true)
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
     * @ORM\Column(name="technician_id", type="integer")
     */
    private $technicianId;

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
     * Get id
     *
     * @return int
     */
    public function getOrderId()
    {
        return json_encode($this->orderId);
    }



    /**
     * Set locationType
     *
     * @param string $locationType
     *
     * @return Sdu_Orders
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
     * @return Sdu_Orders
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
     * @return Sdu_Orders
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
     * @return Sdu_Orders
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
     * @param integer $clientContactNumber
     *
     * @return Sdu_Orders
     */
    public function setClientContactNumber($clientContactNumber)
    {
        $this->clientContactNumber = $clientContactNumber;

        return $this;
    }

    /**
     * Get clientContactNumber
     *
     * @return int
     */
    public function getClientContactNumber()
    {
        return $this->clientContactNumber;
    }

    /**
     * Set clientIdNumber
     *
     * @param integer $clientIdNumber
     *
     * @return Sdu_Orders
     */
    public function setClientIdNumber($clientIdNumber)
    {
        $this->clientIdNumber = $clientIdNumber;

        return $this;
    }

    /**
     * Get clientIdNumber
     *
     * @return int
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
     * @return Sdu_Orders
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
     * @return Sdu_Orders
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
     * @return Sdu_Orders
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
     * @return Sdu_Orders
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
     * @return Sdu_Orders
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
     * @return Sdu_Orders
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
     * @return Sdu_Orders
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
     * Set technicianId
     *
     * @param integer $technicianId
     *
     * @return Sdu_Orders
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

    /**
     * Set orderFulfilled
     *
     * @param boolean $orderFulfilled
     *
     * @return Sdu_Orders
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
     * @return Sdu_Orders
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
     * Set productId
     *
     * @param \OrdersBundle\Entity\Products $productId
     *
     * @return Sdu_Orders
     */
    public function setProductId(\OrdersBundle\Entity\Products $productId = null)
    {
        $this->product = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return \OrdersBundle\Entity\Products
     */
    public function getProductId()
    {
        return $this->product;
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
     * Set product
     *
     * @param \OrdersBundle\Entity\Products $product
     *
     * @return Sdu_Orders
     */
    public function setProduct(\OrdersBundle\Entity\Products $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \OrdersBundle\Entity\Products
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set location
     *
     * @param integer $location
     *
     * @return Sdu_Orders
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return integer
     */
    public function getLocation()
    {
        return $this->location;
    }

  
}
