<?php

$var_defs["accounts"] = array(
	"fields" => array(
		"contacts" => array(
			"name" => "contacts",
			"type" => "entity_multiple",
			"options" => array(
				"class" => "DCCRMBundle:Contact",
    			"property" => "name",
    		),
    		"render" => true,
		),
		"name" => array(
			"name" => "name",
			"type" => "text",
			"options" => array(),
			"render" => true,
		),
		"user" => array(
			"name" => "name",
			"type" => "entity",
			"options" => array(
				"class" => "DCCRMBundle:User",
    			"property" => "name"
    		),
    		"render" => true,
		),
		"date_entered" => array(
			"name" => "date_entered",
			"type" => "date",
			"data_class" => "DateTime",
			"options" => array(),
			"render" => false,
		),
		"date_modified" => array(
			"name" => "date_modified",
			"type" => "date",
			"data_class" => "DateTime",
			"options" => array(),
			"render" => false,
		),
		"phone_office" => array(
			"name" => "phone_office",
			"type" => "text",
			"options" => array(),
			"render" => true,
		),
		"website" => array(
			"name" => "website",
			"type" => "text",
			"options" => array(),
			"render" => true,
		),
		"description" => array(
			"name" => "description",
			"type" => "text",
			"options" => array(),
			"render" => true,
		),
		"industry" => array(
			"name" => "industry",
			"type" => "choice",
			"language_list" => true,
			"list_name" => "industry_list",
			"options" => array(

			),
			"render" => true,
		),
		"email_address" => array(
			"name" => "email_address",
			"type" => "text",
			"options" => array(),
			"render" => true,
		),
	)
);

?>