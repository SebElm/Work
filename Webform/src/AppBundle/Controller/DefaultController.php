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

            return $this->redirectToRoute('disppc', array('name' => $user->getName()));
        }

        // Render the form and return it as webpage
        return $this->render('default/user_form.html.twig', array('form' => $form->createView ()));
    }

    public function disppcAction(Request $request, $name)
    {
        $pc = new Computer();
        $pc->setName('GamerPC');
        $pc->setCpu('Intel Core i7 4770K');
        $pc->setFrequency(3.4);

        $form = $this->createForm(new PCType(), $pc);

        $form->handleRequest($request);
        if($form->isValid())
        {
            return $this->redirectToRoute('disp', array('name' => $name, 'pc' => $pc));
        }

        return $this->render('default/disppc.html.twig', array('name' => $name, 'form' => $form->createView ()));
    }

    public function dispAction($name, $pc)
    {
        $pc = explode('_', $pc);
        $computer = new PCType();
        $computer->name = $pc[0];
        $computer->cpu = $pc[1];
        $computer->frequency = $pc[2];
        $computer->harddisk = $pc[3];

        return $this->render('default/disp.html.twig', array('name' => $name, 'pcname' => $computer->name, 'pccpu' => $computer->cpu));
    }
}
?>
