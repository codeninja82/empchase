<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\ValuationInperson;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;

class InpersonTypeController extends AbstractType
{
    /**
     * @Route("/inperson/type", name="inperson_type")
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,['label' => 'Name',])
            ->add('email', EmailType::class,['label' => 'Email',])
            ->add('phone', TextType::class,['label' => 'Phone',])
            ->add('adress', TextType::class,['label' => 'Adress - House number & street',])
            ->add('city', TextType::class,['label' => 'City',])
            ->add('zip', TextType::class,['label' => 'Zip',])
           // ->add('ptype', TextType::class,['label' => 'Property type',])
            ->add('ptype', ChoiceType::class, [
                'choices'  => [
                    'Single family' =>'Single family',
                    'Multy family' =>'Multy family',
                    'Flat' =>'Flat',
                    'Terrace' =>'Terace',
                    'Semi-detached' =>'Semi-detached',
                    'Detached' =>'Detached',
                    'Mansion' =>'Mansion',
                    'Bungalow'=>'Bungalow',
                    'Other'=>'Other',
                ],
            ])
            ->add('nrooms', ChoiceType::class, [
                'choices'  => [
                    '1' =>'1',
                    '2' =>'2',
                    '3' =>'3',
                    '4' =>'4',
                    '5+' =>'5+',
                ],
            ])
            ->add('nbrooms', ChoiceType::class, [
                'choices'  => [
                    '1' =>'1',
                    '2' =>'2',
                    '3' =>'3',
                    '4' =>'4',
                    '5+' =>'5+',
                ],
            ])
            ->add('comments', TextType::class,array('label' => 'Comments','attr' => array('style' => 'height: 200px')),)
            ->add('save', SubmitType::class,['label' => 'Send',]);

        
    }

    
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ValuationInperson::class,
        ]);
    }
}
