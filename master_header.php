<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
error_reporting(0);
include_once("connect.inc.php");
?>
<HTML>
<HEAD>
<title>Online Shopping</title>
<link rel="stylesheet" type="text/css" href="styles.css">
<link rel="stylesheet" type="text/css" href="menu_assets\styles.css">
<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="engine1/style.css" media="screen" />
	<style type="text/css">a#vlb{display:none}</style>
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->
</HEAD>

<BODY>
       
<div id="pagewrap">
     <div class="header_wrapper">
                <div class="logo">
           
                    <span>CLADUS</span>
                </div>
                <div class="tagline">
                    <span>where fashion lies</span>
                </div>
        </div>
	<header>
		 <IMG SRC="img/img1.jpg" WIDTH="1170" HEIGHT="300" BORDER=0 ALT=""> 
	</header>
	<div id="menu">
	<div id='cssmenu'>
		<ul>
		   <li>
		   <?php
		   session_start();
		   if(isset($_SESSION["utype"]))
		   {
			   if($_SESSION["utype"]=='U')
			   {
			   ?>
			 <a href="index.php"><span><?php echo $_SESSION["cname"];?>'s Home</span></a>	
				   <?php
			   }
			   else if($_SESSION["utype"]=='A')
			   {
				?>
			 <a href="adminhome.php"><span>Admin Home</span></a>	
				   <?php
			   }
			  

		   }
		   else
		   {
			?>
		    <a href="index.php"><span>Home</span></a>
				<?php
		   }
			?>
		  
		   
		   
		   
		   </li>
		   <li><a href="index.php"><span>Products</span></a></li>
		   <li>
		   <?php
		   session_start();
		   if(isset($_SESSION["uname"]))
		   {
			   ?>
			<a href="logout.php"><span>Logout</span>		
				   <?php
		   }
		   else
		   {
			?>
		   <a href="login.php"><span>Login</span>
				<?php
		   }
			?>
		   
		   
		   </a></li>
		   <li><a href="cart.php"><span>MyOrders</span></a></li>
		   
		     <li class='has_sub'><a href="customarcare.php"><span>Customer care</span></a>
		      <ul>
			      <li><a href='#'><span>Return</span></a></li>
				  <li><a href='#'><span>cancel</span></a></li>
				  <li><a href='#'><span>offers</span></a></li>
			  </ul>  
			 </li>

		</ul>
		</div>
	</div>	
	<section id="content">
		<h2>Category </h2>
		<?php
		$q="select * from category";

				$r=mysql_query($q);
				while($f=mysql_fetch_array($r))
				{
				$categoryid = $f["categoryid"];
				$categoryname= $f["categoryname"];
				echo "<a href='index.php?categoryname=".$categoryname."'>".$categoryname."</a><br>";
				}
				?>
	</section>
	
	<section id="middle">
		
	