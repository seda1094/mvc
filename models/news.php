<?php 
class News
{
	public static function getNewsItemById($id)
	{
		
	}



	public static function getNewsList()
	{
		$host = 'localhost';
		$dbname = 'mvc_site';
		$user = "root";
		$password = "root";
		$db = new PDO("mysql:host=$host;dbname=$dbname,$user,$password");
		$newsList = array();

		$result = $db->query('SELECT id, title, date, short_content' 
	    . 'FROM news'
		.  'ORDER BY date DESC'
		.  'LIMIT 10');
		$i = 0;
		while ($row = $result->fetch()) {
			$newsList[$i]['id'] = $row['id'];
			$newsList[$i]['title'] = $row['title'];
			$newsList[$i]['date'] = $row['date'];
			$newsList[$i]['short_content'] = $row['short_content'];
			$i++;



		}
		return $newsList;
	}
}


 ?>