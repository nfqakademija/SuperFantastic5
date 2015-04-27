<?php

namespace Nfq\LibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Books
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Books
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="description_id", type="integer")
     */
    private $descriptionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="owner_id", type="integer")
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
    /**
     * @var \Nfq\LibraryBundle\Entity\Descriptions
     */
    private $description;

    /**
     * @var \Nfq\LibraryBundle\Entity\Users
     */
    private $owner;


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
