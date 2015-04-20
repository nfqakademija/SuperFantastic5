<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 2015-04-19
 * Time: 20:58
 */

namespace Nfq\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }
}