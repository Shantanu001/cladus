	<?php
	require_once("master_header.php");
	include_once("connect.inc.php");

	if(isset($_POST['txtCourierName']))
	{
		$deliverydetails="Return intiated".", ".$_POST['txtCourierName'].", ".$_POST['txtTrackingId'].", ".$_POST['txtDeliveryDate'];
		echo $deliverydetails;

		$q="update cart set processed = '".$deliverydetails."' where billno ='".$_GET['billno']."'";

	$r=mysql_query($q);

	header("location:cart.php");

	}
	?>
	
		<h2>Welcome <?php echo $_SESSION["cname"];?> : Return order with bill no <?php echo $_GET['billno'];?> </h2>
		<h3>Order Details :</h3>

<?php

	$q="select * from cart where billno ='".$_GET['billno']."'";

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

				$q2="select * from members where mid=".$f['mid']."";
						$r2=mysql_query($q2);
				while($f2=mysql_fetch_array($r2))
				{
					$mname=$f2['mname'];
					$address=$mname.", ".$f2['mstreet'].", ".$f2['mcity'].", ".$f2['mstate'].", ".$f2['mpin'].", ".$f2['mcountry']."<br>".$f2['mmob_no1']."<br>".$f2['mmob_no2']."<br>".$f2['memail'];
				}
					echo "<tr><td>".$f['billno']."<br>".$address."</td><td> <img src='uploadedfiles\\$pimage' height=40 width=40><br>".$itemname." </td><td>".$f['rate']."</td><td>".$f['qty']."</td><td>".$f['amount']."</td><td>".$f['date']."</td><td>".$f['paymentmode']."</td><td>".$f['processed']."</td></tr>";


				}
?>
</table >

	<br>
<h3>Please give the Return Reason </h3>	
	<FORM METHOD=POST ACTION="">
<TABLE>
<TR>
	<TD>Return Reason </TD>
	<TD>?</TD>
	<TD><INPUT TYPE="text" NAME="txtCourierName"></TD>
</TR>
<TR>
	<TD>Price at other site</TD>
	<TD>?</TD>
	<TD><INPUT TYPE="text" NAME="txtTrackingId"></TD>
</TR>
<TR>
	<TD>Customer Representative Mistake </TD>
	<TD>?</TD>
	<TD><INPUT TYPE="text" NAME="txtDeliveryDate"></TD>
</TR>
<TR>
	<TD colspan="3"><INPUT TYPE="submit"></TD>
	
</TR>
</TABLE>
</FORM>
	<?php
	require_once("master_footer.php");
	?>

