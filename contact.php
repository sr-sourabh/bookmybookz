<?php

$_SESSION['contactmsg']="";

if( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['query'])  )
{
	
	
	$_SESSION['contactmsg']="Your Query was Submitted Successfully";
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$query=$_POST['query'];
	@mail("papa@mailinator.com", $email, $query);
}

?>





<html> 
  <head> 
	<title>Contact Us</title>
    <script src="http://www.w3schools.com/lib/w3data.js"></script>
	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="style.css">
	<link href="back.jpg" rel="icon" type="image/jpg" />
  </head> 

  <body> 

	 
	 
	 
	 
	 
			<article id= "top_article">
			
			
			
				    <div w3-include-html="temp.php"></div> 
					<script>
						w3IncludeHTML();
					</script>
					
					
					<form class="modal-content animate" autocomplete="off"  action="contact.php" method="POST" enctype="multipart/form-data">

								<br>
								<h2> SUBMIT YOUR QUERY WITH US</h2><br><br>

								 <label><b>NAME</b></label>
								 <input placeholder="Enter Your Name" name="name" required="" type="text">


								 <label><b>EMAIL</b></label>
									  <input placeholder="Enter Email" name="email" required="" type="email">

								 

								 <label><b>QUERY</b></label>
									  <input placeholder="Enter Your Message" name="query" required="" type="text">
									  
								

								<button type="submit">SUBMIT</button>
								<p style="color:red;"><strong><?php echo $_SESSION['contactmsg']; ?></strong></p>
								<br>

					</form>
					
			
			</article>
			
			
			<footer id= "top_footer">
				<center><strong>Copyright @2016</strong></center>
			</footer>
	 
  </body> 
</html>