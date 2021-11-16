<?php

namespace App\Form;

use App\Entity\Presence;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PresenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, ["label" => "Votre prénom / Your first name "])
            ->add('lastname', TextType::class, ["label" => "Votre nom / Your last name"])
            ->add('isPresent', ChoiceType::class, ["choices" => [
                '' => '',
                'Oui / Yes' => true,
                'Non / No' => false,
            ]])
            ->add('comment', TextareaType::class, [
                "required" => false,
                "label" => "Petits mots pour les mariés ? (facultatif) / Notes for the bride and groom (optional)"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Presence::class,
        ]);
    }
}
