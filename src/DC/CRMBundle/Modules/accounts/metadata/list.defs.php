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
				
			),
			'industry' => array(
				'name' => 'industry',
				'type' => 'choice',
				'options' => array()
			)
		)
	),

	'headers' => array(
		'id' => array(
			'name' => 'id',
			'options' => array(
				'width' => '15%'
			)
		), 
		'name' => array(
			'name' => 'name',
			'options' => array(
				'width' => '15%'
			),
		),
		'email' => array(
			'name' => 'email',
			'options' => array(
				'width' => '15%'
			),
		),
		'industry' => array(
			'name' => 'industry',
			'options' => array(
				'width' => '15%'
			)
		),
		'website' => array(
			'name' => 'website',
			'options' => array(
				'width' => '15%'
			),
		),
		'user' => array(
			'name' => 'user',
			'options' => array(
				'width' => '15%'
			),
		),
	),

	'columns' => array(
		'id' => array(
			'name' => 'id',
			'link' => false
		),
		'name' => array(
			'name' => 'name',
			'link' => true
		),
		'email' => array(
			'name' => 'emailAddress',
			'link' => false
		),
		'industry' => array(
			'name' => 'industry',
			'link' => false
		),
		'website' => array(
			'name' => 'website',
			'link' => false
		),
		'user' => array(
			'name' => 'user',
			'link' => false
		),
	)
);