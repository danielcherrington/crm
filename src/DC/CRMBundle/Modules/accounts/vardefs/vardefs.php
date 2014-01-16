<?php

$var_defs["accounts"] = array(
	"fields" => array(
		"contacts" => array(
			"name" => "contacts",
			"type" => "entity_multiple",
			"options" => array(
				"class" => "DCCRMBundle:Contact",
    			"property" => "name",
    		)
		),
		"name" => array(
			"name" => "name",
			"type" => "text",
			"options" => array()
		),
		"user" => array(
			"name" => "name",
			"type" => "entity",
			"options" => array(
				"class" => "DCCRMBundle:User",
    			"property" => "name",
    		)
		),
		"dateEntered" => array(
			"name" => "dateEntered",
			"type" => "date",
			"options" => array()
		),
		"dateModified" => array(
			"name" => "dateModified",
			"type" => "date",
			"options" => array()
		),
		"phoneOffice" => array(
			"name" => "phoneOffice",
			"type" => "text",
			"options" => array()
		),
		"website" => array(
			"name" => "website",
			"type" => "text",
			"options" => array()
		),
		"description" => array(
			"name" => "description",
			"type" => "text",
			"options" => array()
		),
		"industry" => array(
			"name" => "industry",
			"type" => "choice",
			"language_list" => true,
			"list_name" => "industry_list",
			"options" => array(

			)
		),
		"emailAddress" => array(
			"name" => "emailAddress",
			"type" => "text",
			"options" => array()
		),
	)
);

?>