<?php

include_once "dbconfig.php";

class ValSwappers {
	
	public $nome;
	public $cognome;
	public $username;
	public $email;
	public $password;
	public $conf_password;
	public $regione;
	private $conn;
	
	//$errorMsgs è l'array dei messaggi di errore che debbono essere mostrati in caso di non validazione dei dati
	public $errorMsgs = array(
			'nome' => 'Il nome deve essere composto da caratteri alfanumerici e deve contenere dai 4 ai 15 caratteri al massimo.',
			'cognome' => 'Il cognome deve essere composto da caratteri alfanumerici e deve contenere dai 4 ai 20 caratteri al massimo.',
			'email' => 'L\' e-mail deve essere composta nella seguente forma: "mailname@mailserver.mailext"',
			'same_email' => 'L\' e-mail esiste già. Prova la procedura di recupero password."',
			'username' => 'Il nome utente deve essere composto da caratteri alfanumerici e deve contenere dai 4 ai 15 caratteri al massimo.',
			'same_username' => 'Il nome utente esiste già. Prova la procedura di recupero password."',
			'password' => 'La password non è corretta. Deve essere composta da numeri o lettere compresi tra 4 e 20 caratteri',
			'conf_password' => 'La password deve corrispondere a quella appena inserita',
			'regione' => 'Non hai selezionato nessuna Regione',
	);
	private $err = ''; //non può essere vista e utilizzata dall'esterno, nemmeno da una sottoclasse
	public $clean = array(); //$clean è un array vuoto che verrà riempito con i valori del nome, cognome, email etc depurati secondo la funzione htmlentities

/* costruttore. Il metodo è public perchè la classe viene istanziata dal file di interfaccia utente che contiene la form da validare
			Nel costruttore vengono definite le variabili comunicate come POST, tramite la variabile $this che rappresenta l'istanza corrente dell'oggetto. Tali variabili sono le proprietà public dell'oggetto
			
		*/
        public function __construct() {
			
                $this->nome = $_POST['nome'];
                $this->cognome = $_POST['cognome'];
                $this->email = $_POST['email'];
                $this->password = $_POST['password'];
				$this->conf_password = $_POST['conf_password'];
				$this->username = $_POST['username'];
				$this->regione = $_POST['regione'];
				
				$database = new Database();
				$db = $database->dbConnection();
				$this->conn = $db;
				
        }
		
