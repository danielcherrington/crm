<?php

namespace DC\CRMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BaseType extends AbstractType
{

    function __construct($entity)
    {
        $this->entity = $entity;
    }
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $properties = $this->entity->getProperties();

        foreach($properties as $property => $value){
            if(gettype($property) != "object" && $property != "id"){

                //need to load the field vardefs here so we know which type of field to render
                $builder->add($property);
            }
        }
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => get_class($this->entity)
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dc_crmbundle_base';
    }
}
