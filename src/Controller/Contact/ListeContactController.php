<?php

namespace App\Controller\Contact;

use App\Repository\ContactRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListeContactController extends AbstractController
{
    /**
     * @Route("/contact/liste", name="contact_liste")
     */
     public function listeContact(ContactRepository $contactRepository)
     {
        $contacts = $contactRepository->findAll(); 

        return $this->render('contact/liste.html.twig', [
            "contacts" => $contacts
        ]);
     }
}