<?php

namespace App\Controller;

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
    #[Route('/contact/{contactId}', name: 'app_contact_show', requirements: ['contactId' => '\d+'])]
    public function show(int $contactId, ContactRepository $contactRepository): Response
    {
        $contactId = $contactRepository->find($contactId);
        return $this->render('contact/show.html.twig', ['contactId' => $contactId]);
    }
}
