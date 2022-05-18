<?php

include_once ROOT. '/models/News.php';

class NewsController
{

	public function actionIndex()
	{
		echo '<br>Список новостей';
		$newsList = array();
		$newsList = News::getNewsList();

		require_once(ROOT.'/views/news/index.php');
		/*
		echo '<pre>';
		print_r($newsList);
		echo '</pre>';
		*/
		return true;
	}

	public function actionView($category, $id)
	{
		echo '<br>Просмотр одной новости';

		$news = array();
		$news = News::getNewsItemById($id);

		echo '<pre>';
		print_r($news);
		echo '</pre>';

		return true;
	}
}