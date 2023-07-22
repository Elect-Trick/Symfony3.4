<?php

namespace ServicesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;
use DateTimeZone;

/**
 * Mdu_Services
 *
 * @ORM\Table(name="mdu__services")
 * @ORM\Entity(repositoryClass="ServicesBundle\Repository\Mdu_ServicesRepository")
 */
class Mdu_Services
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
     * @var int
     *
     * @ORM\Column(name="location_id", type="integer" ,unique = false)
     * @ORM\OneToOne(targetEntity="OrdersBundle\Entity\Mdu_Locations" )
     * @ORM\JoinColumn(name="location_id", referencedColumnName="location_id")
     * 
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
     * @ORM\Column(name="product_id", type="integer")
     */
    private $productId;

    /**
     * @var int
     *
     * @ORM\Column(name="organization_id", type="integer")
     */
    private $organizationId;

    /**
     * @var string
     *
     * @ORM\Column(name="isp_order_number", type="string", length=255)
     */
    private $ispOrderNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="order_type", type="integer")
     */
    private $orderType;

    /**
     * @var string
     *
     * @ORM\Column(name="network_id", type="string", length=255, nullable=true)
     */
    private $networkId;

    /**
     * @var string
     *
     * @ORM\Column(name="isp_mac_modem", type="string", length=255)
     */
    private $ispMacModem;

    /**
     * @var int
     *
     * @ORM\Column(name="service_status", type="integer")
     */
    private $serviceStatus;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_updated", type="datetime")
     */
    private $lastUpdated;

    /**
     * @var string
     *
     * @ORM\Column(name="vlan", type="string", length=255)
     */
    private $vlan;
    /**
     * @var Mdu_Orders
     *
     * @ORM\OneToOne(targetEntity="OrdersBundle\Entity\Mdu_Orders" )
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     * @ORM\Column(unique=false)
     */
    private $orderId;


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
     * Set locationId
     *
     * @param integer $locationId
     *
     * @return Mdu_Services
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
     * @return Mdu_Services
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
     * Set productId
     *
     * @param integer $productId
     *
     * @return Mdu_Services
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set organizationId
     *
     * @param integer $organizationId
     *
     * @return Mdu_Services
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
     * Set ispOrderNumber
     *
     * @param string $ispOrderNumber
     *
     * @return Mdu_Services
     */
    public function setIspOrderNumber($ispOrderNumber)
    {
        $this->ispOrderNumber = $ispOrderNumber;

        return $this;
    }

    /**
     * Get ispOrderNumber
     *
     * @return string
     */
    public function getIspOrderNumber()
    {
        return $this->ispOrderNumber;
    }

    /**
     * Set orderType
     *
     * @param integer $orderType
     *
     * @return Mdu_Services
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
     * Set networkId
     *
     * @param string $networkId
     *
     * @return Mdu_Services
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
     * Set ispMacModem
     *
     * @param string $ispMacModem
     *
     * @return Mdu_Services
     */
    public function setIspMacModem($ispMacModem)
    {
        $this->ispMacModem = $ispMacModem;

        return $this;
    }

    /**
     * Get ispMacModem
     *
     * @return string
     */
    public function getIspMacModem()
    {
        return $this->ispMacModem;
    }

    /**
     * Set serviceStatus
     *
     * @param integer $serviceStatus
     *
     * @return Mdu_Services
     */
    public function setServiceStatus($serviceStatus)
    {
        $this->serviceStatus = $serviceStatus;

        return $this;
    }

    /**
     * Get serviceStatus
     *
     * @return int
     */
    public function getServiceStatus()
    {
        return $this->serviceStatus;
    }

    /**
     * Set lastUpdated
     *
     * @param \DateTime $lastUpdated
     *
     * @return Mdu_Services
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
     * Set vlan
     *
     * @param string $vlan
     *
     * @return Mdu_Services
     */
    public function setVlan($vlan)
    {
        $this->vlan = $vlan;

        return $this;
    }

    /**
     * Get vlan
     *
     * @return string
     */
    public function getVlan()
    {
        return $this->vlan;
    }

    public function __construct($order)
    {
        $data = json_decode($order);
        $this->setLocationId($data->location);
        $this->setLocationType($data->location_type);
        $this->setProductId($data->product);
        $this->setOrganizationId($data->organization_id);
        $this->setNetworkId($data->network_id);
        $this->setIspMacModem('To be Calculated');
        $this->setIspOrderNumber($data->isp_reference);
        $this->setOrderType($data->order_type);
        $this->setOrderType($data->order_type);
        $this->setServiceStatus(2);
        $time_zone = new DateTimeZone('Africa/Harare');
        $this->setLastUpdated(new DateTime('now', $time_zone));
        $this->setVlan('VLAN3060');
        // $this->setLocationRef(json_decode($input)->location_ref);
        // $time_zone = new DateTimeZone('Africa/Harare');
    }

    /**
     * Set orderId
     *
     * @param string $orderId
     *
     * @return Mdu_Services
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get orderId
     *
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }
}
