<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Documento senza titolo</title>
</head>

<body>
<?php 
$items = new Items();
	
	$row = $items->ShowItem($_GET['id']);
	
	

/*INSERIRE HTML DELLA PAGINA ITEM DEI DESIGNERS*/
?>



<?PHP

for($i=0; $i<count($row); $i++){
	
	echo $row[$i]['nome_oggetto']."</br>";
	echo $row[$i]['path']."</br>";
	echo $row[$i]['p_swapper']."</br>";
	
}
?>


</body>
</html>