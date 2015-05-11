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
        $om = new OrderManager($this->getDoctrine());
        $books = $this->getBookInfo($id);
        $bookAmount = $om->getFreeBooksAmount($id);

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

    //add an order/reservation to the user by description id
    public function addOrderAction($descriptionId)
    {
        $om = new OrderManager($this->getDoctrine());
        $bookAmount = $om->getFreeBooksAmount($descriptionId);
        $um = new UserManager($this->get('security.context'));
        $userId = $um->getUserId();

        $om = new OrderManager($this->getDoctrine());
        if ($bookAmount) {
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
