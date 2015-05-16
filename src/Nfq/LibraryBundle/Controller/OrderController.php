<?php
/**
 * Created by PhpStorm.
 * User: Tadas
 * Date: 5/14/2015
 * Time: 22:11
 */

namespace Nfq\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nfq\LibraryBundle\OrderManager;
use Nfq\LibraryBundle\UserManager;
use Nfq\LibraryBundle\BookManager;

class OrderController extends Controller
{
    public function showOrdersAction()
    {
        $om = new OrderManager($this->getDoctrine());
        $um = new UserManager($this->get('security.context'));
        $userId = $um->getUserId();

        return $this->render('default/orders.html.twig', array("orders" => $om->getOrders($userId)));
    }

    //add an order/reservation to the user by description id
    public function addOrderAction($descriptionId)
    {
        $bm = new BookManager($this->getDoctrine());
        $books = $bm->getBookInfo($descriptionId);

        $om = new OrderManager($this->getDoctrine());
        $bookAmount = $om->getFreeBooksAmount($descriptionId);
        $um = new UserManager($this->get('security.context'));
        $userId = $um->getUserId();

        $om = new OrderManager($this->getDoctrine());
        if ($bookAmount) {
            $om->addOrder($descriptionId, $userId);
        } else {
            $om->addReservation($descriptionId, $userId);
        }
        $bookAmount = $om->getFreeBooksAmount($descriptionId);

        return $this->render('default/info.html.twig', array('books' => $books, 'free' => $bookAmount));
    }
} 