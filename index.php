	<?php
	require_once("master_header.php");
	include_once("connect.inc.php");
	?>
	
		<h2>Select Products</h2>
<?php
	if(isset($_GET["categoryname"]))
	{
	$categoryname=$_GET["categoryname"];

	$q="select * from products where category='".$categoryname."'";

	}
	else
	{
		$q="select * from products";
	}
		$r=mysql_query($q);
				while($f=mysql_fetch_array($r))
				{
					echo "<div id='items' style='height:175px; width:175px; border:0; margin:5px;padding:5px; position:relative; float:left; text-align:center;'>";
					$itemno = $f["itemno"];
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='showdetails.php?itemno=$itemno'><img src='uploadedfiles\\$f[image]' height=100 width=100></a>";	
					echo "<br>".$f["itemname"]."<br><b><div id='container' class = 'rupee'><span>Rs.</span> ".$f["price"].".00</div></b><br>";
					echo "<a class ='button' href='addtocart.php?itemno=$itemno'>Add to cart </a>";
					echo "</div>";

				}
	
	?>
	<?php
	require_once("master_footer.php");
	?>

