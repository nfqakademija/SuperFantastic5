<?php
/**
 * Created by PhpStorm.
 * User: Tadas
 * Date: 5/11/2015
 * Time: 15:08
 */

namespace Nfq\LibraryBundle\Controller;

use Nfq\LibraryBundle\BookData;
use Nfq\LibraryBundle\BookInterface;
use Nfq\LibraryBundle\BookParser;
use Nfq\LibraryBundle\Entity\Descriptions;
use Nfq\LibraryBundle\OrderManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function IndexAction()
    {
        $om = new OrderManager($this->getDoctrine());
        $unreturnedBooks = $om->getUnreturnedOrders();
        return $this->render('default/admin.html.twig', array('unreturnedBooks' => $unreturnedBooks));
    }

    public function returnAction($orderId)
    {
        $om = new OrderManager($this->getDoctrine());
        $om->setOrderReturned($orderId, $this->get('mailer'));
        $unreturnedBooks = $om->getUnreturnedOrders();
        return $this->render('default/admin.html.twig', array('unreturnedBooks' => $unreturnedBooks));
    }

    public function addBookAction ($isbn)
    {
        $parser = $this->container->get('book_parser');
        $book = $parser->getBookInfo($isbn);
        $description = new Descriptions();
        $description->setAuthor($book->getAuthor());
        $description->setTitle($book->getTitle());
        $description->setCoverUrl($book->getCoverUrl());
        $description->setIsbn($book->getIsbn());
        $description->setLanguage($book->getLanguage());
        $description->setDescription($book->getDescription());
        $description->setPageNo($book->getPageNo());
        $description->setPublisher($book->getPublisher());
        $em = $this->getDoctrine()->getManager();
        $em->persist($description);
        $em->flush();
        return $this->render('default/admin.html.twig');
    }
} 