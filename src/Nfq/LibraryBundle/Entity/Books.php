<?php

namespace Nfq\LibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Books
 */
class Books
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $addedAt;

    /**
     * @var \Nfq\LibraryBundle\Entity\Descriptions
     */
    private $description;

    /**
     * @var \Nfq\LibraryBundle\Entity\Users
     */
    private $owner;


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
     * Set addedAt
     *
     * @param \DateTime $addedAt
     * @return Books
     */
    public function setAddedAt($addedAt)
    {
        $this->addedAt = $addedAt;

        return $this;
    }

    /**
     * Get addedAt
     *
     * @return \DateTime 
     */
    public function getAddedAt()
    {
        return $this->addedAt;
    }

    /**
     * Set description
     *
     * @param \Nfq\LibraryBundle\Entity\Descriptions $description
     * @return Books
     */
    public function setDescription(\Nfq\LibraryBundle\Entity\Descriptions $description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return \Nfq\LibraryBundle\Entity\Descriptions 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set owner
     *
     * @param \Nfq\LibraryBundle\Entity\Users $owner
     * @return Books
     */
    public function setOwner(\Nfq\LibraryBundle\Entity\Users $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \Nfq\LibraryBundle\Entity\Users 
     */
    public function getOwner()
    {
        return $this->owner;
    }
}
