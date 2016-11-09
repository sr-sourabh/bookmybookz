<?php
include 'connect.inc.php';
include 'core.inc.php';


if(isset($_SESSION['username']  ))
{
	
	$search=( $_SESSION['username']);
	echo $search;
	
	if(!empty($search))
	{
		$query = "select * from books where userbook like '$search%'";
		
		if($query_run = mysqli_query($conn,$query))
		{
			$query_num_rows = mysqli_num_rows($query_run);
			
			
		}
		
	}
	
	
}









?>


<html> 
  <head> 
	<title>My Books</title>
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
					
					
					<?php
						if(@$query_num_rows==0)
						{   ?>
							<div class="sub1">
								Sorry ! No Records Match 
							</div>	
					<?php	
						}
					?>
					
					
					
					<?php
					
					
					
					
					while(@$row=mysqli_fetch_assoc($query_run))
					{ ?>
				
						
						<a href="editbook.php?c=<?php echo $row['bookname'];?>">
							<div class= "sub1">
							
								<div class="sub1_image">
									<img src="uploadedimages/<?php echo $row['imagename'];?>" height="80%" width="70%">
								</div>
								
								<div class="sub1_info">
									<p ><?php echo $row['bookname'];?></p>
									
									<p ><?php echo $row['tag'];?></p>
									<p ><?php echo $row['city'];?></p><br><br>
									<p ><?php echo $row['date'];?></p>
									
								</div>
								
								<div class="sub1_price">
									Rs.<?php echo $row['price'];?>
								</div>
							
							</div>
						</a>
							
						<?php
						} ?>
					
					
			
			</article>
			
			
			<footer id= "top_footer">
				<center><strong>Copyright @2016</strong></center>
			</footer>
	 
  </body> 
</html>