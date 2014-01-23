<?php

namespace DC\CRMBundle\Form;

use DC\CRMBundle\Form\ContainerAwareType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BaseType extends ContainerAwareType
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

                if($field_defs["type"] == "choice" && $field_defs["language_list"] == true) {

                    $request = $this->container->get('request');
                    $language = $request->getLocale();

                    $field_defs["options"]["choice_list"] =  new ChoiceLists\LanguageChoiceList($this->entity->module, $language, $this->container->get("kernel"), $field_defs["list_name"]);
                }

                $field_defs['options'] = array_merge($field_defs['options'], array("error_bubbling" => true));

                if($field_defs["type"] != "entity_multiple" && $field_defs["render"]){
                    $builder->add($property, $field_defs["type"], $field_defs["options"]);
                }
            }
        }

        $builder->add("SAVE", "submit", array("label" => "LBL_BUTTON_SAVE"));
        $builder->add("DUPLICATE", "button", array("label" => "LBL_BUTTON_DUPLICATE"));
        $builder->add("DELETE", "button", array("label" => "LBL_BUTTON_DELETE"));

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
