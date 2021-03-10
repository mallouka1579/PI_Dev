<?php

namespace App\Form;

use App\Classe\Search;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('string' ,TextType::class ,[
                'label' => 'Recherche' ,
                'required' => false ,
                'attr' => [
                    'placeholder' => 'votre recherche ..',
                    'class' => 'rt-banner-searchbox flight-search'
                ]
            ])
            ->add('categories' , EntityType::class ,
                [
                    'label' => false,
                    'required' => false ,
                    'class' => Category::class,
                    'multiple' => true ,
                    'expanded' => false ,
                    'attr' => [


                    ]
                ]
            )
            ->add('submit',SubmitType::class,
                [
                    'label' => 'Filtrer',
                    'attr' => [
                    'class' => 'rt-btn rt-gradient pill rt-sm3 text-uppercase rt-mt-10 btn-block'

                ]
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Search::class ,
            'method' => 'GET' ,
            'csrf_protection' => false ,
        ]);
    }
    public function getBlockPrefix()
    {
        return ''; // TODO: Change the autogenerated stub
    }
}