<?php

namespace OutagesBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use OutagesBundle\Entity\Outage_Comments;
use Symfony\Component\Validator\Constraints\Date;
use DateTime;

/**
 * Outages
 *
 * @ORM\Table(name="outages")
 * @ORM\Entity(repositoryClass="OutagesBundle\Repository\OutagesRepository")
 */
class Outages
{
    /**
     * @var int
     *
     * @ORM\Column(name="outage_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $outageId;

    /**
     * @var string
     *
     * @ORM\Column(name="outage_reference", type="string", length=255, unique=false)
     */
    private $outageReference;

    /**
     * @var int
     *
     * @ORM\Column(name="outage_status", type="integer")
     */
    private $outageStatus;

    /**
     * @var array
     *
     * @ORM\Column(name="affected_areas", type="array")
     */
    private $affectedAreas;

    /**
     * @var \Date
     *
     * @ORM\Column(name="creation_date", type="date")
     */
    private $creationDate;

    /**
     * @var int
     *
     * @ORM\Column(name="incident_type", type="integer")
     */
    private $incidentType;

    /**
     * @var int
     *
     * @ORM\Column(name="severity", type="integer")
     */
    private $severity;

    /**
     * @var \Date
     *
     * @ORM\Column(name="last_updated", type="datetime")
     */
    private $lastUpdated;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

   





    /**
     * Set outageReference
     *
     * @param string $outageReference
     *
     * @return Outages
     */
    public function setOutageReference($outageReference)
    {
        $this->outageReference = $outageReference;

        return $this;
    }

    /**
     * Get outageReference
     *
     * @return string
     */
    public function getOutageReference()
    {
        return $this->outageReference;
    }

    /**
     * Set outageStatus
     *
     * @param integer $outageStatus
     *
     * @return Outages
     */
    public function setOutageStatus($outageStatus)
    {
        $this->outageStatus = $outageStatus;

        return $this;
    }

    /**
     * Get outageStatus
     *
     * @return int
     */
    public function getOutageStatus()
    {
        return $this->outageStatus;
    }

    /**
     * Set affectedAreas
     *
     * @param array $affectedAreas
     *
     * @return Outages
     */
    public function setAffectedAreas($affectedAreas)
    {
        $this->affectedAreas = $affectedAreas;

        return $this;
    }

    /**
     * Get affectedAreas
     *
     * @return array
     */
    public function getAffectedAreas()
    {
        return $this->affectedAreas;
    }

    /**
     * Set creationDate
     *
     * @param \Date $creationDate
     *
     * @return Outages
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \Date
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set incidentType
     *
     * @param integer $incidentType
     *
     * @return Outages
     */
    public function setIncidentType($incidentType)
    {
        $this->incidentType = $incidentType;

        return $this;
    }

    /**
     * Get incidentType
     *
     * @return int
     */
    public function getIncidentType()
    {
        return $this->incidentType;
    }

    /**
     * Set severity
     *
     * @param integer $severity
     *
     * @return Outages
     */
    public function setSeverity($severity)
    {
        $this->severity = $severity;

        return $this;
    }

    /**
     * Get severity
     *
     * @return int
     */
    public function getSeverity()
    {
        return $this->severity;
    }

    /**
     * Set lastUpdated
     *
     * @param \Date $lastUpdated
     *
     * @return Outages
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;

        return $this;
    }

    /**
     * Get lastUpdated
     *
     * @return \Date
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Outages
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct($content)
    {
       $data = json_decode($content);
        $this->setOutageStatus(1);
        $this->setAffectedAreas($data->affected_areas);
        $this->setCreationDate(DateTime::createFromFormat('Y-m-d', date('Y-m-d')));
        $this->setIncidentType($data->incident_type);
        $this->setSeverity($data->severity);
        $this->setLastUpdated(DateTime::createFromFormat('Y-m-d', date('Y-m-d')));
        $this->setDescription($data->incident_report);
    }




    /**
     * Get outageId
     *
     * @return integer
     */
    public function getOutageId()
    {
        return $this->outageId;
    }

    
  



  
}
