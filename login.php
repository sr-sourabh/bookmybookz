<?php
include 'connect.inc.php';
include 'core.inc.php';
$_SESSION['signinmsg']="";

	if(isset($_POST['username']) && isset($_POST['password']) )
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		if(!empty($username)&&!empty($password))
		{
		$query = "select id from username where username='$username' and password='$password'";
			if($query_run = mysqli_query($conn,$query))
			{
				$query_num_rows = mysqli_num_rows($query_run);
					if($query_num_rows==0)
						$_SESSION['signinmsg']= " Invalid Password Or User";
					else
					{
						 $id=mysqli_fetch_row($query_run);
						 $_SESSION['id']=$id;
						 $_SESSION['username']=$username;
						 
						 header('location: index.php');
					}
						
			}
		}
		
	}

?>







<html> 
  <head> 
	<title>Log In</title>
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
					
					
					<form class="modal-content animate" action="login.php" method="post">
					<br>
					<h2>LOGIN</h2><br><br>


					<label><b>USERNAME</b></label>
					<input placeholder="Enter Unique Username" name="username" required="" type="text">

					<label><b>PASSWORD</b></label>
					<input placeholder="Enter Password" name="password" required="" type="password">

					<button type="submit">LOGIN</button>
					<p style="color:red;"><strong><?php echo $_SESSION["signinmsg"];?></strong></p><br>
					</form>
			
			</article>
			
			
			<footer id= "top_footer">
				<center><strong>Copyright @2016</strong></center>
			</footer>
	 
  </body> 
</html>