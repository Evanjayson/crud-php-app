<?php 
include 'config.php';  
include 'class-library.php';
$get_specific_records= new Read_specific_data;
$update_specific_fields=new Update_spefic_data;
$success_message = ''; 
 if(isset($_GET["id"]))  
 {  
	$id=$_GET["id"];
 } 

if(isset($_POST["update-question"]))  
 {  

$update = array( 
			
           'question' => $_POST['question'],  
		    'option_one' => $_POST['option_one'], 
			 'option_two' => $_POST['option_two'],
			  'option_three' => $_POST['option_three'],
			   'option_four' => $_POST['option_four'],
           'question_id'  =>  $_POST['question_id']); 
			

	      
   
     if($update_specific_fields->update_specific_record('questions', $update, 'question_id', $_POST['question_id']))  
      {  
           
		   $success_message = 'Question Updated'; 
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
<title>Edit Question</title>
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
   <div class="card-header">Edit Question</div>
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
    

        <?php @$array = $get_specific_records->select_specific_record('questions','question_id', $id);  
        
          foreach($array as $question_item) 
		  {
		?>         
		<input type="text" class="form-control" id="question_id" name="question_id" style="display:none" value="<?php echo $id; ?>">
	 <div class="form-group">
    <label for="question" class="text-primary">Question<span>&nbsp &#42;</span></label>
    <input type="text" class="form-control" id="question" name="question" value="<?php echo $question_item['question'];?>" >
	</div>
	<div class="form-group">
	<label for="option_one" class="text-primary">Option A<span>&nbsp &#42;</span></label>
    <input type="text" class="form-control" id="option_one" name="option_one" value="<?php echo $question_item['option_one'];?>">
	</div>
	<div class="form-group">
	<label for="option_two" class="text-primary">Option B<span>&nbsp &#42;</span></label>
    <input type="text" class="form-control" id="option_two" name="option_two" value="<?php echo $question_item['option_two'];?>">
	</div>
	<div class="form-group">
	<label for="option_three" class="text-primary">Option C<span>&nbsp &#42;</span></label>
    <input type="text" class="form-control" id="option_three" name="option_three" value="<?php echo $question_item['option_three'];?>">
	</div>
	<div class="form-group">
	<label for="option_four" class="text-primary">Option D<span>&nbsp &#42;</span></label>
    <input type="text" class="form-control" id="option_four" name="option_four" value="<?php echo $question_item['option_four'];?>" >
	</div>
  <?php
		  }
  ?>
		      
        <button type="submit" name="update-question" class="btn btn-warning btn-lg" style="width: 40%;"> Update</button>
      
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