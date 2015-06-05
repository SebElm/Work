<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Entity\Computer;
use AppBundle\Form\UserType;
use AppBundle\Form\PCType;

class DefaultController extends Controller
{
    /**
     * Generates a web form to enter the user data, transmits the data
     * if valid and reroutes to the computer form
     * @param Request $request request to work on after submission
     * @return mixed either the rendered form or a rerouting request
     */
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
            $dbManager = $this->getDoctrine()->getManager();
            $dbManager->persist($user);
            $dbManager->flush();

            return $this->redirectToRoute('disppc', array('name' => $user->getName()));
        }

        // Render the form and return it as webpage
        return $this->render('default/user_form.html.twig', array('form' => $form->createView ()));
    }

    /**
     * Displays the a form to enter the computers data,
     * using the given name as dynamic variable
     * @param Request $request the request to work on after submission
     * @param $name The name to display as the user's name
     * @return mixed either the rendered form or a rerouting request
     */
    public function disppcAction(Request $request, $name)
    {
        // Create a dummy computer
        $pc = new Computer();
        $pc->setName('GamerPC');
        $pc->setCpu('Intel Core i7 4770K');
        $pc->setFrequency(3.4);
        $pc->setHarddisk(2222);

        // Create the form
        $form = $this->createForm(new PCType(), $pc);

        // Check whether the data is valid
        $form->handleRequest($request);
        if($form->isValid())
        {
            // Store the entry
            $dbManager = $this->getDoctrine()->getManager();
            $dbManager->persist($pc);
            $dbManager->flush();
            // Reroute to final success page
            return $this->redirectToRoute('disp');
        }

        // Return the rendered form
        return $this->render('default/disppc.html.twig', array('name' => $name, 'form' => $form->createView ()));
    }

    /**
     * Simply displays a success message
     * @return mixed the rendered page
     */
    public function dispAction()
    {
        // Return the rendered webpage
        return $this->render('default/disp.html.twig');
    }
}
?>
