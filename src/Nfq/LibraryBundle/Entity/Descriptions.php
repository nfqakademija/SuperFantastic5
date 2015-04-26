<?php

namespace Nfq\LibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Descriptions
 *
 * @ORM\Table(name="descriptions", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class Descriptions
{
    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255, nullable=true)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="cover_url", type="string", length=255, nullable=true)
     */
    private $coverUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=2, nullable=true)
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1024, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="publisher", type="string", length=255, nullable=true)
     */
    private $publisher;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="year", type="date", nullable=true)
     */
    private $year;

    /**
     * @var integer
     *
     * @ORM\Column(name="page_no", type="smallint", nullable=true)
     */
    private $pageNo;

    /**
     * @var string
     *
     * @ORM\Column(name="isbn", type="string", length=13, nullable=true)
     */
    private $isbn;

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
     * @ORM\ManyToMany(targetEntity="Nfq\LibraryBundle\Entity\Tags", inversedBy="description")
     * @ORM\JoinTable(name="book_tags",
     *   joinColumns={
     *     @ORM\JoinColumn(name="description_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     *   }
     * )
     */
    private $tag;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tag = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set author
     *
     * @param string $author
     * @return Descriptions
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Descriptions
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set coverUrl
     *
     * @param string $coverUrl
     * @return Descriptions
     */
    public function setCoverUrl($coverUrl)
    {
        $this->coverUrl = $coverUrl;

        return $this;
    }

    /**
     * Get coverUrl
     *
     * @return string
     */
    public function getCoverUrl()
    {
        return $this->coverUrl;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Descriptions
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Descriptions
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
     * Set publisher
     *
     * @param string $publisher
     * @return Descriptions
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Get publisher
     *
     * @return string
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Set year
     *
     * @param \DateTime $year
     * @return Descriptions
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return \DateTime
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set pageNo
     *
     * @param integer $pageNo
     * @return Descriptions
     */
    public function setPageNo($pageNo)
    {
        $this->pageNo = $pageNo;

        return $this;
    }

    /**
     * Get pageNo
     *
     * @return integer
     */
    public function getPageNo()
    {
        return $this->pageNo;
    }

    /**
     * Set isbn
     *
     * @param string $isbn
     * @return Descriptions
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get isbn
     *
     * @return string
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    /**
     * Constructor
     */

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
     * Add tag
     *
     * @param \Nfq\LibraryBundle\Entity\Tags $tag
     * @return Descriptions
     */
    public function addTag(\Nfq\LibraryBundle\Entity\Tags $tag)
    {
        $this->tag[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Nfq\LibraryBundle\Entity\Tags $tag
     */
    public function removeTag(\Nfq\LibraryBundle\Entity\Tags $tag)
    {
        $this->tag->removeElement($tag);
    }

    /**
     * Get tag
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTag()
    {
        return $this->tag;
    }
}
