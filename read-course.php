<?php
include 'config.php';  
include 'class-library.php';
$get_records=new Read_specific_data;
$records = new Insert_data;  
$success_message = ''; 
if(isset($_GET["id"]))  
 {  
   $id=$_GET["id"];
  
 } 
if(isset($_GET["course"]))  
 {  
   $course=$_GET["course"];
  
 } 

 
if(isset($_POST["add-subject"]))  
 {  
	 
      $insert = array( 
			
           'subject_name' => $_POST['subject_name'],  
           'subject_description'  =>  $_POST['subject_description'], 
			'course_id' =>$_POST['course_id']);
   
      if($records->insert_record('subjects', $insert))  
      {  
           
		   $success_message = 'Subject Added'; 
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
<title><?php echo $course; ?></title>
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
   <div class="card-header"><?php echo $course; ?></div>
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
    
        
                  
                       
                            <a data-toggle="collapse"  href="#collapseThree"><span>
                            </span><i class="fa fa-plus" style="font-size:1em;color:green"></i>&nbsp <span class="text-dark"> Add Subject</span></a>
                     
                 
                    <div id="collapseThree" class="collapse">
                       
                        <form action="" method="post" role="form" style="display: block;">
	<input type="text" class="form-control" id="course_id" name="course_id" style="display:none" value="<?php echo $id; ?>">
	 <div class="form-group">
    <label for="subject_name" class="text-primary">Subject Name<span>&nbsp &#42;</span></label>
    <input type="text" class="form-control" id="subject_name" name="subject_name">
  </div>
  <div class="form-group">
    <label for="subject_description"  class="text-primary">Subject Description<span>&nbsp &#42;</label>
    <textarea class="form-control" id="subject_description" rows="3" name="subject_description"></textarea>
  </div>
  <div class="form-group">
										<div class="row">
											<div class="col-3">
												<input type="submit" name="add-subject" id="register-submit" tabindex="4" class="form-control btn btn-success" value="Add Subject">
											</div>
										</div>
									</div>
  
  
  </form>
     
  </div>
  </div>
    <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <th><input type="checkbox" id="checkall" /></th>
                   <th>Course Subjects</th>
                      <th>Read</th>
                      <th>Update</th>
                        <th>Delete</th>
                   </thead>
    <tbody>
    <?php @$array = $get_records->select_specific_record('subjects','course_id', $id);  
        
          foreach($array as $subject_item) 
		  {
		?>
		
     <tr>
	
    <td><input type="text" class="checkthis" value="<?php echo $subject_item['subject_id'];?>" name="selected-item" disabled style="display:none" /></td>
    <td> <?php echo $subject_item["subject_name"]; ?></td>
     <td> <a href="read-subject.php?id=<?php echo $subject_item['subject_id'].'&subject='.$subject_item["subject_name"];?>" title="View"><span><i class="fa fa-eye" style="font-size:1em;color:black"></i></span></a></td>
	<td><a  href="edit-subject.php?id=<?php echo $subject_item['subject_id'].'&subject='.$subject_item["subject_name"];?>" title="Edit"><span> <i class="fa fa-edit" style="font-size:1em; color:green"></i></span></a></td>
    <td><a href="delete-subject.php?id=<?php echo $subject_item['subject_id'].'&subject='.$subject_item["subject_name"];?>" title="Delete"><span> <i class="fa fa-remove" style="font-size:1em; color:red"></i></span></a></td>
    </tr>

  <?php
		}
	  
		
		
	  ?>
    
    
    </tbody>
        
</table>


                
            </div>
			
	<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Mohsin">
        </div>
        <div class="form-group">
        
        <input class="form-control " type="text" placeholder="Irshad">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
    
        
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>


	<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
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