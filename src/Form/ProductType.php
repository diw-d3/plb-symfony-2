<?php

namespace App\Form;

use App\Entity\Product;
use App\Form\Type\TagsInputType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                'label_attr' => [
                    'class' => 'toto',
                ],
            ])
            ->add('slug')
            ->add('description')
            ->add('category', null, [
                'expanded' => false,
                'choice_label' => function ($category) {
                    return $category->getName();
                },
            ])
            ->add('tags', TagsInputType::class)
            ->add('price', MoneyType::class, [
                'divisor' => 100,
            ])
            ->add('admin')
        ;

        // Récupérer l'utilisateur et ajouter le champ
        if (true) {
            $builder->add('admin');
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
