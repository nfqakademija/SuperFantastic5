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
        return $this->render('base.html.twig');
    }

    public function newBooksAction()
    {
        $booksRepo = $this->getDoctrine()->getRepository('NfqLibraryBundle:Books');

        $query = $booksRepo->createQueryBuilder('b')
            ->select('b, MIN(b.addedAt) as addedAt')
            ->orderBy('addedAt', 'DESC')
            ->setMaxResults(6)
            ->groupBy('b.description')
            ->getQuery();

        $bookArray = array();
        foreach ($query->getResult() as $books) {
            array_push($bookArray, $books[0]);
        }

        return $this->render('default/index.html.twig', array(
            "books" => $bookArray));
    }

    public function popularBooksAction()
    {
        $booksRepo = $this->getDoctrine()->getRepository('NfqLibraryBundle:Orders');

        $query = $booksRepo->createQueryBuilder('o')
            ->select('o, COUNT(o.book) as bookCount')
            ->orderBy('bookCount', 'DESC')
            ->setMaxResults(6)
            ->groupBy('o.book')
            ->getQuery();

        $bookArray = array();
        foreach ($query->getResult() as $books) {
            array_push($bookArray, $books[0]->getBook());
        }

        return $this->render('default/index.html.twig', array(
            "books" => $bookArray));

    }
}