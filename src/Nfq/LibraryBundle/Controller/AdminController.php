<?php
/**
 * Created by PhpStorm.
 * User: Tadas
 * Date: 5/11/2015
 * Time: 15:08
 */

namespace Nfq\LibraryBundle\Controller;

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

} 