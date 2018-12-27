<?php 
return array(
	//$1 and $2 <o> index.php 9-11 lines 
			'news/([0-9]+)' => 'news/view/$1',
			'news' => 'news/index', 
			'products' => 'product/list' // product ctrl list action method
		    );


 ?>