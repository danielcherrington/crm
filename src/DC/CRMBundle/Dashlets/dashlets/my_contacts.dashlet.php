<?php

use DC\CRMBundle\Dashlets\DashletList;

$config = array(
	"title" => "My Contacts",
	"module" => "Contacts",
	"limit" => 5
);

$dashlet = new DashletList($config);
$dashlet_def = $dashlet->getDef();