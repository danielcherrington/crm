<?php

namespace DC\CRMBundle\Services;

class AjaxHelper {

	protected $dashboard;

	public function __construct($dashboardManager)
	{
		$loader = new \Twig_Loader_Filesystem(__DIR__."/../Resources/views/Ajax/");
		$this->twig = new \Twig_Environment($loader);
		$this->dashboard = $dashboardManager;
	}
	
	public function execute($method, $params)
	{
		switch($method)
		{
			case "getAvailableDashlets":
				$dashlets = $this->dashboard->getAvailableDashlets();
				$content =  $this->twig->render(
					"dashletlist.html.twig",
  					array(
  						"dashlets" => $dashlets,
  						"title" => "LBL_DASHLET_SELECT_TITLE"
					)
				);
				break;
			case "getDashlet":
				$dashlet = $this->dashboard->getDashlet($params['dashlet']);
				$content = $this->twig->render(
					"dashlet.html.twig",
  					array(
  						"dashlet" => $dashlet
					)
				);
		}

		return $content;
	}
}