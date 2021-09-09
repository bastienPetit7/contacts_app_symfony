<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,[
                'label'=>" Nom du contact", 
                'attr'=>[
                    'placeholder' => "Entrer le nom du nouveau contact"
                ]
            ])
            ->add('firstName', TextType::class, [
                'label'=>"Prenom du contact",
                'attr'=>[
                    'placeholder' => "Entrer le prénom du nouveau contact"
                ]
            ])
            ->add('phoneNumber',TextType::class,[
                'label'=>" Numéro du contact", 
                'attr'=>[
                    'placeholder' => "Entrer le numéro du nouveau contact"
                ]
            ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
