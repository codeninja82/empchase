<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\ValuationVirtual;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;

class VirtualTypeController extends AbstractType
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
           // ->add('ptype', TextType::class,['label' => 'Property type',])
            ->add('cmethod', ChoiceType::class, [
                'choices'  => [
                    'Facetime' =>'Facetime',
                    'Zoom' =>'Zoom',
                    'WhatsApp' =>'WhatsApp',
                    'Other'=>'Other',
                ],
            ])
            ->add('comments', TextType::class,array('label' => 'Comments','attr' => array('style' => 'height: 200px')),)
            ->add('save', SubmitType::class,['label' => 'Send',]);

        
    }

    
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ValuationVirtual::class,
        ]);
    }
}
