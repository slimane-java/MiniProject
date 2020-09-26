<?php

namespace ClientBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class ClientType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name',TextType::class,['attr'=>['class'=>'form-control']])
                ->add('prenom',TextType::class,['attr'=>['class'=>'form-control']])
                ->add('dateNai',DateType::class,[
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'attr'=>['class'=>'form-control']])
                ->add('sexe',ChoiceType::class, array('choices' => array('Male' => 'Male', 'Female' => 'Female')),['attr'=>['class'=>'dropdown-item']])
                ->add('telephone',TextType::class,['attr'=>[ 'placeholder'=>'0600000000','class'=>'form-control','pattern'=>'(\+212|0)([5-6])([ \-_/]*)(\d[ \-_/]*){8}']])
                ->add('pays',ChoiceType::class,array('choices' => array('France' => 'France', 'Maroc' => 'Maroc','Japon'=>'Japon','angleterre'=>'angleterre')),['attr'=>['class'=>'form-control']]);
                
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ClientBundle\Entity\Client'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'clientbundle_client';
    }


}
