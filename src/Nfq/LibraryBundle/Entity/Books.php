<?php

namespace Nfq\LibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Books
 *
 * @ORM\Table(name="books", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_Books_Descriptions_idx", columns={"description_id"}), @ORM\Index(name="fk_Books_Users_idx", columns={"owner_id"})})
 * @ORM\Entity
 */
class Books
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Nfq\LibraryBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Nfq\LibraryBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="owner_id", referencedColumnName="id")
     * })
     */
    private $owner;

    /**
     * @var \Nfq\LibraryBundle\Entity\Descriptions
     *
     * @ORM\ManyToOne(targetEntity="Nfq\LibraryBundle\Entity\Descriptions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="description_id", referencedColumnName="id")
     * })
     */
    private $description;



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
