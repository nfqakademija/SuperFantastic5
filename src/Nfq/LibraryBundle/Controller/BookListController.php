<?php

namespace Nfq\LibraryBundle\Controller;

use Nfq\LibraryBundle\BookDataSet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BookListController extends Controller
{

    public function booksAction($type = 'popular')
    {
        $books_rep = $this->getDoctrine()->getRepository('NfqLibraryBundle:Orders');
        $query_str = 'SELECT COUNT(o.id) as orderQnty, 
                d.author, d.title, d.coverUrl, d.language, d.description, d.publisher, d.year, d.pageNo, d.isbn,
                b.addedAt
            FROM NfqLibraryBundle:Orders o
            JOIN o.description d
            LEFT JOIN o.book b
            GROUP BY o.description';
        switch($type){
            case 'popular':
              $query_str .= ' ORDER BY orderQnty DESC';
              break;
            case 'recent':
              $query_str .= ' ORDER BY b.addedAt DESC';
              break;
            case 'new':
              $query_str .= ' ORDER BY d.year DESC';
              break;
        }
         
            
        $query = $this->getDoctrine()->getManager()->createQuery($query_str);

        $bookList = $query->getResult();
        $book_data_str = print_r($bookList, true);
        return new Response('<html><body><pre>' . $book_data_str . '</pre></body></html>');
    }
    
    public function searchAction($keyword = '')
    {
        $books_rep = $this->getDoctrine()->getRepository('NfqLibraryBundle:Descriptions');
        $query_str = 'SELECT d.id, d.author, d.title, d.coverUrl, d.language, d.description, d.publisher, d.year, d.pageNo, d.isbn 
            FROM NfqLibraryBundle:Descriptions d';

        if (empty($keyword)){
            $query = $this->getDoctrine()->getManager()->createQuery($query_str);
        } else {
            $query_str .= ' WHERE d.author LIKE :para OR d.title LIKE :para OR d.description LIKE :para OR d.publisher LIKE :para' ;
            $query = $this->getDoctrine()->getManager()->createQuery($query_str);
            $query->setParameter('para', '%' . $keyword . '%');
        }

        //$bookList = $query->getResult();
        $bookList = $query->getArrayResult();
        $book_data_str = print_r($bookList, true);
        return new Response('<html><body><pre>' . $book_data_str . '</pre></body></html>');
    }

} 