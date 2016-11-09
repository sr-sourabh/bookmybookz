<?php
include 'connect.inc.php';
include 'core.inc.php';
if(loggedin())
{
	
}
else
	{
		
		header('location: home.php');
	}
?>

<html> 
  <head> 
	<title>Bookmybookz</title>
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
					
					<div class= "sub">
					
					<div id="top_sub">
					
						<div class ="sub_menu">
							<a class="one1" href="logout.php"> Log Out </a>
						</div>
						
						<div class ="sub_menu">
							<a class="one1" href="mybooks.php"> My Books </a>
						</div>
					
						<div class ="sub_menu">
							<a class="one1" href="addbook.php"> Submit Ad</a>
						</div>
						
						
					</div>
						
						<center><p style="font-size:250%; opacity:0.73;">CATEGORIES</p></p></center>
						<div class="cat">
							<center>
							<a  class = "cate" href="search.php?search=fiction"> FICTION </a>
							<a  class = "cate" href="search.php?search=maths"> MATHS </a>
							<a  class = "cate" href="search.php?search=engineering"> ENGG. </a>
							<a  class = "cate" href="search.php?search=commerce"> COMMERCE </a>
							<a  class = "cate" href="search.php?search=law"> LAW </a>
							</center>

							
						</div><br><br><br>
						
					</div>
			
			</article>
			
			
			<footer id= "top_footer">
				<center><strong>Copyright @2016</strong></center>
			</footer>
	 
  </body> 
</html>