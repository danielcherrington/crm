<?php

namespace DC\CRMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BaseType extends AbstractType
{
    protected $entity;
    protected $vardef_manager;

    function __construct($entity, $vardef_manager)
    {
        $this->entity = $entity;
        $this->vardef_manager = $vardef_manager;
    }
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $properties = $this->entity->getProperties();
        $vardefs = $this->vardef_manager->getVarDefs($this->entity->module);

        foreach($properties as $property => $value){
            if(gettype($property) != "object" && $property != "id" && $property != "module"){

                $field_defs = $vardefs[strtolower($this->entity->module)]["fields"][$property];

                
                if($field_defs["type"] != "relate"){
                    //need to load the field vardefs here so we know which type of field to render
                    $builder->add($property, $field_defs["type"]);
                }
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
