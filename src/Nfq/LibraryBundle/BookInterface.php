<?php
/**
 * Created by PhpStorm.
 * User: tadas
 * Date: 15.4.18
 * Time: 18.42
 */

namespace Nfq\LibraryBundle;


interface BookInterface
{
    public static function getBookInfo($isbn);
}
