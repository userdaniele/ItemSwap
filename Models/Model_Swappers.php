<?php 
include_once "dbconfig.php";

class Swappers {
	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function Register($nome,$cognome,$username,$email,$password,$conf_password,$regione){
		
		
		try
		{
			if($password==$conf_password){$new_password = password_hash($password, PASSWORD_DEFAULT);  
			
			
			
			$stmt = $this->conn->prepare("INSERT INTO tb_swapper(nome, cognome, email, username, password, info_geografica) 
		                                               VALUES(:nome, :cognome, :email, :username, :password, :info_geografica)");
												  
			$stmt->bindparam(":nome", $nome);
			$stmt->bindparam(":cognome", $cognome);
			$stmt->bindparam(":email", $email);										  
			$stmt->bindparam(":username", $username);
			$stmt->bindparam(":password", $new_password);
			$stmt->bindparam(":info_geografica", $regione);	
			$stmt->execute();	
			
			return $stmt;
			} //else {echo "Fottiti bastardo!";}	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}		
		
		}//finisce register
	
	
	
	public function doLogin($username,$email,$password)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT id, username, email, password FROM tb_swapper WHERE username=:username OR email=:email ");
			$stmt->bindparam(":email", $email);										  
			$stmt->bindparam(":username", $username);
			$stmt->execute();
			/*$stmt->execute(array(':username,'=>$username, ':email,'=>$email));*/
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() > 0)
			{
				if(password_verify($password, $userRow['password']))
				{
					/*$_SESSION['username'] = $userRow['username'];*/
					echo "Password ok";
					return true;
				}
				else
				{
					echo "Password KO";
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['username']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['username']); //trovare un altro modo per portarsi a presso l'id
		return true;
	}
	
	
	public function SwapperPage($username){
		
		try {
			$stmt = $this->conn->prepare("SELECT * FROM tb_swapper WHERE username=:username");									  
			$stmt->bindparam(":username", $username);
			$stmt->execute();
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			
			return $userRow;
			
			
			}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}	
	
	
	}
	
	
	
	}// fine class Swappers

?>