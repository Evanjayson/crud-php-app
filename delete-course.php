<?php 
include 'config.php';  
include 'class-library.php';
$get_specific_records= new Read_specific_data;
$delete_record =new Delete_specific_data;
$success_message = ''; 
 if(isset($_GET["id"]))  
 {  
	$id=$_GET["id"];
 } 
if(isset($_GET["course"]))  
 {  
   $course=$_GET["course"];
  
 } 
 
if(isset($_POST["delete-course"]))  
 {  

	      if($delete_record->delete_specific_record('courses','course_id',$_POST['course_id']))
          {
		   $success_message = 'Course Deleted';
	  
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
<title>Delete Course</title>
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
   <div class="card-header"><?php echo $course; ?></div>
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
       <input type="text" class="form-control" id="course_id" name="course_id" value="<?php echo $id;?>" style="display:none">

          <?php @$array = $get_specific_records->select_specific_record('courses','course_id', $id);  
        
          foreach($array as $course_item) 
		  {
		?>           
		         <div class="form-group">
    <label for="course_name" class="text-primary">Course Name<span>&nbsp &#42;</span></label>
    <input type="text" class="form-control" id="course_name" name="course_name" value="<?php echo $course_item['course_name'];?>">
  </div>
  <div class="form-group">
    <label for="course-description"  class="text-primary">Course Description<span>&nbsp &#42;</label>
    <textarea class="form-control" id="course-description" name="course_description" rows="3"> <?php echo $course_item['course_description'];?> </textarea>
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
       <button type="submit" name="delete-course" class="btn btn-danger btn-lg" style="width: 40%;"> Delete Course</button>
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
	
		
	</script>
	</body>
	</html>