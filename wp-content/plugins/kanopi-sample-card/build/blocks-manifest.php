<?php
// This file is generated. Do not modify it manually.
return array(
	'kanopi-sample-card' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'create-block/kanopi-sample-card',
		'version' => '0.1.0',
		'title' => 'Kanopi Sample Card',
		'category' => 'widgets',
		'icon' => 'smiley',
		'description' => 'A simple editable card block with image, title, and description.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'kanopi-sample-card',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'attributes' => array(
			'title' => array(
				'type' => 'string',
				'source' => 'html',
				'selector' => 'h3'
			),
			'description' => array(
				'type' => 'string',
				'source' => 'html',
				'selector' => 'p'
			),
			'imageUrl' => array(
				'type' => 'string',
				'source' => 'attribute',
				'selector' => 'img',
				'attribute' => 'src'
			),
			'imageAlt' => array(
				'type' => 'string',
				'source' => 'attribute',
				'selector' => 'img',
				'attribute' => 'alt'
			)
		)
	)
);
