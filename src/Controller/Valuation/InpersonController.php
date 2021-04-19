<?php

namespace App\Controller\Valuation;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\ValuationInperson;
use App\Service\InpersonMailer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\InpersonTypeController;
use App\Controller\MailerController;


class InpersonController extends AbstractController
{
    /**
     * @Route("/valuation/inperson", name="emp_in_person_valuation")
     */
    public function index(Request $request, InpersonMailer $mailer): Response
    {

         // creates a task object and initializes some data for this example
         $valp = new ValuationInperson();
         $valp->setname('');
         $valp->setemail('');
         $valp->setphone('');
         $valp->setadress('');
         $valp->setcity('');
         $valp->setzip('');
         $valp->setptype('');
         $valp->setnrooms(1);
         $valp->setnbrooms(1);
         $valp->setcomments('');
         
         
             
         
         $form = $this->createForm(InpersonTypeController::class, $valp);
      

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
    
 
         return $this->render('/services/valuation/in-person-valuation.html.twig', [
             'form' => $form->createView(),
         ]);
        
    
     }
}
