<?php
return array(

	'mvc_practica' => 'frontpage/index', //actionIndex в NewsController
	//'news/([0-9]+)' => 'news/view/$1',
	'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',

	'news' => 'news/index', //actionIndex в NewsController
	'products' => 'product/list' //actionList в ProductController
);