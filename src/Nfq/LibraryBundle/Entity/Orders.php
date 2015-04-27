<?php

namespace Nfq\LibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 */
class Orders
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $reservedAt;

    /**
     * @var \DateTime
     */
    private $takenAt;

    /**
     * @var \DateTime
     */
    private $toReturnAt;

    /**
     * @var \DateTime
     */
    private $returnedAt;

    /**
     * @var \Nfq\LibraryBundle\Entity\Books
     */
    private $book;

    /**
     * @var \Nfq\LibraryBundle\Entity\Users
     */
    private $reader;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set reservedAt
     *
     * @param \DateTime $reservedAt
     * @return Orders
     */
    public function setReservedAt($reservedAt)
    {
        $this->reservedAt = $reservedAt;

        return $this;
    }

    /**
     * Get reservedAt
     *
     * @return \DateTime 
     */
    public function getReservedAt()
    {
        return $this->reservedAt;
    }

    /**
     * Set takenAt
     *
     * @param \DateTime $takenAt
     * @return Orders
     */
    public function setTakenAt($takenAt)
    {
        $this->takenAt = $takenAt;

        return $this;
    }

    /**
     * Get takenAt
     *
     * @return \DateTime 
     */
    public function getTakenAt()
    {
        return $this->takenAt;
    }

    /**
     * Set toReturnAt
     *
     * @param \DateTime $toReturnAt
     * @return Orders
     */
    public function setToReturnAt($toReturnAt)
    {
        $this->toReturnAt = $toReturnAt;

        return $this;
    }

    /**
     * Get toReturnAt
     *
     * @return \DateTime 
     */
    public function getToReturnAt()
    {
        return $this->toReturnAt;
    }

    /**
     * Set returnedAt
     *
     * @param \DateTime $returnedAt
     * @return Orders
     */
    public function setReturnedAt($returnedAt)
    {
        $this->returnedAt = $returnedAt;

        return $this;
    }

    /**
     * Get returnedAt
     *
     * @return \DateTime 
     */
    public function getReturnedAt()
    {
        return $this->returnedAt;
    }

    /**
     * Set book
     *
     * @param \Nfq\LibraryBundle\Entity\Books $book
     * @return Orders
     */
    public function setBook(\Nfq\LibraryBundle\Entity\Books $book = null)
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Get book
     *
     * @return \Nfq\LibraryBundle\Entity\Books 
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * Set reader
     *
     * @param \Nfq\LibraryBundle\Entity\Users $reader
     * @return Orders
     */
    public function setReader(\Nfq\LibraryBundle\Entity\Users $reader = null)
    {
        $this->reader = $reader;

        return $this;
    }

    /**
     * Get reader
     *
     * @return \Nfq\LibraryBundle\Entity\Users 
     */
    public function getReader()
    {
        return $this->reader;
    }
}
