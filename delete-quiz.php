<?php 
include 'config.php';  
include 'class-library.php';
$get_specific_records= new Read_specific_data;
$delete_record = new Delete_specific_data;
$success_message = '';
 if(isset($_GET["id"]))  
 {  
	$id=$_GET["id"];
 } 
if(isset($_GET["quiz"]))  
 {  
   $quiz=$_GET["quiz"];
  
 } 
 
if(isset($_POST["delete-quiz"]))  
 {  

	      if($delete_record->delete_specific_record('quizz','quiz_id',$_POST['quiz_id']))
          {
		   $success_message = 'Quiz Deleted';
	  
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
<title>Update Quiz</title>
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
   <div class="card-header"><?php echo $quiz; ?></div>
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
       <input type="text" class="form-control" id="quiz_id" name="quiz_id" value="<?php echo $id;?>" style="display:none">

         <?php @$array = $get_specific_records->select_specific_record('quizz','quiz_id', $id);  
        
          foreach($array as $quiz_item) 
		  {
		?>         
		         <div class="form-group">
    <label for="quiz_name" class="text-primary">Quiz Name<span>&nbsp &#42;</span></label>
    <input type="text" class="form-control" id="quiz_name" name="quiz_name" value="<?php echo $quiz_item['quiz_name'];?>">
  </div>
  
  <?php
		  }
  ?>
		      
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalOne">Delete</button>

<!-- Modal -->
<div class="modal fade" id="modalOne" tabindex="-1" role="dialog" aria-labelledby="modalOneLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalOneLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p class="text-danger">Are you sure you want to delete this record?</p>
      </div>
      <div class="modal-footer">
       <button type="submit" name="delete-quiz" class="btn btn-danger btn-lg" style="width: 40%;"> Delete Quiz</button>
      </div>
    </div>
  </div>
</div>  
      
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