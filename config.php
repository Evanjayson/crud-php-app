<?php
class Database{  

	protected $db_host = 'localhost';
	protected $db_username = 'root';
	protected $db_password = '';
	protected $db_name = 'mafisi';

      public $connect;  
      public function __construct()  
      {  
           $this->connect = mysqli_connect("localhost", "root", "", "mafisi");  
           if(!$this->connect)  
           {  
                echo 'Connection Error ' . mysqli_connect_error($this->connect);  
           }

      }
}	  

 
