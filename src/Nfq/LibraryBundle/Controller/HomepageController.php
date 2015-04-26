<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2015-04-19
 * Time: 20:58
 */

namespace Nfq\LibraryBundle\Controller;

use Nfq\LibraryBundle\Entity\Descriptions;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nfq\LibraryBundle\Entity\Users;
use Symfony\Component\HttpFoundation\Response;

class HomepageController extends Controller
{
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }

    public function createAction()
    {
        /* $isbns = array(9780545010221, 9780261102217, 9780345917430, 9788497644907, 9781233026296, 9788496284449);
         foreach ($isbns as $isbn) {
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
             //$description->setYear($book->getYear());
             $em = $this->getDoctrine()->getManager();
             $em->persist($description);
             $em->flush();
         }*/


        /*$user = new Users();
        $user->setFirstname('Tadas');
        $user->setLastname('Auciunas');
        $user->setEmail('tadas.auciunas@gmail.com');
        $user->setPassword('password');
        $user->setIsAdmin(false);
        $em = $this->getDoctrine()->getManager();
        $em->find($id);
        $em->persist($user);
        $em->flush();*/


        $descriptionsRepo = $this->getDoctrine()->getRepository('NfqLibraryBundle:Descriptions');
        $books = $descriptionsRepo->findAll();
        $string = "";
        foreach ($books as $book) {
            $string = $string . "<img src=".$book->getCoverUrl()."><br>";
        }
        return new Response($string);
    }
}