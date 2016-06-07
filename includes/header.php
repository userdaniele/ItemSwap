<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>SwapItem</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel='stylesheet' id='camera-css'  href='css/camera.css' type='text/css' media='all'>
<link rel="icon" href="images/favicon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>

<script type="text/javascript" src="scripts/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.mobile.customized.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="scripts/camera.min.js"></script>
    
  <script>
      
 jQuery(function(){            
    jQuery('#camera_wrap_1').camera({
				height: '400px',
	});
 });
    </script> 
</head>
<body>
    <header>
    
    <div id="pop-up" class="pop-up" >
        <div class="pop-up-form">
        <a class="close" title="Close" href="#chiudi">X</a>
            <form action="#" method="post">
            <h1>Diventa uno swappers! Iscriviti!</h1>
                <label for="nome">Nome</label> 
                <input name="nome" type="text" maxlength="15">
                <img src="images/freccia.png" class="freccia">
                <div class="errore">
                <span>Messaggio di errore: descrizione errore</span>
                </div>
                 <label for="cognome">Cognome</label> 
                <input name="cognome" type="text">
                 <label for="username">Nome Utente</label> 
                <input name="username" type="text">
                <label for="email">Email</label> 
                <input name="email" type="email">
                <label for="password">Password</label> 
                <input name="password" type="password">
                <label for="conf_password">Inserisci di nuovo la Password</label> 
                <input name="conf_password" type="password">
                <label for="regione">Regione</label>
                <select name="regione" >
                   <option value="abruzzo" selected="selected">Abruzzo  </option>
                   <option value="basilicata" >Basilicata  </option>
                   <option value="calabria" >Calabria  </option>
                   <option value="campania" >Campania  </option>
                   <option value="emilia-romagna">Emilia-Romagna  </option>
                   <option value="Friuli-Venezia Giulia">Friuli-Venezia Giulia  </option>
                   <option value="Lazio">Lazio  </option>
                   <option value="Liguria">Liguria  </option>
                   <option value="Lombardia">Lombardia  </option>
                   <option value="Marche">Marche  </option>
                   <option value="Molise">Molise  </option>
                   <option value="Piemonte">Piemonte  </option>
                   <option value="Puglia">Puglia  </option>
                   <option value="Sardegna">Sardegna  </option>
                   <option value="Sicilia ">Sicilia  </option>
                   <option value="Toscana">Toscana  </option>
                   <option value="Trentino-Alto Adige">Trentino-Alto Adige  </option>
                   <option value="Umbria">Umbria  </option>
                   <option value="Valle d'Aosta">Valle d'Aosta  </option>
                   <option value="Veneto">Veneto  </option>
				</select>
                <input type="submit" value="invia" name="invia">
            </form>
        </div>
    </div>
    <div id="pop-up-login" class="pop-up" >
        <div class="pop-up-form">
        <a class="close" title="Close" href="#chiudi">X</a>
            <form action="#" method="post">
            <h1>Diventa uno swappers! Iscriviti!</h1>
                <label for="username_email">Nome Utente o Email</label> 
                <input name="username_email" type="text" maxlength="15">
                <img src="images/freccia.png" class="freccia">
                <div class="errore">
                <span>Messaggio di errore: descrizione errore</span>
                </div>
                <label for="password">Password</label> 
                <input name="password" type="password">
                <a href="*">Hai dimenticato la password?</a>
                <input type="submit" value="invia" name="inviaLogin">
            </form>
        </div>
    </div>
      <article class="sfondoheader">
            <div class="wrapper">
           		<div id="marchio">
               <img src="images/logo_swap_white.png">
           		</div>
           <?php
           if(!isset($_SESSION['username'])){
		   ?>
		   <ul>
            <li><a href="#pop-up-login">ACCEDI</a></li>
            <li><a href="#pop-up">REGISTRATI</a></li>
           </ul>
           <?php
		   }else{
			   echo "<h1>Benvenuto!<br>".$_SESSION['username']."</h1><br>";
			   echo "<h1>Accedi alla tua <a href='index.php?page_username=".$_SESSION['username']."'>area personale</a></h1><br>";
			   ?>
               <ul>
                <li><a href="index.php?logout=1">LOG OUT</a></li>
               </ul>
               <?php
			   }
		   ?>
        </div>
        </article>
        <div class="ricerca">
            <div class="wrapper">
              <input type="search" placeholder="Cerca nel sito...">  
              <select name="regioni" >
              	<option value="regioni" selected="selected">Regioni </option>
                   <option value="abruzzo">Abruzzo  </option>
                   <option value="basilicata" >Basilicata  </option>
                   <option value="calabria" >Calabria  </option>
                   <option value="campania" >Campania  </option>
                   <option value="emilia-romagna">Emilia-Romagna  </option>
                   <option value="Friuli-Venezia Giulia">Friuli-Venezia Giulia  </option>
                   <option value="Lazio">Lazio  </option>
                   <option value="Liguria">Liguria  </option>
                   <option value="Lombardia">Lombardia  </option>
                   <option value="Marche">Marche  </option>
                   <option value="Molise">Molise  </option>
                   <option value="Piemonte">Piemonte  </option>
                   <option value="Puglia">Puglia  </option>
                   <option value="Sardegna">Sardegna  </option>
                   <option value="Sicilia ">Sicilia  </option>
                   <option value="Toscana">Toscana  </option>
                   <option value="Trentino-Alto Adige">Trentino-Alto Adige  </option>
                   <option value="Umbria">Umbria  </option>
                   <option value="Valle d'Aosta">Valle d'Aosta  </option>
                   <option value="Veneto">Veneto  </option>
				</select>
              <select name="categorie">
                <option value="categorie" selected="selected">Categorie  </option>
                	<option value="categoria1">Categoria 1  </option>
                   <option value="categoria2" >categoria 2  </option>
                   <option value="categoria3" >Categoria 3  </option>
                   <option value="categoria 4" >categoria 4  </option>
                </select>
            
            </div>
        </div>
    </header>
    <div id="banner">
       <div class="fluid_container">
            <div class="camera_wrap camera_black_skin" id="camera_wrap_1">
            <div data-thumb="images/slides/thumbs/img1.jpg" data-src="images/img1.jpg">
                <div class="fadeFromBottom">
                   <div id="descrizione">
                   
                   <h1 id="h1_banner"> Puoi comprare ma..</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin efficitur diam ac mauris gravida pellentesque. Duis interdum, mauris at sodales finibus, lorem est tempus elit, pharetra bibendum                     lectus lorem sed erat. Etiam id leo eu enim tincidunt vestibulum in eget nulla. Maecenas at velit in ante facilisis sagittis. Fusce a porttitor ex. Vivamus vestibulum, ipsum ac fringilla sagittis,                         arcu metus placerat felis, varius dapibus nibh tellus non leo. <p>
                    <button id="vai"><a href="#" id="a_banner">Vai alla guida</a></button><button id="reg"><a href="#" id="a_banner">Registrati</a></button>
           </div>
           <div class="clear"></div>
                      
                </div>
            </div>
            <div data-thumb="images/slides/thumbs/img2.jpg" data-src="images/img2.jpg">
                <div class=" fadeFromBottom">
                    <div id="descrizione">
                   
                   <h1 id="h1_banner"> Puoi comprare ma..</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin efficitur diam ac mauris gravida pellentesque. Duis interdum, mauris at sodales finibus, lorem est tempus elit, pharetra bibendum                     lectus lorem sed erat. Etiam id leo eu enim tincidunt vestibulum in eget nulla. Maecenas at velit in ante facilisis sagittis. Fusce a porttitor ex. Vivamus vestibulum, ipsum ac fringilla sagittis,                         arcu metus placerat felis, varius dapibus nibh tellus non leo. <p>
                      <button id="vai"><a href="#"id="a_banner">Vai alla guida</a></button><button id="reg"><a href="#" id="a_banner">Registrati</a></button>
           </div>
          <div class="clear"></div>
                </div>
            </div>
            <div data-thumb="images/slides/thumbs/img3.jpg" data-src="images/img3.jpg">
                <div class=" fadeFromBottom">
                    <div id="descrizione">
                   
                   <h1 id="h1_banner"> Puoi comprare ma..</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin efficitur diam ac mauris gravida pellentesque. Duis interdum, mauris at sodales finibus, lorem est tempus elit, pharetra bibendum                     lectus lorem sed erat. Etiam id leo eu enim tincidunt vestibulum in eget nulla. Maecenas at velit in ante facilisis sagittis. Fusce a porttitor ex. Vivamus vestibulum, ipsum ac fringilla sagittis,                         arcu metus placerat felis, varius dapibus nibh tellus non leo. <p>
                  <button id="vai"><a href="#" id="a_banner">Vai alla guida</a></button><button id="reg"><a href="#" id="a_banner">Registrati</a></button>
           </div>
          </div>
            </div>
             <div data-thumb="images/slides/thumbs/img4.jpg" data-src="images/img4.jpg">
                <div class=" fadeFromBottom">
                    <div id="descrizione">
                   
                   <h1 id="h1_banner"> Puoi comprare ma..</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin efficitur diam ac mauris gravida pellentesque. Duis interdum, mauris at sodales finibus, lorem est tempus elit, pharetra bibendum                     lectus lorem sed erat. Etiam id leo eu enim tincidunt vestibulum in eget nulla. Maecenas at velit in ante facilisis sagittis. Fusce a porttitor ex. Vivamus vestibulum, ipsum ac fringilla sagittis,                         arcu metus placerat felis, varius dapibus nibh tellus non leo. <p>
                  <button id="vai"><a href="#" id="a_banner">Vai alla guida</a></button><button id="reg"><a href="#" id="a_banner">Registrati</a></button>
           </div>
          </div>
            </div>
    </div>
    </div>
    </div>
   <div class="clear"></div>
    
   <main>
        <div class="wrapper">
   
        
        
        
    <!--<div id="banner">
       <div class="fluid_container">
    	<p>Pagination circles with the height relative to the width</p>
        <div class="camera_wrap camera_black_skin" id="camera_wrap_1">
            <div data-thumb="images/slides/thumbs/img1.jpg" data-src="images/img1.jpg">
                <div class="fadeFromBottom">
                   <div id="descrizione">
                   
                   <h1> Puoi comprare ma..</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin efficitur diam ac mauris gravida pellentesque. Duis interdum, mauris at sodales finibus, lorem est tempus elit, pharetra bibendum                     lectus lorem sed erat. Etiam id leo eu enim tincidunt vestibulum in eget nulla. Maecenas at velit in ante facilisis sagittis. Fusce a porttitor ex. Vivamus vestibulum, ipsum ac fringilla sagittis,                         arcu metus placerat felis, varius dapibus nibh tellus non leo. <p>
                    <button id="vai"><a href="#">Vai alla guida</a></button><button id="reg"><a href="#">Registrati</a></button>
           </div>
           <div id="coprente"></div>
                      
                </div>
            </div>
            <div data-thumb="images/slides/thumbs/img2.jpg" data-src="images/img2.jpg">
                <div class=" fadeFromBottom">
                    <div id="descrizione">
                   
                   <h1> Puoi comprare ma..</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin efficitur diam ac mauris gravida pellentesque. Duis interdum, mauris at sodales finibus, lorem est tempus elit, pharetra bibendum                     lectus lorem sed erat. Etiam id leo eu enim tincidunt vestibulum in eget nulla. Maecenas at velit in ante facilisis sagittis. Fusce a porttitor ex. Vivamus vestibulum, ipsum ac fringilla sagittis,                         arcu metus placerat felis, varius dapibus nibh tellus non leo. <p>
                    <button id="vai"><a href="#">Vai alla guida</a></button><button id="reg"><a href="#">Registrati</a></button>
           </div>
           <div id="coprente"></div>
                </div>
            </div>
            <div data-thumb="images/slides/thumbs/img3.jpg" data-src="images/img3.jpg">
                <div class=" fadeFromBottom">
                    <div id="descrizione">
                   
                   <h1> Puoi comprare ma..</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin efficitur diam ac mauris gravida pellentesque. Duis interdum, mauris at sodales finibus, lorem est tempus elit, pharetra bibendum                     lectus lorem sed erat. Etiam id leo eu enim tincidunt vestibulum in eget nulla. Maecenas at velit in ante facilisis sagittis. Fusce a porttitor ex. Vivamus vestibulum, ipsum ac fringilla sagittis,                         arcu metus placerat felis, varius dapibus nibh tellus non leo. <p>
                    <button id="vai"><a href="#">Vai alla guida</a></button><button id="reg"><a href="#">Registrati</a></button>
           </div>
           <div id="coprente"></div>
                </div>
            </div>
    </div>
    </div>
    </div>-->
    <!--<main>
        <div class="wrapper">
            <sidebar>
                <article class="category">
                    <a href="#"><h1>Categoria1</h1></a>
                    <ul>
                        <li><a href="#">Categoria 01</a></li>
                        <li><a href="#">Categoria 02</a></li>
                        <li><a href="#">Categoria 03</a></li>
                        <li><a href="#">Categoria 04</a></li>
                    </ul>
                </article>
                <br>
                    <article class="category">
                    <a href="#"><h1>Categoria1</h1></a>
                    <ul>
                        <li><a href="#">Categoria 01</a></li>
                        <li><a href="#">Categoria 02</a></li>
                        <li><a href="#">Categoria 03</a></li>
                        <li><a href="#">Categoria 04</a></li>
                    </ul>
                </article>
                <br>
                    <article class="category">
                    <a href="#"><h1>Categoria1</h1></a>
                    <ul>
                        <li><a href="#">Categoria 01</a></li>
                        <li><a href="#">Categoria 02</a></li>
                        <li><a href="#">Categoria 03</a></li>
                        <li><a href="#">Categoria 04</a></li>
                    </ul>
                </article>
                <br>
                    <article class="category">
                    
                    <a href="#"><h1>Categoria1</h1></a>
                    
                    <ul>
                        <li><a href="#">Categoria 01</a></li>
                        <li><a href="#">Categoria 02</a></li>
                        <li><a href="#">Categoria 03</a></li>
                        <li><a href="#">Categoria 04</a></li>
                    </ul>
                </article>
                <br>
                    <article class="category">
                    <a href="#"><h1>Categoria1</h1></a>
                    <ul>
                        <li><a href="#">Categoria 01</a></li>
                        <li><a href="#">Categoria 02</a></li>
                        <li><a href="#">Categoria 03</a></li>
                        <li><a href="#">Categoria 04</a></li>
                    </ul>
                </article>
                <br> 
            </sidebar>-->