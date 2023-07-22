<?php

namespace ServicesBundle\Entity;

use DateTime;
use DateTimeZone;
use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket_Comment
 *
 * @ORM\Table(name="ticket__comment")
 * @ORM\Entity(repositoryClass="ServicesBundle\Repository\Ticket_CommentRepository")
 */
class Ticket_Comment
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
     * 
     * @ORM\Column(name="ticket_id", type="integer")
     */
    private $ticketId;

    /**
     * @var string
     *
     * @ORM\Column(name="replier_email", type="string", length=255)
     */
    private $replierEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reply_date", type="datetime")
     */
    private $replyDate;

 

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
     * Set ticketId
     *
     * @param integer $ticketId
     *
     * @return Ticket_Comment
     */
    public function setTicketId($ticketId)
    {
        $this->ticketId = $ticketId;

        return $this;
    }

    /**
     * Get ticketId
     *
     * @return int
     */
    public function getTicketId()
    {
        return $this->ticketId;
    }

    /**
     * Set replierEmail
     *
     * @param string $replierEmail
     *
     * @return Ticket_Comment
     */
    public function setReplierEmail($replierEmail)
    {
        $this->replierEmail = $replierEmail;

        return $this;
    }

    /**
     * Get replierEmail
     *
     * @return string
     */
    public function getReplierEmail()
    {
        return $this->replierEmail;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Ticket_Comment
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
     * Set replyDate
     *
     * @param \DateTime $replyDate
     *
     * @return Ticket_Comment
     */
    public function setReplyDate($replyDate)
    {
        $this->replyDate = $replyDate;

        return $this;
    }



    /**
     * Get replyDate
     *
     * @return \DateTime
     */
    public function getReplyDate()
    {
        return $this->replyDate;
    }
    public function __construct($input)
    {
        $data = json_decode($input);
        $time_zone = new DateTimeZone('Africa/Harare');
        $this->setReplyDate(new DateTime('now', $time_zone));
        $this->setComment($data->comment);
        $this->setReplierEmail($data->replier_email);
        $this->setTicketId($data->ticket_id);
    }


}
