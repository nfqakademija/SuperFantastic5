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
     * @var integer
     */
    private $descriptionId;

    /**
     * @var integer
     */
    private $ownerId;


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
     * Set descriptionId
     *
     * @param integer $descriptionId
     * @return Books
     */
    public function setDescriptionId($descriptionId)
    {
        $this->descriptionId = $descriptionId;

        return $this;
    }

    /**
     * Get descriptionId
     *
     * @return integer 
     */
    public function getDescriptionId()
    {
        return $this->descriptionId;
    }

    /**
     * Set ownerId
     *
     * @param integer $ownerId
     * @return Books
     */
    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;

        return $this;
    }

    /**
     * Get ownerId
     *
     * @return integer 
     */
    public function getOwnerId()
    {
        return $this->ownerId;
    }
}
