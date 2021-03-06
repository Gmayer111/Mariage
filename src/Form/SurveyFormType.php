<?php

namespace App\Form;

use App\Entity\Playlist;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SurveyFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options); // TODO: Change the autogenerated stub;

        $builder
            ->add('firstname', TextType::class, ["label" => "Ton prénom / Your first name "])
            ->add('lastname', TextType::class, ["label" => "Ton nom / Your last name "])
            ->add('artist', TextType::class, ["label" => "Le nom de l'artiste / Artist"])
            ->add('title', TextType::class, ["label" => "Le titre de la musique / Title"])
            ->add('comment', TextareaType::class, [
                "required" => false,
                "label" => "Un commentaire ? / Comment"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver); // TODO: Change the autogenerated stub
        $resolver->setDefaults([
            'data_class' => Playlist::class,
        ]);
    }
}
