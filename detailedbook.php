<?php
include 'connect.inc.php';
include 'core.inc.php';


if(isset($_GET['c'])  )
{
	
	$c=$_GET['c'];
	
	if(!empty($c))
	{
		$query = "select * from books where id = $c ";
		
		if($query_run = mysqli_query($conn,$query))
		{
			$query_num_rows = mysqli_num_rows($query_run);
			@$row=mysqli_fetch_assoc($query_run);
			
			
		}
		else
		{
			//mysqli_error($conn);
		}
	}
	
	else
	{
		
	}
	
}









?>



<style>

#detailedbook{
	//border: 3px solid #357EC7;
	background:#f3dfc6;
	opacity:0.73;
	width:60%;
	height:70%;
	margin:5% 15%;
	border-radius:20px;
	box-shadow:rgba(110,110,110, .6) 5px 5px 5px;
	padding:5%;
	
}
#detailedbook div{
	font-family: 'Tahoma';
}

#dbimage{
	//border: 3px solid black;
	
	width:30%;
	height:50%;
	margin:0% 5%;
}

#dbname{
	//border: 3px solid black;
	position: relative;
	width:50%;
	height:10%;
	left:40%;
	top:-50%;
	margin:0% 10%;
	font-size:170%;
	
}
#dbauthor{
	//border: 3px solid black;
	position: relative;
	width:50%;
	height:10%;
	
	left:40%;
	top:-50%;
	margin:1% 10%;
	font-size:140%;
}
#dbprice{
	//border: 3px solid black;
	position: relative;
	width:20%;
	height:7.5%;
	left:5%;
	top:-22.5%;
	margin:5% 5%;
	font-size:190%;
	text-align:center;
	font-family: 'Comic Sans MS';
	font-weight:500;
	border-radius:10px;
	box-shadow:rgba(110,110,110, .6) 5px 5px 5px;
	background:#e5e5e5;
}
#dbprice:hover{
	background:#cccccc;
}
#dbinfo{
	//border: 3px solid black;
	position: relative;
	width:50%;
	height:10%;
	left:40%;
	top:-65%;
	margin:2% 10%;
	font-size:140%;
}
#dbdesc{
	//border: 3px solid black;
	position: relative;
	width:70%;
	height:20%;
	top:-30%;
	font-style:italic;
	margin:0% 10%;
	font-size:120%;
}




</style>



<html> 
  <head> 
	<title>Info</title>
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
					
					<div id="detailedbook">
					
						<div id="dbimage">
							<img src="uploadedimages/<?php echo $row['imagename'];?>" height=100% width=100%>
						</div>
						
						<div id="dbname">
							<?php echo $row['bookname'];?>
						</div>
						
						<div id="dbauthor">
							<em><?php echo $row['author'];?></em><br><br>
							<em><?php echo $row['tag'];?></em>
						</div>
						
						<div id="dbprice">
							Rs.<?php echo $row['price'];?>
						</div>
						
						<div id="dbinfo">
							<img src="icons/phone.jpg">&nbsp&nbsp&nbsp<?php echo $row['phone'];?><br>
							<img src="icons/city.jpg">&nbsp&nbsp&nbsp<?php echo $row['city'];?><br>
							<img src="icons/date.jpg" height=40% width=3%>&nbsp&nbsp&nbsp<?php echo $row['date'];?>
						</div>
						
						<div id="dbdesc">
							<?php echo $row['des'];?>
						</div>
						
					
					
					</div>
					
					
					
			
			</article>
			
			
			<footer id= "top_footer">
				<center><strong>Copyright @2016</strong></center>
			</footer>
	 
  </body> 
</html>