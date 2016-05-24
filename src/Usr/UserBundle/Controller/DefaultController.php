<?php

namespace Usr\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UsrUserBundle:Default:index.html.twig');
    }

    public function roleselectorAction()
    {
        return $this->render('UsrUserBundle:Default:roleselector.html.twig');
    }

    public function registerconfirmAction(Request $request)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        return $this->redirectToRoute('role_selector');
    }
}
