<?php

namespace DC\CRMBundle\Services\Modules;

class ModulesHelper {
	
	public function getEntityMap()
	{
		return array(
			"contacts" => "contact",
			"accounts" => "account",
			"users" => "user"
		);

	}

	public function getEntityClass($module)
	{
		$classes = array(
			"contacts" => "Contact",
			"accounts" => "DC\CRMBundle\Entity\Account",
			"users" => "DC\CRMBundle\Entity\User",

		);

		return $classes[$module];
	}
}