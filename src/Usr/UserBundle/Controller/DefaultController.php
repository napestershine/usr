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
        $group = $user->getGroupName();
        $form = $this->createForm('Usr\UserBundle\Form\GroupchoiceType', $group);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($group);
        $em->flush();

        return $this->redirectToRoute('role_selector');
    }

        return $this->render('UsrUserBundle:Default:registerconfirm.html.twig', array(
            'user' => $user
        ));
    }
}
