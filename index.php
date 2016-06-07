
<?php

include "includes/header.php";

include_once "Controllers/Controller_Items.php";

$view = new ControllerItems();

$view->View();

include_once "Controllers/Controller_Swappers.php";

include "includes/footer.php";
?>


