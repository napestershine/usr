<?php

namespace Usr\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UsrUserBundle:Default:index.html.twig');
    }

    public function registerconfirmAction()
    {
        return $this->render('UsrUserBundle:Default:registerconfirm.html.twig');
    }
}
