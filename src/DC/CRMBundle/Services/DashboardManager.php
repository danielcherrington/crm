<?php

namespace DC\CRMBundle\Services;

use Symfony\Component\Security\Core\SecurityContext;

class DashboardManager {

	protected $context;
	
	function __construct(\Symfony\Component\Security\Core\SecurityContext $context)
	{
		$this->context = $context;
	}

	public function getAvailableDashlets()
	{
		//static list - needs to be dynamic and extensible
		$dashlets = array(
			0 => array(
				"id" => "list",
				"title" => "List",
				"description" => "List records from a module",
				"type" => "list",
				"icon" => "fa fa-list"
			),
			1 => array(
				"id" => "chart",
				"title" => "Chart",
				"description" => "Dashlet to represent a data seried",
				"type" => "chart",
				"icon" => "fa fa-bar-chart-o"
			),
			2 => array(
				"id" => "activity_stream",
				"title" => "Activity Stream",
				"description" => "Dashlet to list recent activity",
				"type" => "activity_stream",
				"icon" => "fa fa-bullhorn"
			)
		);

		return $dashlets;
	}
	
	private function _getUserSettings()
	{
		$settings = $this->context->getToken()->getUser()->getSettings();

		return $settings['dashboard_config'];

	}

	public function getDisplay()
	{

		$dashboard_config = $this->_getUserSettings();
		if(sizeof($dashboard_config) <=0){
			$dashboard_config = $this->_getDefaultDashboardConfig();
		}
		
		return $dashboard_config;
	}

	public function getDashlet($dashlet)
	{
		$file = __DIR__."/../Dashlets/dashlets/".$dashlet.".dashlet.php";

		if(file_exists($file)){
			global $dashlet_def;
			require_once $file;
			return $dashlet_def;
		}
	}

	private function _getDefaultDashboardConfig()
	{
		$config = array(
			'columns' => array(
				1 => array(
					'rows' => array(
						1 => array('dashlet' => 'my_contacts')
					)
				),
				2 => array(
					'rows' => array(
						1 => array('dashlet' => 'my_contacts')
					)
				),
				3 => array(
					'rows' => array(
						1 => array('dashlet' =>'my_contacts')
					)
				)
			)
		);

		return $config;
	}
}