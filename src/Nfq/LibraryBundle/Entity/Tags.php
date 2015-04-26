<?php

namespace Nfq\LibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tags
 *
 * @ORM\Table(name="tags", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class Tags
{
    /**
     * @var string
     *
     * @ORM\Column(name="tag", type="string", length=100, nullable=true)
     */
    private $tag;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Nfq\LibraryBundle\Entity\Users", mappedBy="tag")
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Nfq\LibraryBundle\Entity\Descriptions", mappedBy="tag")
     */
    private $description;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
        $this->description = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set tag
     *
     * @param string $tag
     * @return Tags
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string 
     */
    public function getTag()
    {
        return $this->tag;
    }
<<<<<<< Updated upstream
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->description = new \Doctrine\Common\Collections\ArrayCollection();
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add description
     *
     * @param \Nfq\LibraryBundle\Entity\Descriptions $description
     * @return Tags
     */
    public function addDescription(\Nfq\LibraryBundle\Entity\Descriptions $description)
    {
        $this->description[] = $description;
=======

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
     * Add user
     *
     * @param \Nfq\LibraryBundle\Entity\Users $user
     * @return Tags
     */
    public function addUser(\Nfq\LibraryBundle\Entity\Users $user)
    {
        $this->user[] = $user;
>>>>>>> Stashed changes

        return $this;
    }

    /**
<<<<<<< Updated upstream
     * Remove description
     *
     * @param \Nfq\LibraryBundle\Entity\Descriptions $description
     */
    public function removeDescription(\Nfq\LibraryBundle\Entity\Descriptions $description)
    {
        $this->description->removeElement($description);
    }

    /**
     * Get description
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add user
     *
     * @param \Nfq\LibraryBundle\Entity\Users $user
     * @return Tags
     */
    public function addUser(\Nfq\LibraryBundle\Entity\Users $user)
    {
        $this->user[] = $user;
=======
     * Remove user
     *
     * @param \Nfq\LibraryBundle\Entity\Users $user
     */
    public function removeUser(\Nfq\LibraryBundle\Entity\Users $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add description
     *
     * @param \Nfq\LibraryBundle\Entity\Descriptions $description
     * @return Tags
     */
    public function addDescription(\Nfq\LibraryBundle\Entity\Descriptions $description)
    {
        $this->description[] = $description;
>>>>>>> Stashed changes

        return $this;
    }

    /**
<<<<<<< Updated upstream
     * Remove user
     *
     * @param \Nfq\LibraryBundle\Entity\Users $user
     */
    public function removeUser(\Nfq\LibraryBundle\Entity\Users $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
=======
     * Remove description
     *
     * @param \Nfq\LibraryBundle\Entity\Descriptions $description
     */
    public function removeDescription(\Nfq\LibraryBundle\Entity\Descriptions $description)
    {
        $this->description->removeElement($description);
    }

    /**
     * Get description
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDescription()
    {
        return $this->description;
>>>>>>> Stashed changes
    }
}
