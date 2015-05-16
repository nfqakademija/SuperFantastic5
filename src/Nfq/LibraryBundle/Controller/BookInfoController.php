<?php
/**
 * Created by PhpStorm.
 * User: Tadas
 * Date: 4/27/2015
 * Time: 12:33
 */

namespace Nfq\LibraryBundle\Controller;

use Nfq\LibraryBundle\BookManager;
use Nfq\LibraryBundle\OrderManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Nfq\LibraryBundle\UserManager;

class BookInfoController extends Controller
{
    public function indexAction($id)
    {
        $om = new OrderManager($this->getDoctrine());
        $bm = new BookManager($this->getDoctrine());
        $books = $bm->getBookInfo($id);
        $bookAmount = $om->getFreeBooksAmount($id);

        return $this->render('default/info.html.twig', array('books' => $books, 'free' => $bookAmount));
    }

}
