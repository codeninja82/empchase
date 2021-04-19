<?php

namespace App\Controller\Emp_services;

use App\Entity\Contact;
use App\Service\Mailer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\ContactTypeController;
use App\Controller\MailerController;
use Symfony\Component\Routing\Annotation\Route;

class BuildRentController extends AbstractController
{


    
    /**
     * @Route("/block-management", name="emp_services_block-management")
     */

    public function new(Request $request, Mailer $mailer): Response
    {
        // creates a task object and initializes some data for this example
        $contact = new Contact();
        $contact->setName('');
        $contact->setCphone('');
        $contact->setCemail('');
        $contact->setSubject('Build to rent');
        $contact->setCmessage('');
        
            
        
        $form = $this->createForm(ContactTypeController::class, $contact);
       // $form = $this->createForm(ContactTypeController::class, $contact);
       
       
     

       $form->handleRequest($request);
       if ($form->isSubmitted() && $form->isValid()) {
           // $form->getData() holds the submitted values
           // but, the original `$task` variable has also been updated
           $contact = $form->getData();

           // ... perform some action, such as saving the task to the database
           // for example, if Task is a Doctrine entity, save it!
           //Creating enitity manager object
              $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($contact);
                $entityManager->flush();

                $mailer->sendThankyouMessage($contact);

             

           //return $this->redirectToRoute('email_send');
       }
   

        return $this->render('services/build-to-rent.html.twig', [
            'form' => $form->createView(),
        ]);
        var_dump(serialize($mailer));
        var_dump(serialize($contact ));

        // ...
    }


}