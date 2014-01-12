<?php

$defs = array(
	'search' => array(
		'fields' => array(
			'name' => array(
				'name' => 'name',
				'type' => 'text',
				'options' => array()
			),

			'email' => array(
				'name' => 'email',
				'type' => 'email',
				'options' => array()
				
			)
		)
	),

	'headers' => array(
		'id',
		'name'
	),

	'columns' => array(
		'id' => array(
			'name' => 'id',
			'link' => false
		),
		'name' => array(
			'name' => 'name',
			'link' => true
		)
	)
);