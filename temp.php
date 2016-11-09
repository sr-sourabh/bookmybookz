<style>
	#d{
		margin:0px;
	}
	#b{
		margin:5px;
		opacity:0.73;
		height:5%;
		width:6%;
		border: none;
		border-radius:15px;
	box-shadow:rgba(110,110,110, .6) 5px 5px 5px;
	background:#ebcba1;
		
	}
	#b:hover{
		background:black;
		color:white;
	}
	
	</style>
<html>

	<head>
	
	<title>  </title>
	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="style.css">
	</head>
	
	<body >
		<div id="wrapper">
		
			<header id= "top_header">
				
			</header>
			
			
			<nav id= "top_menu">	
				
				<ul id= "main_ul">
					<li ><a href="index.php" >Home</a></li>
					
					<li style="float:right"><a href="about.php" class="main_menu" >About</a></li>
					<li style="float:right"><a href="contact.php" class="main_menu">Contact</a></li>
				</ul>
			
			</nav>
			
			
			<img src="headimg.jpg" height="30%" width="100%" style="opacity:0.73;">
			
			
			<article id= "top_article">
				
				<center>
						<form action="search.php" method="get" >
							<input type="text" name="search" placeholder="Search.." id="d" >
							<input type="submit" value="GO" id="b">
						</form>
				</center>	
			
			</article>
			
			
			<footer id= "top_footer">
				
			</footer>
			
		</div>
	
	</body>

</html>