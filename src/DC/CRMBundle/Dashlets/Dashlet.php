<?php

namespace DC\CRMBundle\Dashlets;

class Dashlet implements DashletInterface {

	protected $config;

	function __construct($config)
	{
		$loader = new \Twig_Loader_Filesystem(__DIR__."/templates/");
		$this->twig = new \Twig_Environment($loader);
		$this->config = $config;
	}

	public function getDefaultIcons()
	{
		return array(
			"icon-cog" => array("class" => "icon-cog","link" => "test"),
			"icon-remove" => array("class" => "icon-remove","link" => "test")
		);
	}


	public function getTemplate($type)
	{	
		return $type.".html.twig";

	}

	public function getDef(){

		return array(
			"title" => $this->config['title'],
			"icons" => $this->getDefaultIcons(),
			"content" => $this->getContent()
		);
	}

}