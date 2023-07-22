<?php

namespace ServicesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;
use DateTimeZone;

/**
 * Regrade
 *
 * @ORM\Table(name="regrade")
 * @ORM\Entity(repositoryClass="ServicesBundle\Repository\RegradeRepository")
 */
class Regrade
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
     * @ORM\Column(name="product_id", type="integer" ,unique = false)
     * @ORM\OneToOne(targetEntity="OrdersBundle\Entity\Products" )
     * @ORM\JoinColumn(name="product_id", referencedColumnName="product_id")
     * 
     */
    private $productId;
    /**
     * @var int
     *
     * @ORM\Column(name="old_product", type="integer")
     * 
     */
    private $oldProduct;

    /**
     * @var string
     *
     * @ORM\Column(name="isp_reference", type="string", length=255)
     */
    private $ispReference;

    /**
     * @var int
     *
     * @ORM\Column(name="service_id", type="integer")
     */
    private $serviceId;

    /**
     * @var string
     *
     * @ORM\Column(name="location_type", type="string", length=20)
     */
    private $locationType;

    /**
     * @var string
     *
     * @ORM\Column(name="order_status", type="string", length=255)
     */
    private $orderStatus;

    /**
     * @var int
     *
     * @ORM\Column(name="order_type", type="integer")
     */
    private $orderType;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime")
     */
    private $creationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="order_number", type="string", length=255)
     */
    private $orderNumber;


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
     * Set productId
     *
     * @param integer $productId
     *
     * @return Regrade
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
     * Set ispReference
     *
     * @param string $ispReference
     *
     * @return Regrade
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
     * Set serviceId
     *
     * @param integer $serviceId
     *
     * @return Regrade
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
     * Set locationType
     *
     * @param string $locationType
     *
     * @return Regrade
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
     * Set orderStatus
     *
     * @param string $orderStatus
     *
     * @return Regrade
     */
    public function setOrderStatus($orderStatus)
    {
        $this->orderStatus = $orderStatus;

        return $this;
    }

    /**
     * Get orderStatus
     *
     * @return string
     */
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * Set orderType
     *
     * @param integer $orderType
     *
     * @return Regrade
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
     * Set orderNumber
     *
     * @param string $orderNumber
     *
     * @return Regrade
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

    public function __construct($input)
    {
        $data = json_decode($input);
        $this->setProductId($data->product_id);
        $this->setIspReference($data->ext_reference);
        $this->setServiceId($data->service_id);
        $this->setLocationType($data->location_type);
        $this->setOrderStatus(1);
        $this->setOrderType(1);
        $time_zone = new DateTimeZone('Africa/Harare');
        $this->setCreationDate(new DateTime('now', $time_zone));
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Regrade
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
     * Set oldProduct
     *
     * @param integer $oldProduct
     *
     * @return Regrade
     */
    public function setOldProduct($oldProduct)
    {
        $this->oldProduct = $oldProduct;

        return $this;
    }

    /**
     * Get oldProduct
     *
     * @return integer
     */
    public function getOldProduct()
    {
        return $this->oldProduct;
    }
}
