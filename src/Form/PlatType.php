<?php

namespace App\Form;

use App\Entity\Plat;
use Proxies\__CG__\App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\Positive;

class PlatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', options: [
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'label-form mt-4'
                ]
            ])
            ->add('description')
            ->add('prix', MoneyType::class, [
                'constraints' => [
                    new Positive([])
                ]
            ])
            ->add('image', FileType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-label mt-4'
                ],
                'mapped' => false,
            ])
            ->add('active')
            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'libelle',
                'label' => 'Catégorie'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Plat::class,
        ]);
    }
}
