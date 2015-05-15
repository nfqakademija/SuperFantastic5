<?php
namespace Nfq\LibraryBundle\Controller;

use Nfq\LibraryBundle\BookDataSet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BookListController extends Controller
{
    public function searchAction($str = '')
    {
        if (!isset($str) || $str === '') {
            $request = $this->getRequest();
            $str = $request->query->get('str');
        }
        $query_str = 'SELECT d.id, d.author, d.title, d.coverUrl, d.language, d.description, d.publisher, d.year, d.pageNo, d.isbn
            FROM NfqLibraryBundle:Descriptions d';
        if (empty($str)) {
            $query = $this->getDoctrine()->getManager()->createQuery($query_str);
        } else {
            $query_str .= ' WHERE d.author LIKE :para OR d.title LIKE :para OR d.description LIKE :para OR d.publisher LIKE :para';
            $query = $this->get('doctrine.orm.entity_manager')->createQuery($query_str);
            $query->setParameter('para', '%' . $str . '%');
        }

        $bookList = $query->getArrayResult();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $bookList,
            $request->query->get('page', 1)/*page number*/,
            6/*limit per page*/
        );

        return $this->render('default/search.html.twig', array('keyword' => $str, 'books' => $bookList, 'pagination' => $pagination));
    }

    public function listAction($type)
    {
        if ($type === "new") {
            $query = $this->getDoctrine()->getManager()->createQuery(
                "SELECT b, MIN(b.addedAt) as addedAt
            FROM NfqLibraryBundle:Books b
            GROUP BY b.description
            ORDER BY b.addedAt DESC
            ");
        } else {
            $query = $this->getDoctrine()->getManager()->createQuery(
                "SELECT o, COUNT(o.book) as bookCount
            FROM NfqLibraryBundle:Orders o
            JOIN o.book b
            WHERE o.book IS NOT NULL
            GROUP BY b.description
            ORDER BY bookCount DESC
            ");
        }
        $bookArray = array();
        foreach ($query->setMaxResults(6)->getResult() as $books) {
            array_push($bookArray, $books[0]);
        }

        return $this->render('default/index.html.twig', array(
            "books" => $bookArray));
    }
} 