<?php

namespace App\Form;

use App\Entity\Subject;
use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name', TextType::class, array('label'=>'Your Name', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Your Name',
              )))

            ->add('Email', EmailType::class, array('label'=>'Your Email', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Your email',
              )))

            ->add('Subject', EntityType::class, [
                'class' => Subject::class,
                'choice_label' => 'name',
                'label' => 'Choose a subject *',
                'placeholder' => '- - ',
            ])

            ->add('Content', TextareaType::class, array('label'=>'Your Message', 'attr' => array(
                'class' => 'form-control',
                'title' => 'Your Message',
              )) )
        ;

        $builder
        ->add('save', SubmitType::class, array(
				'label' => 'Send',
				'attr' => array(
					'class' => 'btn',
					'title' => 'Send'
				)
			));
    }
    
   
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
