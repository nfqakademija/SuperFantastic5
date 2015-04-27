<?php
/**
 * Created by PhpStorm.
 * User: Tadas
 * Date: 4/27/2015
 * Time: 12:33
 */

namespace Nfq\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BookInfoController extends Controller
{
    public function indexAction($id)
    {
        $books = $this->getBookInfo($id);

        return $this->render('default/info.html.twig', array('books' => $books));
    }

    private function getBookInfo($id)
    {
        $descriptionsRepo = $this->getDoctrine()->getRepository('NfqLibraryBundle:Descriptions');
        $query = $descriptionsRepo->createQueryBuilder('d')
            ->where('d.id = ' . $id)
            ->getQuery();

        return $query->getResult();
    }
} 