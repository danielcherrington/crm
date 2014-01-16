<?php
namespace DC\CRMBundle\Form\ChoiceLists;

use Symfony\Component\Form\Extension\Core\ChoiceList\LazyChoiceList;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Symfony\Component\Yaml\Parser;

class LanguageChoiceList extends LazyChoiceList 
{

	private $_module; 

	function __construct($module, $language)
	{
		$this->_module = $module;
		$this->_language = $language;
	}

    protected function loadChoiceList()
    {

    	$kernel = $this->get('kernel');
    	
    	
		$file = $kernel->locateResource('@DCCRMBundle/modules/'.$this->_module.'/language/'.$this->_language.'.lang.yml');

		$yaml = new Parser();
		$value = $yaml->parse(file_get_contents($file));

		$choices = array();
		$labels = array();

        return new ChoiceList($choices, $labels);

    }
}