<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2015-04-19
 * Time: 20:58
 */

namespace Nfq\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nfq\LibraryBundle\Entity\Descriptions;

class HomepageController extends Controller
{
    public function indexAction()
    {
        return $this->render('default/homepage.html.twig');
    }

    public function newBooksAction()
    {
        $query = $this->getDoctrine()->getManager()->createQuery(
            "SELECT b, MIN(b.addedAt) as addedAt
            FROM NfqLibraryBundle:Books b
            GROUP BY b.description
            ORDER BY b.addedAt DESC
            ");
        $bookArray = array();
        foreach ($query->setMaxResults(6)->getResult() as $books) {
            array_push($bookArray, $books[0]);
        }

        return $this->render('default/index.html.twig', array(
            "books" => $bookArray));
    }

    public function popularBooksAction()
    {
        $query = $this->getDoctrine()->getManager()->createQuery(
            "SELECT o, COUNT(o.book) as bookCount
            FROM NfqLibraryBundle:Orders o
            JOIN o.book b
            WHERE o.book IS NOT NULL
            GROUP BY b.description
            ORDER BY bookCount DESC
            ");

        $bookArray = array();
        foreach ($query->setMaxResults(6)->getResult() as $books) {
            array_push($bookArray, $books[0]->getBook());
        }

        return $this->render('default/index.html.twig', array(
            "books" => $bookArray));

    }
}