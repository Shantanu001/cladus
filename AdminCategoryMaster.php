	<?php
	require_once("master_header.php");
	include_once("connect.inc.php");

if(isset($_POST["add"]))
{
	$categoryname = $_POST["txtCategory"];

	$query="insert into category values ('','".$categoryname."')";
	
	if(mysql_query($query))
	{
//	echo $query;
	echo "Category created...!!";
	}
	else
	{
		echo mysql_error();
	}
}


	?>
<h1>Welcome Administrator</h1>

Please fill in the form below :<br>

<FORM METHOD=POST ACTION="">
Enter the name of the category : <INPUT TYPE="text" NAME="txtCategory"><BR>
<INPUT TYPE="submit" value="submit" name="add">
</FORM>

<?php
	require_once("master_footer.php");
	?>

