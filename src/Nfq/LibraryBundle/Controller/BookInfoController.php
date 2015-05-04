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
    public function addOrderAction($descriptionId, $userId = 2)
    {
        $om = new OrderManager($this->getDoctrine());
        if ($this->getFreeBooksAmount($descriptionId) > 0) {
            $id = $om->addOrder($descriptionId, $userId);
            if ($id > 0)
                return new Response("Created new order id " . $id);
            else
                return new Response("An order like this already exists");

        } else {
            $id = $om->addReservation($descriptionId, $userId);
            if ($id > 0)
                return new Response("Created new reservation id " . $id);
            else
                return new Response("A reservation like this already exists");
        }
    }

    //get all orders/reservations that haven't been returned by the user yet
    public function getOrders($userId)
    {
        $query = $this->getDoctrine()->getManager()->createQuery(
            "SELECT d.author, d.title, d.coverUrl, o.reservedAt, o.takenAt, o.toReturnAt
            FROM NfqLibraryBundle:Orders o
            JOIN o.reader r
            JOIN o.description d
            WHERE r.id =" . $userId . "
            AND o.returnedAt IS NULL");

        return $query->getResult();
    }

}
