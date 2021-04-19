<?php

namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\NamedAddress;
use Symfony\Component\Mime\Email;
use Symfony\WebpackEncoreBundle\Asset\EntrypointLookupInterface;
use Twig\Environment;
use App\Entity\Contact;

class Mailer
{
    private $mailer;
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendThankyouMessage(Contact $contact)
    {
        $email = (new Email())
        ->from('empirechasereal@gmail.com')
        ->to($contact->getCemail())
        ->subject("Thank you ".$contact->getName()." We've got your message")
        ->text('Sending emails is fun again!')
        ->embedFromPath('emailLogo.jpg', 'logo')
        ->embedFromPath('emailFooter.jpg', 'footer-signature')
        ->html(
            '<img src="cid:logo"width="50" height="60">
           <p>Hi '.$contact->getName().'</p>
            <p>We have received you message regarding '.$contact->getSubject().' 
             one of our agents will be in touch with you. Thank you for contacting</p>
            <p>Empire Chase</p>
            <img src="cid:footer-signature">'
        
        );

        $email_notification = (new Email())
        ->from('empirechasereal@gmail.com')
        ->to('empirechasereal@gmail.com')
        ->subject($contact->getName()." contacted for ".$contact->getSubject())
        ->embedFromPath('emailLogo.jpg', 'logo')
        ->embedFromPath('emailFooter.jpg', 'footer-signature')
        ->html(
            '<img src="cid:logo"width="50" height="60">
           <p>Hi team member</p>
            <p>You have received you message from ' .$contact->getName(). ' regarding '.$contact->getSubject().' </p>
            <p>Empire Chase</p>
            <img src="cid:footer-signature">'
        
        );
        
  
        $this->mailer->send($email);
        $this->mailer->send($email_notification);
    }
}