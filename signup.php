<?php
include 'connect.inc.php';
include 'core.inc.php';
$_SESSION['signupmsg']="";

	if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_again']) && isset($_POST['username']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$password_again=$_POST['password_again'];
		$email=$_POST['email'];
		
		if(!empty($username)&&!empty($password)&&!empty($password_again)&&!empty($email))
		{
			if($password==$password_again)
			{
				$query = "insert into username values('','$username','$email','$password')";
				
				if($query_run = mysqli_query($conn,$query))
				{
					$_SESSION['signupmsg']="Sign Up Successful";
					
				}
				else
				{
					$_SESSION['signupmsg']="User Already Exists";
					
				}
			}
			else
			{
				$_SESSION['signupmsg']= "The passwords are not matching please try again";
			}
		}
		
		
	
	}
	

?>





<html> 
  <head> 
	<title>Sign Up</title>
    <script src="http://www.w3schools.com/lib/w3data.js"></script>
	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="style.css">
	<link href="ronaldo.jpg" rel="icon" type="image/png" />
  </head> 

  <body> 
     
	 
	 
	 
	 
	 
			<article id= "top_article">
			
				<div w3-include-html="temp.php"></div> 

				<script>
				w3IncludeHTML();
				</script>
			
				<script type="text/javascript">

				  function checkForm(form)
				  {

				if(form.name.value == "") {
					  alert("Error: Name cannot be blank!");
					  form.name.focus();
					  return false;
					}
					if(form.email.value == "") {
					  alert("Error: Email cannot be blank!");
					  form.name.focus();
					  return false;
					}
					
					if(form.password1.value != "" && form.password1.value == form.password2.value) {
					  if(form.password1.value.length < 6) {
						alert("Error: Password must contain at least six characters!");
						form.password1.focus();
						return false;
					  }
					  if(form.password1.value == form.email.value || form.password1.value == form.name.value) {
						alert("Error: Password must be different from Email OR Name!");
						form.pwd1.focus();
						return false;
					  }
					  
					} else {
					  alert("Error: Please check that you've entered and confirmed your password!");
					  form.password1.focus();
					  return false;
					}

					alert("You entered a valid password: " + form.password1.value);
					return true;
				  }

				</script>




				<form class="modal-content animate" autocomplete="off" onsubmit="return checkForm(this)" action="signup.php" method="post">

				<br>
				<h2>REGISTRATION</h2><br><br>

				 <label><b>USERNAME</b></label>
				 <input placeholder="Enter Unique Username" name="username" required="" type="text">


				 <label><b>EMAIL ID</b></label>
					  <input placeholder="Enter Email ID" name="email" required="" type="email">

				 <label><b>PASSWORD</b></label>
					  <input placeholder="Enter Password" name="password" required="" type="password">

				 <label><b>CONFIRM PASSWORD</b></label>
					  <input placeholder="Enter Password" name="password_again" required="" type="password">

				<button type="submit">SIGN UP</button>
				<p style="color:red;"><strong><?php echo $_SESSION["signupmsg"];?></strong></p><br>

				</form>
				
			
			</article>
			
			
			<footer id= "top_footer" >
				<center><strong>Copyright @2016</strong></center>
			</footer>
	 
  </body> 
</html>