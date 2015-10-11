<?php
require("config.php");
if(!empty($_POST)){
			$query = "INSERT INTO comments (page_id,name,comment) VALUES( :page_id,:name,:comment)";
			$query_params =  array( 'page_id' =>$_POST['page_id'] , 'name' =>$_POST['name'] , 'comment'=>$_POST['comment']);
			try{
				$stmt = $db->prepare($query);
				$stmt ->execute($query_params);
				}
			catch(PDOException $ex){
		die("Database error" .$ex->GetMessage());
		}
	header("Location: gym.html");	
}
	?>
	