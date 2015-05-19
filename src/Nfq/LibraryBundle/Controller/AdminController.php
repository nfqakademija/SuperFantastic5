<?php
/**
 * Created by PhpStorm.
 * User: Tadas
 * Date: 5/11/2015
 * Time: 15:08
 */

namespace Nfq\LibraryBundle\Controller;

use Nfq\LibraryBundle\Entity\Books;
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

    public function addBookAction($isbn = '')
    {
        if (!isset($isbn) || $isbn === '') {
            $request = $this->getRequest();
            switch ($request->getMethod()) {
                case 'GET':
                    $isbn = $request->query->get('isbn');
                    break;
                case 'POST':
                    $isbn = $request->request->get('isbn');
                    break;
            }

            // Šita eilutė redirektina /add?isbn=9788496284449 į /add/9788496284449
            // tai papildomas apkrovimas
            // Jeigu to nereikia, užkomentuok sekančią eilutę
            return $this->redirect("/add/$isbn", 301);
        }

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
        $existingDescription = $em->getRepository('NfqLibraryBundle:Descriptions')->findOneBy(array('isbn' => $isbn));
        $book = new Books();
        $book->setAddedAt(new \DateTime('now'));
        if (!count($existingDescription)) {
            $em->persist($description);
            $book->setDescription($description);
            if ($description->getAuthor() != "" && $description->getTitle() != "") {
                $em->persist($book);
                $em->flush();
            }
        } else {
            $book->setDescription($existingDescription);
            $em->persist($book);
            $em->flush();
        }

        return $this->render('default/admin.html.twig');
    }
} 