<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;



class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
         $data = $form->getData();
         $subject = $data['subject'];
         $address = $data['email'];
         $content = $data['message'];

         $email = (new Email())
         ->from($address)
         ->to('diagnendiaya2002@gmail.com')
         //->cc('cc@example.com')
         //->bcc('bcc@example.com')
         //->replyTo('fabien@example.com')
         //->priority(Email::PRIORITY_HIGH)
         ->subject($subject)
         ->text($content)
         ->html('<p>See Twig integration for better HTML integration!</p>');
        
         $mailer->send($email);

        }

        return $this->renderForm('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'formulaire' => $form
        ]);
    }
}
