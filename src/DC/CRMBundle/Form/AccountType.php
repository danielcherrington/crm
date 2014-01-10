<?php

namespace DC\CRMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AccountType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('phoneOffice')
            ->add('website')
            ->add('description')
            ->add('industry')
            ->add('emailAddress')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DC\CRMBundle\Entity\Account'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dc_crmbundle_account';
    }
}
