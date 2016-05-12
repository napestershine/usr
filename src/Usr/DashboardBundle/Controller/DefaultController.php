<?php

namespace Usr\DashboardBundle\Controller;

use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        return $this->render('UsrDashboardBundle:Default:index.html.twig', array(
            'user' => $user
        ));
    }

    public function contactprofileAction()
    {
        return $this->render('@UsrDashboard/Default/contact-profile.html.twig');
    }
}
