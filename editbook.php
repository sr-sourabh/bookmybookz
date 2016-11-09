<?php
include 'connect.inc.php';
include 'core.inc.php';
@$temp=$_SESSION['temp'];
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




if(isset($_SESSION['username']  )&&isset($_GET['c']))
{
	
	$search=( $_SESSION['username']);
	$c=$_GET['c'];
	
	
	
	if(!empty($search))
	{
		$query = "select * from books where userbook = '$search$c' ";
		
		if($query_run = mysqli_query($conn,$query))
		{
			//echo $c;
			$query_num_rows = mysqli_num_rows($query_run);
			@$row=mysqli_fetch_assoc($query_run);
			$_SESSION['temp']=$row['userbook'];
			
				
			
			
			
		}
		
	}
	
	
}

$_SESSION['addbookmsg']="la";

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
		
		
		
	
		
		
		
		
		if(!empty($bookname)&&!empty($tag)&&!empty($author)&&!empty($city)&&!empty($price)&&!empty($phone)&&!empty($desc)&& $upload)
		{
			
				$query2= "delete from books where userbook = '$temp' ";
				$queryrun2 =mysqli_query($conn,$query2);
				$query = "insert into books values('','$name$bookname','$bookname','$author','$price','$desc','$tag','$phone','$city','$filename','$date')";
				
				if($query_run = mysqli_query($conn,$query))
				{
					$_SESSION['addbookmsg']="Book Updated Successfully";
					header('location: mybooks.php');
					
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
	<title>Edit Book</title>
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
					
					<p>
							<center><p style="font-size:20px">Add a Book and Get Started!</p></center>
							<form class="modal-content animate" autocomplete="off"  action="editbook.php" method="POST" enctype="multipart/form-data">

								<br>
								<h2> ADD A BOOK</h2><br><br>

								 <label><b>NAME OF BOOK</b></label>
									 <input value="<?php echo $row['bookname'];?> " name="bookname" required="" type="text">


								 <label><b>AUTHOR</b></label>
									  <input value="<?php echo $row['author'];?> " name="author" required="" type="text">

								 <label><b>PRICE</b></label>
									  <input value="<?php echo $row['price'];?>" name="price" required="" type="text">

								 <label><b>DESCRIPTION</b></label>
									  <input value="<?php echo $row['des'];?>" name="desc" required="" type="text">
									  
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
									  <input value="<?php echo $row['city'];?>" name="city" required="" type="text">

								
								<label><b>CONTACT NUMBER</b></label>
									  <input value="<?php echo $row['phone'];?>" name="phone" required="" type="text">

								<button type="submit">SUBMIT</button>
								<p style="color:red;"><strong><?php echo $_SESSION['addbookmsg']; ?></strong></p>
								<br>

							</form>
		
	    
						</p>
					
			
			</article>
			
			
			<footer id= "top_footer">
				<center><strong>Copyright @2016</strong></center>
			</footer>
	 
  </body> 
</html>