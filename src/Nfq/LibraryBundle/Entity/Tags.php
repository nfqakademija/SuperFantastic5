<?php

namespace Nfq\LibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tags
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Tags
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
     * @var string
     *
     * @ORM\Column(name="tag", type="string", length=100)
     */
    private $tag;


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

        return $this;
    }

    /**
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

        return $this;
    }

    /**
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
}
