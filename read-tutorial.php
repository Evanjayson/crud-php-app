<?php
include 'config.php';  
include 'class-library.php';
$get_records= new Read_specific_data;
if(isset($_GET["id"]))  
 {  
   $id=$_GET["id"];
  
 } 
if(isset($_GET["tutorial"]))  
 {  
   $tutorial=$_GET["tutorial"];
  
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
	 
<title><?php echo $tutorial;?></title>
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
     <div class="card-body ">
  
  <div class="row ">
  <div class="col-12">
    
        
                
	<?php @$array = $get_records->select_specific_record('tutorials','tutorial_id', $id);  
        
          foreach($array as $tutorial_item) 
		  {
		?>
    
    </div><p class="text-dark"><?php echo $tutorial_item['tutorial_name'];?></p></div>
     <div><p class="text-secondary"> <?php echo $tutorial_item['tutorial_description'];?></div>
<?php
		  }
?>		  


                
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