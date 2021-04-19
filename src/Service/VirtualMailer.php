<?php

namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\NamedAddress;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Header\Headers;
use Symfony\WebpackEncoreBundle\Asset\EntrypointLookupInterface;
use Twig\Environment;
use App\Entity\ValuationVirtual;

class VirtualMailer
{
    private $mailer;
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendThankyouMessage(ValuationVirtual $contact)
    {
        $email = (new Email())
        ->from('empirechasereal@gmail.com')
        ->to($contact->getemail())
        ->subject("Thank you ".$contact->getname()." We've got your message")
        ->text('Sending emails is fun again!')
        ->embedFromPath('emailLogo.jpg', 'logo')
        ->embedFromPath('emailFooter.jpg', 'footer-signature')
        ->html(
            '<img src="cid:logo"width="50" height="60">
           <p>Hi '.$contact->getname().'</p>
            <p>We have received you message regarding inperson property viewing 
             one of our agents will be in touch with you. Thank you for contacting</p>
            <p>Empire Chase</p>
            <img src="cid:footer-signature">'
        
        );

        $email_notification = (new Email())
        ->from('empirechasereal@gmail.com')
        ->to('empirechasereal@gmail.com')
        ->subject($contact->getname()." contacted for virtual viewing ")
        ->embedFromPath('emailLogo.jpg', 'logo')
        ->embedFromPath('emailFooter.jpg', 'footer-signature')
        ->html(
            '<img src="cid:logo"width="50" height="60">
            <p>Hi team member</p>
            <p>You have received you message from '.$contact->getname().' for virtual viewing </p>
            <br>
            <p>Name             : '.$contact->getname().'</p>
            <p>email            : '.$contact->getemail().'</p>
            <p>Phone            : '.$contact->getphone().'</p>
            <p>Contact method   : '.$contact->getcmethod().'</p>
            <p>Comments         : '.$contact->getcomments().'</p>
            
            <br>
            <p>Empire Chase</p>
            <img src="cid:footer-signature">'
        );
        $this->mailer->send($email);
        $this->mailer->send($email_notification);

      
    }
}