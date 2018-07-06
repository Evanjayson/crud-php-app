<?php
include 'config.php';  
include 'class-library.php';
$get_records= new Read_specific_data;
$records = new Insert_data;  
$success_message = '';

if(isset($_GET["id"]))  
 {  
   $id=$_GET["id"];
  
 } 
if(isset($_GET["subject"]))  
 {  
   $subject=$_GET["subject"];
  
 } 

 
 if(isset($_POST["add-tutorial"]))  
 {  
	 
      $insert = array( 
			
           'tutorial_name' => $_POST['tutorial_name'],  
           'tutorial_description'  =>  $_POST['tutorial_description'], 
			'subject_id' => $_POST['subject_id']);
		   
   
      if($records->insert_record('tutorials', $insert))  
      {  
         
		   $success_message = 'Tutorial Added'; 
	  }
 }
 
if(isset($_POST["add-quiz"]))  
 {  
	 
      $insert = array( 
			
           'quiz_name' => $_POST['quiz_name'],  
          'subject_id' => $_POST['subject_id']);
		   
   
      if($records->insert_record('quizz', $insert))  
      {  
         
		   $success_message = 'Quiz Added'; 
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
<title><?php echo $subject;?></title>
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
   <div class="card-header"><?php echo $subject;?></div>
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
  <div class="col-12">
    
        
                  
                       
       <a data-toggle="collapse"  href="#collapseThree"><span>
                            </span><i class="fa fa-plus" style="font-size:1em;color:green"></i>&nbsp <span class="text-dark"> Add Tutorial</span></a>
                     
                 
				 
				 
                    <div id="collapseThree" class="collapse">
                       
                        <form  method="post" role="form" style="display: block;">
		<input type="text" class="form-control" id="subject_id" name="subject_id" style="display:none" value="<?php echo $id; ?>">
							 <div class="form-group">
    <label for="tutorial_name" class="text-primary">Tutorial Name<span>&nbsp &#42;</span></label>
    <input type="text" class="form-control" id="tutorial_name" name="tutorial_name">
  </div>
  <div class="form-group">
    <label for="tutorial_description"  class="text-primary">Description<span>&nbsp &#42;</label>
    <textarea class="form-control" id="tutorial_description" rows="3" name="tutorial_description"></textarea>
  </div>
  <div class="form-group">
										<div class="row">
											<div class="col-3">
												<input type="submit" name="add-tutorial" tabindex="4" class="form-control btn btn-success" value="ADD">
											</div>
										</div>
									</div>
  
  
  </form>
     
  </div>
  
  <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <th></th>
                   <th>Tutorial</th>
                      <th>Read</th>
                      <th>Update</th>
                        <th>Delete</th>
                   </thead>
    <tbody>
    
	<?php @$array = $get_records->select_specific_record('tutorials','subject_id', $id);  
        
          foreach($array as $tutorial_item) 
		  {
		?>
    <tr>
	<td><input type="text" class="checkthis" value="<?php echo $tutorial_item['tutorial_id'];?>" name="selected-item"  style="display:none" /></td>
    <td><?php echo $tutorial_item['tutorial_name'];?></td>
     <td> <a href="read-tutorial.php?id=<?php echo $tutorial_item['tutorial_id'].'&tutorial='.$tutorial_item['tutorial_name'];?>" title="view"> <span><i class="fa fa-eye" style="font-size:1em;color:black"></i></span></a></td>
	<td><a href="edit-tutorial.php?id=<?php echo $tutorial_item['tutorial_id'].'&tutorial='.$tutorial_item['tutorial_name'];?>" title="edit"> </span><i class="fa fa-edit" style="font-size:1em; color:green"></i></button></a></td>
    <td><a href="delete-tutorial.php?id=<?php echo $tutorial_item['tutorial_id'].'&tutorial='.$tutorial_item['tutorial_name'];?>" title="delete"> </span><i class="fa fa-remove" style="font-size:1em; color:red"></i></button></p></td>
    </tr>
		  <?php
		  }
		  ?>
    
    </tbody>
        
</table>


                
            </div>
  
  
  
  
  
  </div>
  
  <div class="col-12">
    <a data-toggle="collapse"  href="#collapseFour"><span>
                            </span><i class="fa fa-plus" style="font-size:1em;color:green"></i>&nbsp <span class="text-dark"> Add Quiz</span></a>
                     
                 
				 
				 
                    <div id="collapseFour" class="collapse">
                       
                        <form id="login-form" action="" method="post" role="form" style="display: block;">
	   <form  method="post" role="form" style="display: block;">
		<input type="text" class="form-control" id="subject_id" name="subject_id" style="display:none" value="<?php echo $id; ?>">
							 <div class="form-group">
    <label for="quiz_name" class="text-primary">Quiz Name<span>&nbsp &#42;</span></label>
    <input type="text" class="form-control" id="quiz_name" name="quiz_name">
  </div>
      <div class="form-group">
										<div class="row">
											<div class="col-3">
												<input type="submit" name="add-quiz" tabindex="4" class="form-control btn btn-success" value="ADD">
											</div>
										</div>
									</div>
  
  
  </form>
  
     
  </div>
  
    <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <th></th>
                   <th>Quiz</th>
                      <th>Read</th>
                      <th>Update</th>
                        <th>Delete</th>
                   </thead>
    <tbody>
    
	<?php $array = $get_records->select_specific_record('quizz','subject_id', $id);  
        
          foreach($array as $quiz_item) 
		  {
		?>
    <tr>
	<td><input type="text" class="checkthis" value="<?php echo $quiz_item['quiz_id'];?>" name="selected-item" disabled style="display:none" /></td>
    <td><?php echo $quiz_item['quiz_name'];?></td>
     <td> <a href="read-quiz.php?id=<?php echo $quiz_item['quiz_id'].'&quiz='.$quiz_item['quiz_name'];?>" title="view"> <span><i class="fa fa-eye" style="font-size:1em;color:black"></i></span></a></td>
	<td><a href="edit-quiz.php?id=<?php echo $quiz_item['quiz_id'].'&quiz='.$quiz_item['quiz_name'];?>" title="edit"> </span><i class="fa fa-edit" style="font-size:1em; color:green"></i></button></a></td>
    <td><a href="delete-quiz.php?id=<?php echo $quiz_item['quiz_id'].'&quiz='.$quiz_item['quiz_name'];?>" title="delete"> </span><i class="fa fa-remove" style="font-size:1em; color:red"></i></button></p></td>
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
	

		
	
		
	</script>
	</body>
	</html>