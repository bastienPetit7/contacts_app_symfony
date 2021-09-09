<?php

namespace App\Controller\Contact;

use App\Repository\ContactRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DetailContactController extends AbstractController
{
    /**
     * @Route("/contact/detail/{id}", name="contact_detail")
     */
    public function detail(int $id, ContactRepository $contactRepository)
    {
        $contact = $contactRepository->find($id); 

        if(!$contact)
        {
            $this->addFlash("danger", "Le contact n'existe plus"); 

            return $this->redirectToRoute("contact_liste"); 
        }

        return $this->render('contact/detail.html.twig',[
            'contact' => $contact
        ]);
    }

}