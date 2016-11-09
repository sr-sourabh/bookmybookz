<?php
include 'connect.inc.php';
include 'core.inc.php';

$name=( $_SESSION['username']);
echo "WELCOME ".$name;




if(isset($_SESSION['username']  )&&isset($_GET['c']))
{
	
	$search=( $_SESSION['username']);
	$c=$_GET['c'];
	
	
	
	if(!empty($search))
	{
		$query = "select * from books where userbook like '$search$c' ";
		
		if($query_run = mysqli_query($conn,$query))
		{
			//echo $c;
			$query_num_rows = mysqli_num_rows($query_run);
			@$row=mysqli_fetch_assoc($query_run);
			$_SESSION['userbook']=$row['userbook'];
			header('location: editbook.html')
			
			
		}
		
	}
	
	
}

?>