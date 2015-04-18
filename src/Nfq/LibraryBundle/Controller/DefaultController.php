<?php

namespace Nfq\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('NfqLibraryBundle:Default:index.html.twig', array('name' => $name));
    }
}
