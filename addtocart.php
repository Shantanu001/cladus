

<?php
	require_once("master_header.php");
	include_once("connect.inc.php");
$rate=0;
if(isset($_POST["submit"]))
{
	$mid=$_SESSION["mid"];
	$itemno=$_GET["itemno"];
	$rt=$_POST["txtRate"];
	$qty=$_POST["txtQty"];
	$amount=$rt*$qty;
	$date=date("d-M-y");
	$pmode=$_POST["txtPmode"];

	$q2 = "insert into cart values ('',".$mid.",".$itemno.",".$rt.",".$qty.",".$amount.",'".$date."','".$pmode."','NO')";

	if(mysql_query($q2))
	{
	echo "successfully added to cart .... !!";
	}
	else
	{
		echo mysql_error();
	}

}
	
	
	?>
	



<form name ="addtocart" action ="" method="POST">
<?php
if(isset($_SESSION["mid"]))
{
	//add to cart
	$mid=$_SESSION["mid"];
	$itemno = $_GET["itemno"];
	$q1="select * from products where itemno='".$itemno."'";
	$r1=mysql_query($q1);
	while($f=mysql_fetch_array($r1))
	{
		$rate = $f["price"];
	}
?>
<INPUT TYPE="hidden" name="txtRate" value="<?php echo $rate;?>">
	<?php
$q="select * from products where itemno='".$itemno."'";
	$r=mysql_query($q);
				while($f=mysql_fetch_array($r))
				{
					echo "<div id='items' style='height:500px; width:200px; border:0; margin:5px;padding:5px; position:relative; float:left; text-align:center;'>";
					$itemno = $f["itemno"];
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='showdetails.php?itemno=$itemno'><img src='uploadedfiles\\$f[image]' height=200 width=175></a>";	
					echo "<br>".$f["itemname"]."<br><b><div id='container' class = 'rupee'><span>Rs.</span> ".$f["price"].".00</div></b>";
					echo $f["description"]."<br>";
					?>
						Quantity : 
<SELECT NAME="txtQty">
<option value="1">1</option>	
<option value="2">2</option>	
<option value="3">3</option>	
<option value="4">4</option>	
</SELECT>

						<br>
							<br>
Payment Mode : 
<SELECT NAME="txtPmode">
<option value="creditcard">Credit Card</option>	
<option value="debitcard">Debit Card</option>	
<option value="netbanking">Net Banking</option>	
<option value="cash_on_delivery">Cash on Delivery</option>	
</SELECT>


<br>
	<br>
<INPUT TYPE="submit" name ="submit">

	</form>
<?php
					echo "<br><br><a href ='index.php'>Back to Home</a>";


					echo "</div>";
	}




}
else
{
	header("location:login.php");
}
?>



	<?php
	require_once("master_footer.php");
	?>

