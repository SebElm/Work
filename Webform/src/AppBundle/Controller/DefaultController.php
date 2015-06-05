<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        // Create dummy user
        $user = new User();
        $user->setName('Max');
        $user->setCountry('Musterland');

        // Create form
        $form = $this->createForm(new UserType(), $user);

        // Add request handler
        $form->handleRequest($request);
        if ($form->isValid()) {
            // Generate some id
            $user->setCustomerID(rand(0, 10));
            //Submit it to the underlying database
            //$dbManager = $this->getDoctrine()->getManager();
            //$dbManager->persist($user);
            //$dbManager->flush();

            return $this->redirectToRoute('disp', array('user' => $user));
        }

        // Render the form and return it as webpage
        return $this->render('default/user_form.html.twig', array('form' => $form->createView ()));
    }

    public function dispAction()
    {

        return $this->render('default/disp.html.twig');
    }
}
?>
