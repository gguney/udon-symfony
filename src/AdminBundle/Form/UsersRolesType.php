<?php

namespace AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsersRolesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    private $users;
    private $roles;

    /*
    public function __construct($users)
    {
        $this->users = $users;



    }*/

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

/*
      $builder->add('roleId')
        ->add('userId')

;
*/

    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\UsersRoles'
        ));
    }
}
