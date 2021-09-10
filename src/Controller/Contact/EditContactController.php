<?php

namespace App\Controller\Contact;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class EditContactController extends AbstractController
{
    /**
     * @Route("/contact/edit/{id}", name="contact_edit")
     */
    public function edit(int $id, ContactRepository $contactRepository, EntityManagerInterface $em, Request $request)
    {
        $contact = $contactRepository->find($id); 

        $form = $this->createForm(ContactType::class, $contact); 

        $form->handleRequest($request); 

        if($form->isSubmitted() && $form->isValid())
        {

            $em->flush(); 

            $this->addFlash("success", "Le contact a bien été modifié"); 

            return $this->redirectToRoute("contact_liste"); 
        }

        return $this->render("contact/create.html.twig", [
            "formContact" => $form->createView()
        ]);
    }
}