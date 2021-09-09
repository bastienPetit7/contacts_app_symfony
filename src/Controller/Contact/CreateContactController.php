<?php

namespace App\Controller\Contact;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CreateContactController extends AbstractController
{

    /**
     * @Route("/contact/creer", name="contact_create")
     */
    public function create(Request $request, EntityManagerInterface $em)
    {

        $contact = new Contact(); 

        $form = $this->createForm(ContactType::class, $contact); 

        $form->handleRequest($request); 

        if($form->isSubmitted() && $form->isValid())
        {

            $em->persist($contact);

            $em->flush(); 

            $this->addFlash("success", "Le contact a bien été créé");

            return $this->redirectToRoute("contact_create"); 

        }

        return $this->render('contact/create.html.twig',[
            "formContact" => $form->createView()
        ]); 

    }
}