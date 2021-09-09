<?php

namespace App\Controller\Contact;

use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SupprimerContactController extends AbstractController
{

    /**
     * @Route("/contact/supprimer/{id}", name="contact_supprimer")
     */
    public function delete(int $id, ContactRepository $contactRepository, EntityManagerInterface $em)
    {

        $contact = $contactRepository->find($id); 

        if(!$contact)
        {

            $this->addFlash("danger", "Le contact n'éxiste plus."); 

            return $this->redirectToRoute("contact_detail"); 
        }

        $em->remove($contact);
        $em->flush();

        $this->addFlash("success", "Le contact a bien été supprimé");

        return $this->redirectToRoute("contact_liste"); 


    }
}