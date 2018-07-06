<?php 
include 'config.php';  
include 'class-library.php';
$get_specific_records= new Read_specific_data;
$update_specific_fields=new Update_spefic_data;
$success_message = ''; 
 if(isset($_GET["id"]))  
 {  
	@$id=$_GET["id"];
 } 
if(isset($_GET["tutorial"]))  
 {  
   @$tutorial=$_GET["tutorial"];
  
 } 
 
if(isset($_POST["update-tutorial"]))  
 {  

	      $update = array( 
			
           'tutorial_name' => $_POST['tutorial_name'],  
           'tutorial_description'  =>  $_POST['tutorial_description'], 
			'tutorial_id' =>$_POST['tutorial_id']);
   
      if($update_specific_fields->update_specific_record('tutorials', $update, 'tutorial_id', $_POST['tutorial_id']))  
      {  
           
		   $success_message = 'Tutorial Updated'; 
	  }
 }
 
 

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	 
<!------ Include the above in your HEAD tag ---------->
<title>Update Tutorial</title>
<style>
body
{
background-color:gray;
padding:50px;	
}
 
</style>
</head>
<body>

<div class="container">
  <div class="row mb-2">
  <div class="col-md-12">
       <div class="card mt-1 mb-1 pl-1">
   <div class="card-header"><?php echo $tutorial; ?></div>
  <div class="card-body ">
   <?php
   if (!empty ($success_message)) 
					{
					echo'
					<div class="alert alert-info alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
					<strong>'.$success_message.'</strong></div>';
	}
   ?>
  <div class="row ">
  <div class="col">
    
           <form method="post">
       <input type="text" class="form-control" id="tutorial_id" name="tutorial_id" value="<?php echo $id;?>" style="display:none">

         <?php $array = $get_specific_records->select_specific_record('tutorials','tutorial_id', $id);  
        
          foreach($array as $tutorial_item) 
		  {
		?>         
		         <div class="form-group">
    <label for="tutorial" class="text-primary">Course Name<span>&nbsp &#42;</span></label>
    <input type="text" class="form-control" id="tutorial_name" name="tutorial_name" value="<?php echo $tutorial_item['tutorial_name'];?>">
  </div>
  <div class="form-group">
    <label for="course-description"  class="text-primary">Course Description<span>&nbsp &#42;</label>
    <textarea class="form-control" id="tutorial-description" name="tutorial_description" rows="3"> <?php echo $tutorial_item['tutorial_description'];?> </textarea>
  </div>
  <?php
		  }
  ?>
		      
        <button type="submit" name="update-tutorial" class="btn btn-warning btn-lg" style="width: 40%;"> Update</button>
      
	  </form>
        </div>
  
  </div>
    
    </div>


	

    </div>




               </div>
</div>
   
   </div>
   </div>
  
	<!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script>
	/*
$(document).ready(function(){
		$(document).on('click','#edit-course', function(event)
		{
			event.preventDefault();
		}
});
});
	
		
	</script>
	</body>
	</html>