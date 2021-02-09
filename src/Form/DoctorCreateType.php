<?php

namespace App\Form;

use App\Entity\Doctor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class DoctorCreateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class)
            ->add('lastName', null, [
                'required'   => true
            ])
            ->add('firstName', null, [
                'required'   => true
            ])
            ->add('email', EmailType::class)
            ->add('phoneNumber', TextType::class)
            ->add('status', ChoiceType::class, [
                'choices'  => [
                    'Docteur' => 'DOCTOR',
                    'Assistant' => 'ASSISTANT',
                    'Admin' => 'ADMIN'
                ]
            ])
            ->add('password', PasswordType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Doctor::class,
        ]);
    }
}
