<?php

include_once "Models/Model_Swappers.php";
include_once "Models/Model_ValSwappers.php";

$mSwappers= new Swappers();



if(isset($_POST['invia'])){
	
	$vSwappers= new ValSwappers();
	if($vSwappers->checkAll()){
	  $mSwappers->Register($_POST['nome'],$_POST['cognome'],$_POST['username'],$_POST['email'],$_POST['password'],$_POST['conf_password'],$_POST['regione']);
	  $loggato=true;
	  $_SESSION['username']=$_POST['username'];
	  echo '<meta http-equiv="refresh" content="5">';
	  
	}

}



if(isset($_POST['inviaLogin'])){
	$username=$_POST['username_email'];
	$email=$_POST['username_email'];
	$password=$_POST['password'];
	
	 if ($mSwappers->doLogin($username,$email,$password)){
	  $loggato=true;	  
	  $_SESSION['username']=$_POST['username_email'];
	  //echo "daje";
	  echo '<meta http-equiv="refresh" content="0;">';
	  }else {
		  echo "Credenziali errate!";
		  }
	

}


if(isset($_GET['logout'])){
	if($_GET['logout']==1){
		$mSwappers->doLogout();
		echo '<meta http-equiv="refresh" content="0;url=index.php">';
		}
}

if(isset($_GET['page_username'])){
	//Se viene passata la query string richiamo il metodo del model per visualizzare l'area personale
	include "Views/View-Swapper.php";
}




?>