<?php
namespace App\Controller;

use App\Entity\Contact;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactTypeController extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,['label' => 'Name',])
            ->add('cphone', TextType::class,['label' => 'Phone',])
            ->add('cemail', EmailType::class,['label' => 'Email',])
            ->add('subject', TextType::class,['label' => 'Subject',])
            ->add('cmessage', TextType::class,array('label' => 'Message','attr' => array('style' => 'height: 200px')),)
            ->add('save', SubmitType::class,);

        
    }

    
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}