<?php
	require_once("master_header.php");
	include_once("connect.inc.php");
	?>
	
		<h2>Product Details </h2>
<?php
	if(isset($_GET["itemno"]))
	{
	$itemno=$_GET["itemno"];

	$q="select * from products where itemno='".$itemno."'";
	$r=mysql_query($q);
				while($f=mysql_fetch_array($r))
				{
					echo "<div id='items' style='height:600px; width:500px; border:0; margin:5px;padding:5px; position:relative; float:left; text-align:center;'>";
					$itemno = $f["itemno"];
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='showdetails.php?itemno=$itemno'><img src='uploadedfiles\\$f[image]' height=400 width=400></a>";	
					echo "<br>".$f["itemname"]."<br><b><div id='container' class = 'rupee'><span>Rs.</span> ".$f["price"].".00</div></b>";
					echo $f["description"]."<br><br>";
					echo "<a class ='button' href='addtocart.php?itemno=$itemno'>Add to cart </a>";
					echo "<br><br><a href ='index.php'>Back to Home</a>";
					echo "</div>";
	}
	}
?>

	<?php
	require_once("master_footer.php");
	?>

