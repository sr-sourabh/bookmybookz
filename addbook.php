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
$_SESSION['addbookmsg']="la";

$name=( $_SESSION['username']);
echo "WELCOME ".$name;

	if( isset($_POST['bookname']) && isset($_POST['author']) && isset($_POST['price']) && isset($_POST['desc']) && isset($_POST['tag']) && isset($_POST['city']) && isset($_POST['phone']) )
	{
		
		
		$upload=1;
		
		
		if(($_FILES['file']['name']))
		{
			
			$r1=mt_rand();
			//$r2=mt_rand();
			$filename=$r1.$_FILES['file']['name'];
			//echo $filename;
			$tempname=$_FILES['file']['tmp_name'];
			$location="uploadedimages/";
			$targetlocation=$location.basename($filename);
			$filetype= strtolower(pathinfo($location.$targetlocation,PATHINFO_EXTENSION));
			$filesize=$_FILES["file"]["size"];
			//echo $filetype;
			
			
			if($filetype!='png' &&$filetype!='jpeg'&&$filetype!='jpg')
			{
				$upload=0;
				$_SESSION['addbookmsg']="Image Type Must Be jpeg/jpg/png";
			}
			
			if ( $filesize> 40000) 
			{
				$_SESSION['addbookmsg']= "Sorry, your file is too large. Must be less than 40kb";
				$upload = 0;
			}
			
			//echo $upload;
			
			move_uploaded_file($tempname, $targetlocation);
			
			
		}
		else{
			$filename="default.jpg";
		}
		
		
		$bookname=ucwords($_POST['bookname']);
		$author=ucwords($_POST['author']);
		$desc=ucwords($_POST['desc']);
		$price=ucwords($_POST['price']);
		$city=ucwords($_POST['city']);
		$tag=ucwords($_POST['tag']);
		$phone=ucwords($_POST['phone']);
		$date=date("d.m.Y");
		
		
		
		
		
		
		
		if(!empty($username)&&!empty($tag)&&!empty($author)&&!empty($city)&&!empty($price)&&!empty($phone)&&!empty($desc)&& $upload)
		{
				$query = "insert into books values('','$name$bookname','$bookname','$author','$price','$desc','$tag','$phone','$city','$filename','$date')";
				
				if($query_run = mysqli_query($conn,$query))
				{
					$_SESSION['addbookmsg']="Book Added Successfully";
					
				}
				else
				{
					$_SESSION['addbookmsg']="Error";
					
				}
		}
		
	}
	









?>


<html> 
  <head> 
	<title></title>
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
					
					<div id="profile">

						<p>
							<center><p style="font-size:20px">Add a Book and Get Started!</p></center>
							<form class="modal-content animate" autocomplete="off"  action="addbook.php" method="POST" enctype="multipart/form-data">

								<br>
								<h2> ADD A BOOK</h2><br><br>

								 <label><b>NAME OF BOOK</b></label>
								 <input placeholder="Enter Name" name="bookname" required="" type="text">


								 <label><b>AUTHOR</b></label>
									  <input placeholder="Enter Author" name="author" required="" type="text">

								 <label><b>PRICE</b></label>
									  <input placeholder="Enter Price" name="price" required="" type="text">

								 <label><b>DESCRIPTION</b></label>
									  <input placeholder="Enter Something" name="desc" required="" type="text">
									  
								 <label><b>IMAGE</b>(Not Compulsory)</label><br><br>
									  <input  name="file"  title="dada" type="file"><br><br>
									  
								<label id="tag"><b>TAG</b></label><br><br>
									  <input type="radio" name="tag" value="fiction" required="" >FICTION&nbsp&nbsp
									  <input type="radio" name="tag" value="engineering">ENGINEERING&nbsp&nbsp
									  <input type="radio" name="tag" value="maths">MATHS&nbsp&nbsp
									  <input type="radio" name="tag" value="law">LAW&nbsp&nbsp
									  <input type="radio" name="tag" value="commerce">COMMERCE&nbsp&nbsp
								<br><br>
								<label><b>YOUR CITY</b></label>
									  <input placeholder="Enter Something" name="city" required="" type="text">

								
								<label><b>CONTACT NUMBER</b></label>
									  <input placeholder="Phone" name="phone" required="" type="text">

								<button type="submit">SUBMIT</button>
								<p style="color:red;"><strong><?php echo $_SESSION['addbookmsg']; ?></strong></p>
								<br>

							</form>
		
	    
						</p>
						
					</div>
			
			</article>
			
			
			<footer id= "top_footer">
				<center><strong>Copyright @2016</strong></center>
			</footer>
	 
  </body> 
</html>