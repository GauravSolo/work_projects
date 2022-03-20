<?php
  
    require_once 'databaseGlobal.php';
    
	
	class DBConnection {
		
		protected $address;
	    protected $username;
	    protected $password;
	    protected $dbname;   
	   
	    public function __construct(){
			
		    $this->address  = address;
		    $this->username = username;
		    $this->password = password;
		    $this->dbname   = dbname;
	    }
	}
	
	final class PromotionSMS extends DBConnection {
		
		private $usertable;
	   
	    public function __construct(){
			
			parent::__construct();
		   
		    $this->usertable = recordTable;
	    }
		
		public function makeRecord( $date, $type, $string, $remark, $customer ){
			
			try{
				$con = new mysqli( $this->address, $this->username, $this->password, $this->dbname );
				
				if( $con->connect_error ){
					throw new Exception("Error : Failed to connect to database");
				}
				else{
					$cmd = "INSERT INTO $this->usertable ( date, promotion_type, template, customer, remark ) VALUES ('$date', '$type', '$string', '$customer', '$remark') ;";
					
					try{
						$result = $con->query($cmd);
						if( !$result ){
							throw new Exception("Error : Unable to retrieve data from database");
						}
						else{
							$con->close();
							return true;
						}
					}
					catch(Exception $e){
						return false;
					}
				}
				
			}
			catch(Exception $e){
				return false;
			}
			
		}
		
	};
	
	
	final class Template extends DBConnection {
		
	    private $usertable;	   
	   
	    public function __construct(){
			
			parent::__construct();
		    $this->usertable = templateTable;
	    }
		
		public function getTemplate( $type ){
			
			try{
				$con = new mysqli( $this->address, $this->username, $this->password, $this->dbname );

				
				if( $con->connect_error ){
					throw new Exception("Error : Failed to connect to database");
				}
				else{
					$cmd = "SELECT sms FROM $this->usertable where type = '$type';";
					
					try{
						$result = $con->query($cmd);
						if( !$result ){
							throw new Exception("Error : Unable to retrieve data from database");
						}
						else{
							
							$rlt;
							$a=0;
							
							while( $row = mysqli_fetch_row($result) ){
								$row = explode( ", ", $row[0] );
								$rlt[$a++] = $row;
							}
							
							echo json_encode($rlt);
							
							$result->free_result();
							$con->close();
							return true;
						}
					}
					catch(Exception $e){
						return false;
					}
				}
			}
			catch(Exception $e){
				return false;
			}
			
		}
    };
  
    
	
	final class Record extends DBConnection {
		
	    private $usertable;
	   
	    public function __construct(){
			
			parent::__construct();
		   
		    $this->usertable = recordTable;
	    }
		
		public function getRecord(){
			
			try{
				$con = new mysqli( $this->address, $this->username, $this->password, $this->dbname );

				
				if( $con->connect_error ){
					throw new Exception("Error : Failed to connect to database");
				}
				else{
					$cmd = "SELECT date, promotion_type, template FROM $this->usertable;";
					
					try{
						$result = $con->query($cmd);
						if( !$result ){
							throw new Exception("Error : Unable to retrieve data from database");
						}
						else{
							
							$rlt;
							$a=0;
							
							while( $row = mysqli_fetch_row($result) ){
								$arr[0] = explode( ", ", $row[0] );
								$arr[1] = explode( ", ", $row[1] );
								$arr[2] = explode( ", ", $row[2] );
								$rlt[$a++] = $arr;
							}
							
							
							if($rlt){
							    echo json_encode($rlt);
							}
							else{
								echo json_encode(NULL);
							}
							
							$result->free_result();
							$con->close();
							return true;
						}
					}
					catch(Exception $e){
						return false;
					}
				}
			}
			catch(Exception $e){
				return false;
			}
			
		}
    };
	
	
?>