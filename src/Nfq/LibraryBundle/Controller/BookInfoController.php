<?php
/**
 * Created by PhpStorm.
 * User: Tadas
 * Date: 4/27/2015
 * Time: 12:33
 */

namespace Nfq\LibraryBundle\Controller;

use Nfq\LibraryBundle\OrderManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Nfq\LibraryBundle\UserManager;

class BookInfoController extends Controller
{
    public function indexAction($id)
    {
        $books = $this->getBookInfo($id);
        $bookAmount = $this->getFreeBooksAmount($id);

        return $this->render('default/info.html.twig', array('books' => $books, 'free' => $bookAmount));
    }

    private function getBookInfo($id)
    {
        $descriptionsRepo = $this->getDoctrine()->getRepository('NfqLibraryBundle:Descriptions');
        $query = $descriptionsRepo->createQueryBuilder('d')
            ->where('d.id = ' . $id)
            ->getQuery();

        return $query->getResult();
    }

    //get number of books that are free by description id
    private function getFreeBooksAmount($id)
    {
        $booksQuery = $this->getDoctrine()->getManager()->createQuery(
            "SELECT COUNT(b.id)
            FROM NfqLibraryBundle:Books b
            JOIN b.description d
            WHERE d.id = " . $id);

        $takenBooksQuery = $this->getDoctrine()->getManager()->createQuery(
            "SELECT COUNT(o.id)
            FROM NfqLibraryBundle:Orders o
            JOIN o.description d
            WHERE o.returnedAt is null
            AND o.takenAt is not null
            AND d.id = " . $id);

        $takenBooks = $takenBooksQuery->getResult();
        $totalBooks = $booksQuery->getResult();
        $freeBooks = $totalBooks[0][1] - $takenBooks[0][1];
        return $freeBooks;
    }

    //add an order/reservation to the user by description id
    public function addOrderAction($descriptionId)
    {
        $um = new UserManager($this->get('security.context'));
        $userId = $um->getUserId();

        $om = new OrderManager($this->getDoctrine());
        if ($this->getFreeBooksAmount($descriptionId) > 0) {
            $id = $om->addOrder($descriptionId, $userId);
        } else {
            $id = $om->addReservation($descriptionId, $userId);
        }
        if ($id > 0)
            return new Response("Created new order id " . $id);
        else
            return new Response("An order like this already exists");
    }
}
