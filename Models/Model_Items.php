<?php 
include_once "dbconfig.php";

class Items {
	
	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		
		
		echo $sql;
		return $stmt;
	}
	
	//Metodo per visualizzare tutti gli items nella home
	public function ShowItems(){
		$stmt = $this->conn->query("SELECT * FROM tb_item INNER JOIN tb_img_item ON tb_item.id=tb_img_item.p_item INNER JOIN tb_swapper ON tb_swapper.id=tb_item.p_swapper");
  		$editRow=$stmt->fetchAll(PDO::FETCH_ASSOC);
  		return $editRow;
		}
	
	//Metodo per visualizzare il singolo item nella pagina item
	public function ShowItem($id){
		
		try{
			 $stmt=$this->conn->prepare("SELECT * FROM tb_item INNER JOIN tb_img_item ON tb_item.id=tb_img_item.p_item INNER JOIN tb_swapper ON tb_swapper.id=tb_item.p_swapper WHERE tb_item.id=:id");
			 $stmt->bindparam(":id",$id);
			 $stmt->execute();
			 $editRow=$stmt->fetchAll(PDO::FETCH_ASSOC);
			 return $editRow; 
			}
			catch(PDOException $e)
			{
			 echo $e->getMessage(); 
			 return false;
			}
		
		}
		
	//Metodo per inserimento nuovo item dal form di inserimento item accessibile dall'area personale
	public function InsertItem(){
		
	
	
	}
	
	

}//fine class Items
?>