<?php

namespace DC\CRMBundle\Dashlets;

class DashletList extends Dashlet {

	protected $type = "list";

	function getItems(){

		//return an array of listitems based on the config
		
		return array(1,2,3,4);
	}

	function getContent(){

		$template = $this->getTemplate($this->type);

		return $this->twig->render($template,
  			array("items" => $this->getItems())
		);
	}

}