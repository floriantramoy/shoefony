<?php

namespace App\Mailer;

use App\Entity\Contact;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;

class ContactMailer
{
    private  MailerInterface $mailer;
    private string $contactEmailAddress;
    private Environment $twig;

    public function __construct(MailerInterface $mailer, string $contactEmailAddress, Environment $twig){
        $this->mailer = $mailer;
        $this->contactEmailAddress = $contactEmailAddress;
        $this->twig = $twig;

    }

    public function send(Contact $contact): void
    {
        $email = (new Email())
            ->from($contact->getEmail())
            ->to($this->contactEmailAddress)
            ->subject($contact->getMessage())
            ->html($this->twig->render('email/contact.html.twig', ['contact' => $contact->getEmail()]));
        $this->mailer->send($email);
    }


}