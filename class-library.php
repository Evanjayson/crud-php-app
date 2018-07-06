<?php
class Insert_data extends Database{  

public function insert_record($table_name, $records)  
      {  
        $field = "INSERT INTO ".$table_name." (";
		$field.= implode(",", array_keys($records)) . ') VALUES (';
		 $field .= "'" . implode("','", array_values($records)) . "')";  
           if(mysqli_query($this->connect, $field))  
           {  
                return true;  
           }  
           else  
           {  
                echo mysqli_error($this->connect);  
         

}
	  }
}
 class Read_data extends Database{
 
 public function select_record($table_name)  
      {  
           $array = array();  
           $query = "SELECT * FROM ".$table_name."";  
           $result = mysqli_query($this->connect, $query);  
           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }  
 }
 
 
 class Read_specific_data extends Database{
	 
 public function select_specific_record($table_name, $primary_key, $where)  
      {  
           $array = array();      
           $query = "SELECT * FROM ".$table_name." WHERE " . $primary_key."=".$where."";  
           $result = mysqli_query($this->connect, $query);  
           while($row = mysqli_fetch_array($result))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }  
 }
class Update_spefic_data extends Database{
	
	public function update_specific_record($table_name, $records, $primary_key, $where)  
      {  
          $query = '';
		  
		 foreach($records as $key => $value)  
           {  
                foreach($records as $key => $value)  
           {  
                $query .= $key . "='".$value."', ";  
           }  
           $query = substr($query, 0, -2); 
		
		$query = "UPDATE ".$table_name." SET ".$query." WHERE ".$primary_key."=".$where."";  
           
		   if(mysqli_query($this->connect, $query))  
           {  
                return true;  
           }
	  }
}
}	  
class Delete_specific_data extends Database{
	 
 public function delete_specific_record($table_name, $record_key, $where)  
      {  
       $query = "DELETE FROM ".$table_name." WHERE ".$record_key." = ".$where.""; 
			if(mysqli_query($this->connect, $query))  
           {  
                return true;  
           }
		   	
			           
      }  
 }		


	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 