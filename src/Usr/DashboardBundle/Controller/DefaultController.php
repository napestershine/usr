<?php

namespace Usr\DashboardBundle\Controller;

use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Usr\UserBundle\Entity\User;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        if (empty($user->getEmail())) {
            $errors[] = "Email not added";
        }

        if ($user->hasRole('ROLE_USER')) {
            return $this->redirectToRoute('user_assign_role', array('username' => $user->getId()));
        }

        if (empty($errors)) {
            $errors = null;
        }

        return $this->render('@UsrDashboard/Default/index.html.twig', array(
            'user' => $user,
            'errors' => $errors,
        ));
    }

    public function assignroleAction(User $user, Request $request)
    {

    }


}
