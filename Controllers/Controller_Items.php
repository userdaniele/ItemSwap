<?php 

include_once "Models/Model_Items.php";
class ControllerItems{
	public $model;
	public function __construct()
	{
		$this->model = new Items();
    }
	
	public function View(){
		if(!isset($_GET['id'])){
		include'Views/View-Items.php';
		
		}else{
		
		$item = $this->model->ShowItem($_GET['id']);	
		include'Views/View-Item.php';	
			}
		}
	
	}



?>