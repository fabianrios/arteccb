<?php
	
	class Connection{
			
    	private static $instance; 
    	public $host;
	    public $user;
		public $password;
		public $database;
		public $link;
		
    	private function __construct()
    	{				
			$this->host     = DB_HOST;
			$this->user     = DB_USER;
			$this->password = DB_PASSWORD;	
			$this->database = DB_NAME;
			
			/*$this->host = "localhost";
			$this->user = "superest_superes";
			$this->password = "Rfeded0";	
			$this->database = "superest_superestacion";*/
    	}
    	
    	public static function getInstance()
    	{
        	if (!isset(self::$instance)) {            	
            	self::$instance = new Connection();
        	} 
        	return self::$instance;
    	}		
					
		public function connect()
		{
			$this->link = mysql_connect($this->host,$this->user,$this->password) 
				   or trigger_error(mysql_error(),E_USER_ERROR);
			mysql_select_db($this->database,$this->link);
			return $this->link;
		}
		
		public static function query($query)
		{
			if((strpos(strtoupper($query), "ALTER") === false) || (strpos(strtoupper($query), "DROP") === false))
			{
				$result = mysql_query($query);
				if(!$result)
				{
					echo '<br /><strong>MySQL error:</strong> ' . mysql_error() . '<br /><strong>MySQL Query:</strong> <pre>' . $query . '</pre>';
				}
				else
				{
					$id           = '';
					$resultNumber = '';
					$fieldNumber  = '';
					$affectedRows = '';
					if(strpos(strtoupper($query), "SELECT") === 0)
					{
						$resultNumber = mysql_num_rows($result);
						$fieldNumber  = mysql_num_fields($result);
					}
					elseif(strpos(strtoupper($query), "INSERT") === 0)
					{											
						$id = mysql_insert_id();
					}
					elseif(strpos(strtoupper($query), "UPDATE") === 0 || strpos(strtoupper($query), "DELETE") === 0)
					{
						$affectedRows = mysql_affected_rows();
					}
					return array('query' => $result, 
								 'insert_id' => $id, 
								 'num_rows' => $resultNumber, 
								 'num_fields' => $fieldNumber, 
								 'affected_rows' => $affectedRows);
				}
			}
			else
				return array('query' => false);
		}
	}
?>