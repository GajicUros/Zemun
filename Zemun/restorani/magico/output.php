
<?php
	require("config.php");
	$string="<tr>
	<th>Ime</th>
	<th>Komentar</th>
	</tr>
	";
	$query = "SELECT name,comment FROM comments WHERE page_id = :page_id";
	$query_params =array('page_id' => $_POST['page_id']);
	try{
		$stmt = $db->prepare($query);
		$stmt->execute($query_params);
		}
		catch(PDOException $ex){
		die("Database error" .$ex->GetMessage());
		}
		$rows = $stmt->fetchAll();
		if($rows){
		echo $string;
 foreach($rows as $row):
			echo "<tr>";
			echo"<th>".$row['name'] , ":"."</th>";
			echo"<td>".$row['comment']."</td>";
			echo"</tr>";
			endforeach;
			}
else { echo "<tr><td>Nema komentara</tr></td>";}
?>