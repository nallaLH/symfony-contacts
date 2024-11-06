<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(ContactRepository $contactRepository): Response
    {
        return $this->render('contact/index.html.twig', ['contactRepository' => $contactRepository->findBy([], ['lastname' => 'ASC', 'firstname' => 'ASC'])]);
    }

    #[Route('/contact/{id}', name: 'app_contact_show', requirements: ['id' => '\d+'])]
    public function show(Contact $contact): Response
    {
        return $this->render('contact/show.html.twig', ['contact' => $contact]);
    }
}
