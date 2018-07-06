<?php
include 'config.php';  
include 'class-library.php';
$get_records_quiz= new Read_specific_data ;
$records = new Insert_data;  
$success_message = '';

if(isset($_GET["id"]))  
 {  
   $id=$_GET["id"];
  
 } 
if(isset($_GET["quiz"]))  
 {  
   $quiz=$_GET["quiz"];
  
 } 

 
 if(isset($_POST["add-question"]))  
 {  
	      $insert = array( 
			
           'question' => $_POST['question'],  
		    'option_one' => $_POST['option_one'], 
			 'option_two' => $_POST['option_two'],
			  'option_three' => $_POST['option_three'],
			   'option_four' => $_POST['option_four'],
           'quiz_id'  =>  $_POST['quiz_id']); 
			
		   
   
      if($records->insert_record('questions', $insert))  
      {  
         
		   $success_message = 'Question Added'; 
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
<title><?php echo $quiz;?></title>
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
  <div class="row">
  <div class="col-md-12">
  
      <div class="card"> 
   <div class="card-header"><?php echo $quiz;?></div>
  <div class="card-body ">
  <?php
   if (!empty ($success_message)) 
					{
					echo'
					<div class="alert alert-info alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
					<strong>'.$success_message.'</strong></div>';
	}
   ?>
    <a data-toggle="collapse"  href="#collapseThree"><span>
                            </span><i class="fa fa-plus" style="font-size:1em;color:green"></i>&nbsp <span class="text-dark"> Add Question</span></a>
                     
                 
                    <div id="collapseThree" class="collapse">
                       
                        <form action="" method="post" role="form" style="display: block;">
	<input type="text" class="form-control" id="quiz_id" name="quiz_id" style="display:none" value="<?php echo $id; ?>">
	 <div class="form-group">
    <label for="question" class="text-primary">Question<span>&nbsp &#42;</span></label>
    <input type="text" class="form-control" id="question" name="question">
	</div>
	<div class="form-group">
	<label for="option_one" class="text-primary">Option A<span>&nbsp &#42;</span></label>
    <input type="text" class="form-control" id="option_one" name="option_one">
	</div>
	<div class="form-group">
	<label for="option_two" class="text-primary">Option B<span>&nbsp &#42;</span></label>
    <input type="text" class="form-control" id="option_two" name="option_two">
	</div>
	<div class="form-group">
	<label for="option_three" class="text-primary">Option C<span>&nbsp &#42;</span></label>
    <input type="text" class="form-control" id="option_three" name="option_three">
	</div>
	<div class="form-group">
	<label for="option_four" class="text-primary">Option D<span>&nbsp &#42;</span></label>
    <input type="text" class="form-control" id="option_four" name="option_four">
	</div>
  <div class="form-group">
										<div class="row">
											<div class="col-3">
												<input type="submit" name="add-question"  tabindex="4" class="form-control btn btn-success" value="Add Question">
											</div>
										</div>
									</div>
  
  
  </form>
     
  </div>
  <hr>
  
   <?php @$array = $get_records_quiz->select_specific_record('questions' ,'quiz_id',$id);  
        
          foreach($array as $quiz_item) 
		  
		  
		  {
		?>
    <div class="px-1 row">
	<div class="col-8">
	<p class="text-dark"> <?php echo $quiz_item['question'];?></p>
	</div>
	<div class="col-2">
	<a href="edit-question.php?id=<?php echo $quiz_item['question_id'] ;?>" title="Edit"><span> <i class="fa fa-edit" style="font-size:1em; color:green"></i></span></a>
	</div>
	<div class="col-2">
	<a href="delete-question.php?id=<?php echo $quiz_item['question_id'] ;?>" title="Edit"><span> <i class="fa fa-remove" style="font-size:1em; color:red"></i></span></a>
	</div>
	</div>
	
	<div class="form-check">
  <input class="form-check-input" type="radio" name="option_one"  value="A">
  <label class="form-check-label" for="exampleRadios1">
    <?php echo $quiz_item['option_one'];?>
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="option_two"  value="B">
  <label class="form-check-label" for="exampleRadios2">
   <?php echo $quiz_item['option_two'];?>
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="option_three" value="C" >
  <label class="form-check-label" for="exampleRadios1">
   <?php echo $quiz_item['option_three'];?>
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="option_four"  value="D">
  <label class="form-check-label" for="exampleRadios2">
  <?php echo $quiz_item['option_four'];?>
  </label>
</div>

	<hr>
	<?php
	
		  }
		  ?>
	<hr>
	<div>

	
	
        
                  
                       
                           
	


	


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
	$(document).ready(function(){
		$(document).on('click','.add', function(event)
		{
			event.preventDefault();
			var html = '';
			html +='<tr>';
			html +='<td><input type="text" class="form-control mb-2" id="inlineFormInput"> </td>';
			html +='<td><button class="btn btn-danger remove"><i class="fa fa-minus"  style="font-size:1em;color:white" data-title="Remove"></i></button></td>'
			html +='</tr>';
			$("#item-table").append(html);
		});
		$(document).on('click','.remove', function(event)
		{
			event.preventDefault();
			$(this).closest('tr').remove();
		});
		
		});
		

		
	
		
	</script>
	</body>
	</html>