<?php

namespace Usr\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UsrAdminBundle:Default:index.html.twig');
    }
}
