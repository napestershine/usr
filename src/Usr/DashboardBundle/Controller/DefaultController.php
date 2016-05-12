<?php

namespace Usr\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UsrDashboardBundle:Default:index.html.twig');
    }
}
