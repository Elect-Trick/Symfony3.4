<?php

namespace OutagesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use OrdersBundle\OrdersBundle;
use OrdersBundle\Entity\Outages;
use DateTimeZone;
use DateTimeImmutable;
use DateTime;

/**
 * Outage_Comments
 *
 * @ORM\Table(name="outage__comments")
 * @ORM\Entity(repositoryClass="OutagesBundle\Repository\Outage_CommentsRepository")
 */
class Outage_Comments
{
    /**
     * @var int
     *
     * @ORM\Column(name="comment_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $commentId;

    /**
     * @var Outages
     *@ORM\ManyToOne(targetEntity="OutagesBundle\Entity\Outages", inversedBy="comments")
     *@ORM\JoinColumn(name="outage", referencedColumnName="outage_id")
     *@ORM\Column(name="outage" , type="integer")
     */
    private $outage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="comment_date", type="datetime", nullable=true)
     */
    private $commentDate;

    /**
     * @var Comment
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="comment_by", type="string", length=255)
     */
    private $commentBy;


    /**
     * Get id
     *
     * @return int
     */
    public function getCommentId()
    {
        return $this->commentId;
    }



    /**
     * Set commentDate
     *
     * @param \DateTime $commentDate
     *
     * @return Outage_Comments
     */
    public function setCommentDate($commentDate)
    {
        $this->commentDate = $commentDate;

        return $this;
    }

    /**
     * Get commentDate
     *
     * @return \DateTime
     */
    public function getCommentDate()
    {
        return $this->commentDate;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Outage_Comments
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set commentBy
     *
     * @param string $commentBy
     *
     * @return Outage_Comments
     */
    public function setCommentBy($commentBy)
    {
        $this->commentBy = $commentBy;

        return $this;
    }

    /**
     * Get commentBy
     *
     * @return string
     */
    public function getCommentBy()
    {
        return $this->commentBy;
    }

    public function __construct($content)
    {

        $timeZone = new DateTimeZone('Africa/Harare');
        $this->setOutage(json_decode($content)->outage_id);
        $this->setComment(json_decode($content)->comment);
        $this->setCommentDate(new DateTime('now', $timeZone));
        $this->setCommentBy(json_decode($content)->comment_by);
    }



    /**
     * Set outageId
     *
     * @param string $outageId
     *
     * @return Outage_Comments
     */
    public function setOutage($outage)
    {
        $this->outage = $outage;

        return $this;
    }

    /**
     * Get outageId
     *
     * @return string
     */
    public function getOutageId()
    {
        return $this->outage;
    }

    /**
     * Get outage
     *
     * @return string
     */
    public function getOutage()
    {
        return $this->outage;
    }
}
