<?php

/**
 * Created by PhpStorm.
 * User: tadas
 * Date: 15.4.18
 * Time: 16.19
 */
namespace Nfq\LibraryBundle\Providers;

use Nfq\LibraryBundle\BookData;
use Nfq\LibraryBundle\BookInterface;

class GoogleBooksAPI implements BookInterface
{
    public static function getBookInfo($isbn)
    {
        $apiUrl = "https://www.googleapis.com/books/v1/volumes?q=isbn:";
        $apiKey = "&?key=AIzaSyC-wJHLbDUHct-TbRwXv34SROicGSfRD-A";
        $page = file_get_contents($apiUrl . $isbn . $apiKey);
        $data = json_decode($page, true);

        if (isset($data['items'][0]['volumeInfo']['authors'][0])) {
            $author = $data['items'][0]['volumeInfo']['authors'][0];
        } else {
            $author = "";
        }
        if (isset($data['items'][0]['volumeInfo']['title'])) {
            $title = $data['items'][0]['volumeInfo']['title'];
        } else {
            $title = "";
        }
        if (isset($data['items'][0]['volumeInfo']['language'])) {
            $language = $data['items'][0]['volumeInfo']['language'];
        } else {
            $language = "";
        }
        if (isset($data['items'][0]['volumeInfo']['description'])) {
            $description = $data['items'][0]['volumeInfo']['description'];
        } else {
            $description = "";
        }
        if (isset($data['items'][0]['volumeInfo']['publisher'])) {
            $publisher = $data['items'][0]['volumeInfo']['publisher'];
        } else {
            $publisher = "";
        }
        if (isset($data['items'][0]['volumeInfo']['publishedDate'])) {
            $year = $data['items'][0]['volumeInfo']['publishedDate'];
        } else {
            $year = "";
        }
        if (isset($data['items'][0]['volumeInfo']['pageCount'])) {
            $pageNo = $data['items'][0]['volumeInfo']['pageCount'];
        } else {
            $pageNo = "";
        }
        if (isset($data['items'][0]['volumeInfo']['imageLinks']['thumbnail'])) {
            $thumbnail = $data['items'][0]['volumeInfo']['imageLinks']['thumbnail'];
        } else {
            $thumbnail = "https://i.warosu.org/data/lit/img/0056/69/1414915243686.jpg";
        }

        return new BookData($author, $title, $language, $description, $publisher, $year, $pageNo, $isbn, $thumbnail);
    }
}