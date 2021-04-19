<?php

namespace App\Controller\Valuation;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\ValuationVirtual;
use App\Service\VirtualMailer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\VirtualTypeController ;
use App\Controller\MailerController;


class VirtualController extends AbstractController
{
    /**
     * @Route("/valuation/virtual", name="emp_virtual_valuation")
     */
    public function index(Request $request, VirtualMailer $mailer): Response
    {

         // creates a task object and initializes some data for this example
         $valp = new ValuationVirtual();
         $valp->setname('');
         $valp->setemail('');
         $valp->setphone('');
         $valp->setcmethod('');
         $valp->setcomments('');
         
         
             
         
         $form = $this->createForm(VirtualTypeController ::class, $valp);
      

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $valp= $form->getData();
 
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            //Creating enitity manager object
               $entityManager = $this->getDoctrine()->getManager();
                 $entityManager->persist($valp);
                 $entityManager->flush();
 
                 $mailer->sendThankyouMessage($valp);
 
              
 
            //return $this->redirectToRoute('email_send');
        }
    
 
         return $this->render('/services/valuation/virtual-valuation.html.twig', [
             'form' => $form->createView(),
         ]);
        
    
     }
}
