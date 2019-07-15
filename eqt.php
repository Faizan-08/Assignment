<?php
$connection = mysql_connect("localhost","root","");
$db = mysql_select_db("test",$connection);
if(isset($_POST['submit']))

{
	
$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="Upload/";
 $name = $_POST['name'];
$phoneno = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];

 
 // new file size in KB
 $new_size = $file_size/1024;  
 // new file size in KB
 
 // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql="INSERT INTO inquiry(name,phone,address,email,file,type,size) VALUES('$name','$phoneno','$address','$email','$final_file','$file_type','$new_size')";
  mysql_query($sql);
  ?>
  <script>
  alert('Form submitted successfully');
        window.location.href='eqt.php?success';
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('error while uploading file');
        window.location.href='eqt.php?fail';
        </script>
  <?php
  
 
}



}
mysql_close($connection);
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>FORM</h2>
  <form action="" method="POST"  enctype="multipart/form-data">
    <div class="form-group" >
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
	  <div class="form-group">
      <label for="email">Phone:</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter PhoneNo." name="phone">
    </div>
	  <div class="form-group">
      <label for="email">Address:</label>
      <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
	<div id="body">
 
 <input type="file" name="file" />

 </div>
    <br /><br />
    
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
