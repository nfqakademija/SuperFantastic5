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
        $page = file_get_contents($apiUrl . $isbn);
        $data = json_decode($page, true);

        $author = $data['items'][0]['volumeInfo']['authors'][0];
        $title = $data['items'][0]['volumeInfo']['title'];
        $language = $data['items'][0]['volumeInfo']['language'];
        $description = $data['items'][0]['volumeInfo']['description'];
        $publisher = $data['items'][0]['volumeInfo']['publisher'];
        $year = $data['items'][0]['volumeInfo']['publishedDate'];
        $pageNo = $data['items'][0]['volumeInfo']['pageCount'];
        $thumbnail = $data['items'][0]['volumeInfo']['imageLinks']['thumbnail'];

        /*echo $author ."<br>".$title."<br>".$language."<br>".$description."<br>"
            .$publisher."<br>".$year."<br>".$page."<br>".$thumbnail;*/

        return new BookData($author, $title, $language, $description, $publisher, $year, $pageNo, $isbn, $thumbnail);
    }
}