<?php

namespace OrdersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products")
 * @ORM\Entity(repositoryClass="OrdersBundle\Repository\ProductsRepository")
 */
class Products
{
    /**
     * @var int
     *
     * @ORM\Column(name="product_id", type="integer", unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     */
    private $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="product_name", type="string", length=255)
     */
    private $productName;

    /**
     * @var float
     *
     * @ORM\Column(name="product_price", type="float")
     */
    private $productPrice;


    /**
     * @ORM\OneToOne(targetEntity="OrdersBundle\Entity\SDU_Orders", mappedBy="product")
     * @ORM\Column(nullable=true)
     */
    private $sduOrder;
    /**
     * @ORM\OneToOne(targetEntity="OrdersBundle\Entity\MDU_Orders", mappedBy="product")
     * @ORM\Column(nullable=true)
     */
    private $mduOrder;





    /**
     * Get product_id
     *
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set productName
     *
     * @param string $productName
     *
     * @return Products
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * Get productName
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set productPrice
     *
     * @param float $productPrice
     *
     * @return Products
     */
    public function setProductPrice($productPrice)
    {
        $this->productPrice = $productPrice;

        return $this;
    }

    /**
     * Get productPrice
     *
     * @return float
     */
    public function getProductPrice()
    {
        return $this->productPrice;
    }

    public function __construct()
    {
        // $this->getProductId();
    }

    /**
     * Set order
     *
     * @param string $order
     *
     * @return Products
     */
    public function setOrder($order)
    {
        $this->sduOrder = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return string
     */
    public function getOrder()
    {
        return $this->sduOrder;
    }

    public function __toString()
    {
        return json_encode($this->getProductId());
    }

    /**
     * Set sduOrder
     *
     * @param string $sduOrder
     *
     * @return Products
     */
    public function setSduOrder($sduOrder)
    {
        $this->sduOrder = $sduOrder;

        return $this;
    }

    /**
     * Get sduOrder
     *
     * @return string
     */
    public function getSduOrder()
    {
        return $this->sduOrder;
    }

    /**
     * Set mduOrder
     *
     * @param string $mduOrder
     *
     * @return Products
     */
    public function setMduOrder($mduOrder)
    {
        $this->mduOrder = $mduOrder;

        return $this;
    }

    /**
     * Get mduOrder
     *
     * @return string
     */
    public function getMduOrder()
    {
        return $this->mduOrder;
    }
}
