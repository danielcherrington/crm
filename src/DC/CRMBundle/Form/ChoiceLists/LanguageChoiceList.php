<?php
namespace DC\CRMBundle\Form\ChoiceLists;

use Symfony\Component\Form\Extension\Core\ChoiceList\LazyChoiceList;
use Symfony\Component\Form\Extension\Core\ChoiceList\SimpleChoiceList;
use Symfony\Component\Yaml\Parser;

class LanguageChoiceList extends LazyChoiceList 
{

	private $_module; 

	function __construct($module, $language, $kernel, $list)
	{
		$this->_module = $module;
		$this->_language = $language;
		$this->_kernel = $kernel;
		$this->_list = $list;
	}

    protected function loadChoiceList()
    {
    	$choices = array();
		$labels = array();
    		
		$file = $this->_kernel->locateResource('@DCCRMBundle/modules/'.$this->_module.'/language/'.$this->_language.'.lang.yml');

		$yaml = new Parser();
		$values = $yaml->parse(file_get_contents($file));

        return new SimpleChoiceList($values[$this->_list]);

    }
}