<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2015-04-19
 * Time: 20:58
 */

namespace Nfq\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
    public function indexAction()
    {
       // $newBooks = $this->getNewestBooks();
        $popularBooks = $this->getPopularBooks();
        return $this->render('default/index.html.twig', array(
            "books" => $popularBooks));
    }

    private function getNewestBooks()
    {
        $descriptionsRepo = $this->getDoctrine()->getRepository('NfqLibraryBundle:Descriptions');
        $query = $descriptionsRepo->createQueryBuilder('d')
            ->orderBy('d.addedAt', 'DESC')
            ->setMaxResults(6)
            ->getQuery();

        return $query->getResult();
    }

    private function getPopularBooks()
    {
        $descriptionsRepo = $this->getDoctrine()->getRepository('NfqLibraryBundle:Descriptions');
        $query = $descriptionsRepo->createQueryBuilder('d')
            ->orderBy('d.takenCount', 'DESC')
            ->setMaxResults(6)
            ->getQuery();

        return $query->getResult();
    }
}