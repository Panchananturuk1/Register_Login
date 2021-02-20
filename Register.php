<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Bootstrap Simple Registration Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #fff;
	background: #63738a;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 450px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}
.signup-form h2 {
	color: #636363;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	background: #d4d4d4;
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	color: #999;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f2f3f7;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	color: #fff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #5cb85c;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}  
</style>
</head>
<body>
<div class="signup-form">
    <form action="Register.php" method="post" enctype="multipart/form-data">
		<h2>Register</h2>
		
        <div class="form-group">
        <div>
            <label for="cv">Upload your cv </label> 
            <input type="file" name="cv" id="image" />
         </div><br />
			<div class="row">           
				<div class="col"><input type="text" class="form-control" name="Full_Name" placeholder="Full  Name" required="required"></div>				
			</div>     
            <div><br />
            <label for="gen">Gender: </label>
                <label for="male">Male</label>
                <input type="radio" value="Male" name="gender"> 
                <label for="Female">Female</label>
                <input type="radio"  value="Female"  name="gender">
         </div>   	<br />
        
    	

        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
            		
        </div>

        <div class="form-group">
        <input type="text" class="form-control" name="Address" placeholder="Address.." required="required">	
        </div>

        <div class="form-group">
        <input type="number" class="form-control" name="Contact" placeholder="Contact Number.." required="required">	
        </div>

		<div class="form-group">
            <input type="password" class="form-control" name="Password" placeholder="Password" required="required">
        </div>
		     
     
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Register Now</button>
        </div>

        
    </form>
	<div class="text-center">Already have an account? <a href="Login.php">Sign in</a></div>
</div>

<?php

    if(isset($_POST['submit']))
    {

   $cv = $_POST['cv'];
    $Full_Name = $_POST['Full_Name'];
    $Gender = $_POST['gender'];
    $Email = $_POST['email'];
    $Address = $_POST['Address'];
    $Contact = $_POST['Contact'];
    $Password = $_POST['Password'];

    $con = mysqli_connect('localhost', 'root', '', 'Registration') or die(mysqli_error($con));

   

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
        echo  '<script> alert("Connection Failed "); </script>';	
      } else{

        $ins = "INSERT INTO Register(cv,Full_Name,Gender,Email,Address,Contact,Password) VALUES ('$cv','$Full_Name','$Gender','$Email','$Address','$Contact','$Password')";

        if ($con->query($ins) === TRUE) {
            echo  '<script> alert(" New record created successfully "); </script>';
        echo "New record created successfully";
      } else {
        echo "Error: " . $ins . "<br>" . $con->error;
          echo  '<script> alert("Insertion Failed "); </script>';	
      }

      $con->close();


      }

    }
?>


</body>


</html>

