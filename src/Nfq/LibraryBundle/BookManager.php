<?php
/**
 * Created by PhpStorm.
 * User: Tadas
 * Date: 5/16/2015
 * Time: 19:13
 */

namespace Nfq\LibraryBundle;


class BookManager
{
    private $doctrine;

    public function __construct($doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getBookInfo($id)
    {
        $descriptionsRepo = $this->doctrine->getRepository('NfqLibraryBundle:Descriptions');
        $query = $descriptionsRepo->createQueryBuilder('d')
            ->where('d.id = ' . $id)
            ->getQuery();

        return $query->getResult();
    }
} 