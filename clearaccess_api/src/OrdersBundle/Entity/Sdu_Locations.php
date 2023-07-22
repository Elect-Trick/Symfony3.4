<?php

namespace OrdersBundle\Entity;

use DateTime;
use DateTimeZone;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Sdu_Locations
 *
 * @ORM\Table(name="sdu__locations")
 * @ORM\Entity(repositoryClass="OrdersBundle\Repository\Sdu_LocationsRepository")
 */
class Sdu_Locations
{
    /**
     * @var int
     *
     * @ORM\Column(name="location_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $locationId;

    /**
     * @var string
     *
     * @ORM\Column(name="sdu_unit", type="string", length=255)
     */
    private $sduUnit;

    /**
     * @var string
     *
     * @ORM\Column(name="sdu_street_name", type="string", length=255)
     */
    private $sduStreetName;

    /**
     * @var string
     *
     * @ORM\Column(name="sdu_surburb", type="string", length=255)
     */
    private $sduSurburb;




    /**
     * @var int
     *
     * @ORM\Column(name="sdu_postal_code", type="integer")
     */
    private $sduPostalCode;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_installed", type="boolean")
     */
    private $isInstalled;

    /**
     * @var string
     *
     * @ORM\Column(name="network_id", type="string", length=255 ,nullable=true)
     */
    private $networkId;

    /**
     * @var string
     *
     * @ORM\Column(name="sdu_coordinates", type="string", length=255)
     */
    private $sduCoordinates;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime")
     */
    private $creationDate;
    /**
     * @var string
     *
     * @ORM\Column(name="location_type", type="string", length=10)
     */
    private $locationType;
    /**
     * @var string
     *
     * @ORM\Column(name="location_ref", type="string", length=255, unique=false)
     */
    private $locationRef;






    /**
     * Set location
     *
     * @param string $location
     *
     * @return Sdu_Locations
     */
    public function setLocation($locationRef)
    {
        $this->locationRef = $locationRef;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {

        return $this->locationRef;
    }
    /**
     * Set sduUnit
     *
     * @param string $sduUnit
     *
     * @return Sdu_Locations
     */
    public function setSduUnit($sduUnit)
    {
        $this->sduUnit = $sduUnit;

        return $this;
    }

    /**
     * Get sduUnit
     *
     * @return string
     */
    public function getSduUnit()
    {
        return $this->sduUnit;
    }

    /**
     * Set sduStreetName
     *
     * @param string $sduStreetName
     *
     * @return Sdu_Locations
     */
    public function setSduStreetName($sduStreetName)
    {
        $this->sduStreetName = $sduStreetName;

        return $this;
    }

    /**
     * Get sduStreetName
     *
     * @return string
     */
    public function getSduStreetName()
    {
        return $this->sduStreetName;
    }

    /**
     * Set sduSurburb
     *
     * @param string $sduSurburb
     *
     * @return Sdu_Locations
     */
    public function setSduSurburb($sduSurburb)
    {
        $this->sduSurburb = $sduSurburb;

        return $this;
    }

    /**
     * Get sduSurburb
     *
     * @return string
     */
    public function getSduSurburb()
    {
        return $this->sduSurburb;
    }

    /**
     * Set sduPostalCode
     *
     * @param integer $sduPostalCode
     *
     * @return Sdu_Locations
     */
    public function setSduPostalCode($sduPostalCode)
    {
        $this->sduPostalCode = $sduPostalCode;

        return $this;
    }

    /**
     * Get sduPostalCode
     *
     * @return int
     */
    public function getSduPostalCode()
    {
        return $this->sduPostalCode;
    }

    /**
     * Set isInstalled
     *
     * @param boolean $isInstalled
     *
     * @return Sdu_Locations
     */
    public function setIsInstalled($isInstalled)
    {
        $this->isInstalled = $isInstalled;

        return $this;
    }

    /**
     * Get isInstalled
     *
     * @return bool
     */
    public function getIsInstalled()
    {
        return $this->isInstalled;
    }

    /**
     * Set networkId
     *
     * @param string $networkId
     *
     * @return Sdu_Locations
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
     * Set sduCoordinates
     *
     * @param string $sduCoordinates
     *
     * @return Sdu_Locations
     */
    public function setSduCoordinates($sduCoordinates)
    {
        $this->sduCoordinates = $sduCoordinates;

        return $this;
    }

    /**
     * Get sduCoordinates
     *
     * @return string
     */
    public function getSduCoordinates()
    {
        return $this->sduCoordinates;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Sdu_Locations
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

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Sdu_Locations
     */
    public function setCreationDate($creationDate)
    {
        // $timeZone = new DateTimeZone('Africa/Harare');
        // $date = new DateTimeImmutable('now', $timeZone);
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
     * Get locationId
     *
     * @return integer
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    public function __construct($input)
    {
        $data = json_decode($input);

        $this->setSduCoordinates($data->coordinates);
        $this->setSduUnit($data->house_number);
        $this->setIsInstalled($data->is_Installed);
        $this->setIsActive(false);
        $this->setNetworkId($data->network_id);
        $this->setSduPostalCode($data->postal_code);
        $this->setSduStreetName($data->street_name);
        $this->setSduSurburb($data->surburb);
        $this->setLocationType($data->type);
        $this->setLocation($data->location_ref);

        $time_zone = new DateTimeZone('Africa/Harare');
        $this->setCreationDate(new DateTime('now', $time_zone));
    }

    /**
     * Set locationType
     *
     * @param string $thisType
     *
     * @return Sdu_Locations
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
     * Set locationRef
     *
     * @param string $locationRef
     *
     * @return Sdu_Locations
     */
    public function setLocationRef($locationRef)
    {
        $this->locationRef = $locationRef;

        return $this;
    }

    /**
     * Get locationRef
     *
     * @return string
     */
    public function getLocationRef()
    {
        return $this->locationRef;
    }
    /**
     * Set locationObject
     *
     * @param object $locationObject
     *
     * @return Sdu_Locations
     */




    /**
     * Set order
     *
     * @param string $order
     *
     * @return Sdu_Locations
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return string
     */
    public function getOrder()
    {
        return $this->order;
    }

   

  
}
