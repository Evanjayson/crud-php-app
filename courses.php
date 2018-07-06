<?php 
include 'config.php';  
include 'class-library.php';
$get_records= new Read_data;
$records = new Insert_data;  
$success_message = ''; 
 if(isset($_POST["add-course"]))  
 {  
	 
      $insert = array( 
			
           'course_name' => $_POST['course_name'],  
           'course_description'  =>  $_POST['course_description']);  
   
      if($records->insert_record('courses', $insert))  
      {  
         
		   $success_message = 'Course Added'; 
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
<title>Courses</title>
<style>
body
{
background-color:gray;
padding:50px;	
}
 .jumbotron-image
{
	 border:0;
	-webkit-background-size: contain;
    -moz-background-size: contain;
    -o-background-size: contain;
    background-size: contain;
	background-size: cover;
	
}

</style>
</head>
<body>

<div class="container">
  <div class="row mb-2">
  <div class="col-md-12">
       <div class="card mt-1 mb-1 pl-1">
   <div class="card-header">Courses</div>
   <?php
   if (!empty ($success_message)) 
					{
					echo'
					<div class="alert alert-info alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
					<strong>'.$success_message.'</strong></div>';
	}
   ?>
  <div class="card-body ">
  <div class="row ">
  <div class="col">
    
        
                  
                       
                            <a data-toggle="collapse"  href="#collapseOne"><span>
                            </span><i class="fa fa-plus" style="font-size:1em;color:green"></i>&nbsp <span class="text-dark"> Add Course</span></a>
                     
                 
                    <div id="collapseOne" class="collapse">
                       
                        <form  action="" method="post" role="form" style="display: block;">
	 <div class="form-group">
    <label for="course_name" class="text-primary">Course Name<span>&nbsp &#42;</span></label>
    <input type="text" class="form-control" id="course_name" name="course_name">
  </div>
  <div class="form-group">
    <label for="course-description"  class="text-primary">Course Description<span>&nbsp &#42;</label>
    <textarea class="form-control" id="course-description" name="course_description" rows="3"></textarea>
  </div>
  <div class="form-group">
										<div class="row">
											<div class="col-3">
												<input type="submit" name="add-course" id="register-course" tabindex="4" class="form-control btn btn-success" value="ADD COURSE">
											</div>
										</div>
									</div>
  
  
  </form>
     
  </div>
  </div>
      <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <th></th>
                   <th>Course</th>
                      <th>Read</th>
                      <th>Update</th>
                        <th>Delete</th>
                   </thead>
    <tbody>
     <?php
  @$array = $get_records->select_record('courses');  
        
          foreach($array as $course_item) 
		
		{
			?>
    <tr>
	
    <td><input type="text" class="checkthis" value="<?php echo $course_item['course_id'];?>" name="selected-item" disabled style="display:none" /></td>
    <td> <?php echo $course_item["course_name"]; ?></td>
     <td> <a href="read-course.php?id=<?php echo $course_item['course_id'].'&course='.$course_item["course_name"];?>" title="View"><span><i class="fa fa-eye" style="font-size:1em;color:black"></i></span></a></td>
	<td><a  href="edit-course.php?id=<?php echo $course_item['course_id'].'&course='.$course_item["course_name"];?>" title="Edit"><span> <i class="fa fa-edit" style="font-size:1em; color:green"></i></span></a></td>
    <td><a href="delete-course.php?id=<?php echo $course_item['course_id'].'&course='.$course_item["course_name"];?>" title="Delete"><span> <i class="fa fa-remove" style="font-size:1em; color:red"></i></span></a></td>
    </tr>

  <?php
		}
	  
		
		
	  ?>
    </tbody>
        
</table>


                
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