		/*public function Connessione(){
			
				$database = new Database();
				$db = $database->dbConnection();
				$this->conn = $db;
			
			}*/
			
			
			
			
	 //controllo che serve a verificare se l'email e l'username sono presenti nel DB
		public function SameEorU($username,$email){
			
			
		try	{
		//echo $username."XXX".$email;
		//exit;
			$stmt = $this->conn->prepare("SELECT username, email FROM tb_swapper WHERE username=:username OR email=:email");
			//echo $username."XXX".$email;
			$stmt->execute(array(':username'=>$username, ':email'=>$email));
			//echo $username."AAA".$email;
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			//var_dump($row);
			//die();
			if($row['username']==$username) {
					  //echo "Username già esistente";
					  return false;
				  }
				  else if($row['email']==$email) {
					  //echo "Email già esistente";
					  return false;
				  }else{
					  return true;
					  }
			
				
			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		}
		
		
		
		
            // metodi di tracking/erroring
        protected function trackErrorMsg($field) { //la funzione riceve il nome del campo. E' protected, quindi viene utilizzata solo all'interno della classe o delle sue classi derivate
                if($this->errorMsgs[$field]) {//se esiste il messaggio di errore relativo a field
                        $this->err .= "<p>" . $this->errorMsgs[$field] . "</p>"; //vado a incrementare la stringa relativa ai messaggi d'errore, che può contenere soltanto alcuni dei messaggi d'errore relativi ai campi non compilati
                }
                else {
                        $this->internalError(); //potrebbe essere anche un altro tipo di errore non aspettato, così lo intercetto con il metodo protetto internalError 
                }
        }
         
        protected function getErrorMsg() {//il metodo getErrorMsg.E' protected, quindi viene utilizzata solo all'interno della classe o delle sue classi derivate
                if($this->err != '') {//se la proprietà err è diversa da stringa vuota vuol dire che è stato rilevato almeno un errore
                        echo "<h4>Errore!</h4>";
                        echo $this->err; //stampo la stringa con l'errore
                        return false;
                }
                else {
                        echo "<h4>Ok!</h4>"; //OK tutti i dati sono stati inviati correttamente
                        echo "<p>Tutti i campi del form sono stati inviati correttamente.</p>";
                        return true;
                }
        }
         
        protected function internalError() { //lancia un messaggio d'errore personalizzato. E' protected, quindi viene utilizzata solo all'interno della classe o delle sue classi derivate
                trigger_error('Si è verificato un errore sconosciuto.', E_USER_WARNING);
        }



// metodi di checking
		
		// checkNome() è un metodo public perchè deve essere chiamato dalla interfaccia pubblica utente
        public function checkNome() {
			//restituisce true o false
			//is_string controlla che la variabile $this->name sia una stringa
			//ctype_alnum($this->nome) controlla che la variabile $this->nome sia composta da caratteri alfanumerici. Restituisce TRUE se ogni carattere in text è o una lettera o una cifra, FALSE in caso contrario.
			//strlen restituisce il numero di caratteri di una stringa
                if(is_string($this->nome) && ctype_alnum($this->nome) && (strlen($this->nome) <= 15) && (strlen($this->nome) >= 4)) {
                        echo "<p>Il nome è stato inviato correttamente.</p>";
						
						//vado a riempire l'array clean[], contenente la variabile $this->nome depurata secondo la funzione htmlentities
                        $this->clean['nome'] = htmlentities($this->nome, ENT_QUOTES);
						
						
						/* htmlentities. Reserved characters in HTML must be replaced with character entities.
						Characters not present on your keyboard can also be replaced by entities.*/


                }
                else { //in caso non venga soddisfatta la condizione if (ovvero il nome immesso  non sia una stringa alfanumerica di caratteri tra 4 e 15
                        $this->trackErrorMsg('nome'); //invoco il metodo trackErrorMsg passando il nome del campo 'name'.
						//il metodo è protected ma può essere utilizzato all'interno di una classe derivata
                }
        }
         
        public function checkCognome() {
			//restituisce true o false
                if(is_string($this->cognome) && ctype_alnum($this->cognome) && (strlen($this->cognome) <= 20) && (strlen($this->cognome) >= 4)) {
                        echo "<p>Il cognome è stato inviato correttamente.</p>";
                        $this->clean['cognome'] = htmlentities($this->cognome, ENT_QUOTES); //con l'opzione ENT_QUOTES la funzione htmlentities converte in caratteri speciali sia gli apici doppi sia gli apici singoli e tutti i caratteri della tastiera che compaiono nelle espressioni HTML..
                }
                else {
                        $this->trackErrorMsg('cognome');
                }
        }
         
        public function checkEmail() {
			//restituisce true o false. La funzione preg_match controlla che la variabile che rappresenta l'email venga confrontata con un certo "pattern" che è un'espressione regolare. All'inizio e alla fine dell'espressione regolare ci debbono essere i caratteri "/". La funzione preg_match sostituisce la funzione eregi che è attualmente deprecata.
                if(is_string($this->email) && preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+.[a-zA-Z.]{2,5}$/', $this->email)) {
                        
						if($this->SameEorU($this->username,$this->email)){
						echo "<p>L'e-mail è stata inviata correttamente.</p>";
                        $this->clean['email'] = $this->email;}
						else{
							$this->trackErrorMsg('same_email');}
                		}
                else {
                        $this->trackErrorMsg('email');
                }
        }
        
		public function checkPassword() {
			//restituisce true o false
                if(is_string($this->password) && ctype_alnum($this->password) && (strlen($this->password) <= 20) && (strlen($this->password) >= 4)) {
                        echo "<p>La password è stata inviata correttamente.</p>";
                        $this->clean['password'] = htmlentities($this->password, ENT_QUOTES); //con l'opzione ENT_QUOTES la funzione htmlentities converte in caratteri speciali sia gli apici doppi sia gli apici singoli e tutti i caratteri della tastiera che compaiono nelle espressioni HTML..
                }
                else {
                        $this->trackErrorMsg('password');
                }
        }
		 
        public function checkConf_password() {
			if($this->conf_password!="" && $this->conf_password==$this->password){
				echo "<p>Le 2 password combaciano.</p>";
				} else {
					$this->trackErrorMsg('conf_password');
					}
		
        }
		
		
		public function checkUsername() {
			
                if(is_string($this->username) && ctype_alnum($this->username) && (strlen($this->username) <= 15) && (strlen($this->username) >= 4)) {
					
						if($this->SameEorU($this->username,$this->email) ){
                        echo "<p>Il nome utente è stato inviato correttamente.</p>";
						
						//vado a riempire l'array clean[], contenente la variabile $this->nome depurata secondo la funzione htmlentities
                        $this->clean['username'] = htmlentities($this->username, ENT_QUOTES);
						/* htmlentities. Reserved characters in HTML must be replaced with character entities.
						Characters not present on your keyboard can also be replaced by entities.*/
						}else{
						$this->trackErrorMsg('same_username');
						}

                }
                else { //in caso non venga soddisfatta la condizione if (ovvero il nome immesso  non sia una stringa alfanumerica di caratteri tra 4 e 15
                        $this->trackErrorMsg('username'); //invoco il metodo trackErrorMsg passando il nome del campo 'name'.
						//il metodo è protected ma può essere utilizzato all'interno di una classe derivata
                }
        }
		
		public function checkRegione() {
			//Controllo che sia stata selezionata una voce della select
                if(isset($this->regione)){
				
				echo "<p>Hai selezionato correttamente la regione.</p>";
				
				} else {
					$this->trackErrorMsg('regione');
					}
		}
		
		
		
		public function checkAll() {
                $this->checkNome();
                $this->checkCognome();
                $this->checkEmail();
                $this->checkUsername();
                $this->checkPassword();
				$this->checkConf_password();
				$this->checkRegione();
                return $this->getErrorMsg();
        }
		
// ...

	
}
?>