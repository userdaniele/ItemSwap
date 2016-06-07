<?php 
$swapper = new Swappers();
	
	$row = $swapper->SwapperPage($_GET['page_username']);
	
	

/*INSERIRE HTML DELLA PAGINA ITEM DEI DESIGNERS*/
?>



<?PHP

	echo $row['nome']."</br>";
	echo $row['cognome']."</br>";
	echo $row['email']."</br>";
	

?>
