<?php 
/**
 * 
 */
include_once ROOT . '/models/news.php';

class NewsController
{
	
	public function actionIndex()
	{
		$newsList = array();
		$newsList = News::getNewsList();
		echo "<pre>";
		print_r($newsList);
		echo "</pre>";


		// echo "News List";
		 return true;

	}
	public function actionView($catergory, $id)
	{
		if ($id) {
			$newsItem = News::getNewsItemById($id);
			echo "<pre>";
			print_r($newsList);
			echo "</pre>";
			echo 'actionView';
		}


		// echo '<br>category: '.$catergory;
		// echo '<br>id: '.$id;

		// echo "Single New";
		// return true;

	}
}



 ?>
