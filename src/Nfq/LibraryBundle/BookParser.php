<?php
/**
 * Created by PhpStorm.
 * User: tadas
 * Date: 15.4.18
 * Time: 18.38
 */

namespace Nfq\LibraryBundle;

use Nfq\LibraryBundle\BookData;

class BookParser
{
    private $provider;

    public function __construct(BookInterface $provider)
    {
        $this->provider = $provider;
    }

    public function getBookInfo($isbn)
    {
        return $this->provider->getBookInfo($isbn);
    }
}