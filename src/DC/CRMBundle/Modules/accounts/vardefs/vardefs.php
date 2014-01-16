<?php

$var_defs["accounts"] = array(
	"fields" => array(
		"contacts" => array(
			"name" => "contacts",
			"type" => "relate"
		),
		"name" => array(
			"name" => "name",
			"type" => "text"
		),
		"user" => array(
			"name" => "name",
			"type" => "relate"
		),
		"dateEntered" => array(
			"name" => "dateEntered",
			"type" => "date"
		),
		"dateModified" => array(
			"name" => "dateModified",
			"type" => "date"
		),
		"phoneOffice" => array(
			"name" => "phoneOffice",
			"type" => "text"
		),
		"website" => array(
			"name" => "website",
			"type" => "text"
		),
		"description" => array(
			"name" => "description",
			"type" => "text"
		),
		"industry" => array(
			"name" => "industry",
			"type" => "choice"
		),
		"emailAddress" => array(
			"name" => "emailAddress",
			"type" => "text"
		),
	)
);

?>