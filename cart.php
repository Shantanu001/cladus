	<?php
	require_once("master_header.php");
	include_once("connect.inc.php");
	?>
	
		<h2>Welcome <?php echo $_SESSION["cname"];?> : Your orders </h2>

<?php
	if(isset($_SESSION["mid"]))
	{
	$mid=$_SESSION["mid"];

	$q="select * from cart where mid='".$mid."'";

				$r=mysql_query($q);
				?>
<table width="90%" border="1px" style="border-collapse: collapse;">

					<?php
echo "<tr><th>Bill No</th><th>Item </th><th>Rate</th><th>Qty</th><th>Amt.</th><th>Purc. Dt.</th><th>Pmt Mode</th><th>Processed</th></tr>";
				while($f=mysql_fetch_array($r))
				{
						$q1="select * from products where itemno=".$f['itemno']."";
						$r1=mysql_query($q1);
				while($f1=mysql_fetch_array($r1))
				{
					$itemname=$f1['itemname'];
					$pimage=$f1['image'];
				}
					echo "<tr><td>".$f['billno']."</td><td> <img src='uploadedfiles\\$pimage' height=40 width=40><br>".$itemname." </td><td>".$f['rate']."</td><td>".$f['qty']."</td><td>".$f['amount']."</td><td>".$f['date']."</td><td>".$f['paymentmode']."</td><td>".$f['processed']."<br><A HREF='userreturn.php?billno=".$f['billno']."'>Return</A></td></tr>";


				}
?>
</table >

					<?php
				
	}
	else
	{
		echo "Please login first !! <A HREF='login.php'>Login here...</A>";
	}
				
	
	?>
	<?php
	require_once("master_footer.php");
	?>

