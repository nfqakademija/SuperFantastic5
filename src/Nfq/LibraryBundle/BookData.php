<?php
/**
 * Created by PhpStorm.
 * User: tadas
 * Date: 15.4.18
 * Time: 16.11
 */

namespace Nfq\LibraryBundle;


class BookData
{
    private $author;
    private $title;
    private $language;
    private $description;
    private $publisher;
    private $year;
    private $pageNo;
    private $isbn;
    private $thumbnail;

    public function __construct($author, $title, $language, $description, $publisher, $year, $pageNo, $isbn, $thumbnail)
    {
        $this->setAuthor($author);
        $this->setTitle($title);
        $this->setLanguage($language);
        $this->setDescription($description);
        $this->setPublisher($publisher);
        $this->setYear($year);
        $this->setPageNo($pageNo);
        $this->setIsbn($isbn);
        $this->setCoverUrl($thumbnail);
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    public function getPublisher()
    {
        return $this->publisher;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setPageNo($pageNo)
    {
        $this->pageNo = $pageNo;
    }

    public function getPageNo()
    {
        return $this->pageNo;
    }

    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    public function getIsbn()
    {
        return $this->isbn;
    }

    public function setCoverUrl($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    public function getCoverUrl()
    {
        return $this->thumbnail;
    }
}