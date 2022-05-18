<?php

include_once ROOT. '/models/Frontpage.php';

class FrontpageController
{

	public function actionIndex()
	{
		//echo '<br>Главная страница';
		$newsList = array();
		$newsList = Frontpage::getNewsList();

		require_once(ROOT.'/views/index.php');
		/*
		echo '<pre>';
		print_r($newsList);
		echo '</pre>';
		*/
		return true;
	}


}