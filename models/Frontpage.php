<?php

class Frontpage
{

	public static function getNewsItemById($id)
	{
		$id = intval($id);


		if($id) {

			$db = Db::getConnection();

			$sth = $db->prepare('SELECT * FROM news WHERE id="'.$id.'"');
			$sth->execute();

			$newsItem = $sth->fetch(PDO::FETCH_ASSOC);

			return $newsItem;

		}

	}

	public static function getNewsList()
	{
		$db = Db::getConnection();

		$newsList = array();

		$sth = $db->prepare("SELECT id, title, date, short_content " . "FROM news ". "ORDER BY date DESC " . "LIMIT 10");
		$sth->execute();
		//$result = $sth->fetch(PDO::FETCH_ASSOC);
		//$result->setFetchMode(PDO::FETCH_NUM);
		//$result->setFetchMode(PDO::FETCH_ASSOC);



		$i=0;
		while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
			//print_r($row);
			$newsList[$i]['id'] = $row['id'];
			$newsList[$i]['title'] = $row['title'];
			$newsList[$i]['date'] = $row['date'];
			$newsList[$i]['short_content'] = $row['short_content'];
			$i++;
		}

		return $newsList;
	}
}