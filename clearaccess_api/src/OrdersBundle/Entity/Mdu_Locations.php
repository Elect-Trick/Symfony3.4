<?php

namespace OrdersBundle\Entity;

use DateTime;
use DateTimeZone;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mdu_Locations
 *
 * @ORM\Table(name="mdu__locations")
 * @ORM\Entity(repositoryClass="OrdersBundle\Repository\Mdu_LocationsRepository")
 */
class Mdu_Locations
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
     * @ORM\Column(name="mdu_unit", type="string", length=255)
     */
    private $mduUnit;

    /**
     * @var string
     *
     * @ORM\Column(name="mdu_name", type="string", length=255)
     */
    private $mduName;

    /**
     * @var string
     *
     * @ORM\Column(name="mdu_street_name", type="string", length=255)
     */
    private $mduStreetName;

    /**
     * @var string
     *
     * @ORM\Column(name="mdu_surburb", type="string", length=255)
     */
    private $mduSurburb;




    /**
     * @var int
     *
     * @ORM\Column(name="mdu_postal_code", type="integer")
     */
    private $mduPostalCode;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_installed", type="boolean")
     */
    private $isInstalled;

    /**
     * @var string
     *
     * @ORM\Column(name="network_id", type="string", length=255)
     */
    private $networkId;

    /**
     * @var string
     *
     * @ORM\Column(name="mdu_coordinates", type="string", length=255)
     */
    private $mduCoordinates;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime", nullable=true)
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
     * Set mduUnit
     *
     * @param string $mduUnit
     *
     * @return Mdu_Locations
     */
    public function setMduUnit($mduUnit)
    {
        $this->mduUnit = $mduUnit;

        return $this;
    }

    /**
     * Get mduUnit
     *
     * @return string
     */
    public function getMduUnit()
    {
        return $this->mduUnit;
    }

    /**
     * Set mduName
     *
     * @param string $mduName
     *
     * @return Mdu_Locations
     */
    public function setMduName($mduName)
    {
        $this->mduName = $mduName;

        return $this;
    }

    /**
     * Get mduName
     *
     * @return string
     */
    public function getMduName()
    {
        return $this->mduName;
    }

    /**
     * Set mduStreetName
     *
     * @param string $mduStreetName
     *
     * @return Mdu_Locations
     */
    public function setMduStreetName($mduStreetName)
    {
        $this->mduStreetName = $mduStreetName;

        return $this;
    }

    /**
     * Get mduStreetName
     *
     * @return string
     */
    public function getMduStreetName()
    {
        return $this->mduStreetName;
    }

    /**
     * Set mduSurburb
     *
     * @param string $mduSurburb
     *
     * @return Mdu_Locations
     */
    public function setMduSurburb($mduSurburb)
    {
        $this->mduSurburb = $mduSurburb;

        return $this;
    }

    /**
     * Get mduSurburb
     *
     * @return string
     */
    public function getMduSurburb()
    {
        return $this->mduSurburb;
    }



    /**
     * Set mduPostalCode
     *
     * @param integer $mduPostalCode
     *
     * @return Mdu_Locations
     */
    public function setMduPostalCode($mduPostalCode)
    {
        $this->mduPostalCode = $mduPostalCode;

        return $this;
    }

    /**
     * Get mduPostalCode
     *
     * @return int
     */
    public function getMduPostalCode()
    {
        return $this->mduPostalCode;
    }

    /**
     * Set isInstalled
     *
     * @param boolean $isInstalled
     *
     * @return Mdu_Locations
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
     * @return Mdu_Locations
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
     * Set mduCoordinates
     *
     * @param string $mduCoordinates
     *
     * @return Mdu_Locations
     */
    public function setMduCoordinates($mduCoordinates)
    {
        $this->mduCoordinates = $mduCoordinates;

        return $this;
    }

    /**
     * Get mduCoordinates
     *
     * @return string
     */
    public function getMduCoordinates()
    {
        return $this->mduCoordinates;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Mdu_Locations
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
     * @return Mdu_Locations
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
     * Get locationId
     *
     * @return integer
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
     * @return Mdu_Locations
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
     * @return Mdu_Locations
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

    public function __construct($input)
    {
        $data = json_decode($input);

        $this->setMduCoordinates($data->coordinates);
        $this->setMduUnit($data->unit_number);
        $this->setIsInstalled($data->is_Installed);
        $this->setIsActive(false);
        $this->setNetworkId($data->network_id);
        $this->setMduPostalCode($data->postal_code);
        $this->setMduStreetName($data->street_name);
        $this->setMduName($data->building_name);
        $this->setMduSurburb($data->surburb);
        $this->setLocationType($data->type);
        $this->setLocationRef($data->location_ref);
        $time_zone = new DateTimeZone('Africa/Harare');
        $this->setCreationDate(new DateTime('now', $time_zone));    }

    /**
     * Set order
     *
     * @param string $order
     *
     * @return Mdu_Locations
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
