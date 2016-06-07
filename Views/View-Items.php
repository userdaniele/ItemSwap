<?php
if(!isset($_GET['page_username'])){

?>

<aside>
<?php 


$items = new Items();
	
	$rows=	$items->ShowItems();
	
	

for($i=0; $i<count($rows); $i++){
	?>
    
     			<section>
                    <ul>
                   
                      <li class="name-item"> <?php echo "<a href='index.php?id=" .$rows[$i]['id'] . "'>" . $rows[$i]['nome_oggetto']. "</a>" ; ?></li>
                      <li class="foto-item"> <?php echo "<a href='index.php?id=".$rows[$i]['id']. "'><img src='". $rows[$i]['path'] ."'> </a>" ; ?></li>
                      <li class="name-utente"><?php echo  "<a href='".$rows[$i]['p_swapper'] . "'>" .$rows[$i]['username'] . "</a>"; ?> <?php echo  $rows[$i]['data']  ?></li>
                    </ul> 
                    <h2><?php echo  $rows[$i]['prezzo']  ?>€</h2>
                    <div class="stelle"> 
                    	<ul>
                        	<li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
					<div class="bottoni"><button><a href="#">compra</a></button><button><a href="#">scambia</a></button></div>
                </section>
      
    
	
	<?php

}
?>

</aside>

<?php

}

?>

