<?php
	require_once("master_header.php");
	include_once("connect.inc.php");



if(isset($_POST["add"]))
{

	if (isset($_FILES['image']['name']))
  {
		echo "uploading....";
	  $mid=$_POST["txtItemid"];
    $saveto = "$mid.jpg";
	$fname=$saveto;
		$saveto="uploadedfiles\\".$saveto;

    move_uploaded_file($_FILES['image']['tmp_name'], $saveto);
//	$saveto="uploadedfiles\\".$saveto;
	echo "---------------------------".$saveto;
    $typeok = TRUE;

    switch($_FILES['image']['type'])
    {
      case "image/gif":   $src = imagecreatefromgif($saveto); break;
      case "image/jpeg":  // Both regular and progressive jpegs
      case "image/pjpeg": $src = imagecreatefromjpeg($saveto); break;
      case "image/png":   $src = imagecreatefrompng($saveto); break;
      default:            $typeok = FALSE; break;
    }

    if ($typeok)
    {
      list($w, $h) = getimagesize($saveto);

      $max = 100;
      $tw  = $w;
      $th  = $h;

      if ($w > $h && $max < $w)
      {
        $th = $max / $w * $h;
        $tw = $max;
      }
      elseif ($h > $w && $max < $h)
      {
        $tw = $max / $h * $w;
        $th = $max;
      }
      elseif ($max < $w)
      {
        $tw = $th = $max;
      }

      $tmp = imagecreatetruecolor($tw, $th);
      imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h);
      imageconvolution($tmp, array(array(-1, -1, -1),
        array(-1, 16, -1), array(-1, -1, -1)), 8, 0);
      imagejpeg($tmp, $saveto);
      imagedestroy($tmp);
      imagedestroy($src);
    }
  }

    $itemid=$_POST["txtItemid"];
	$itemname =$_POST["txtItemName"];
	$description =$_POST["txtDescription"];
	$price =$_POST["txtPrice"];
	$qty=$_POST["txtQty"];
	$categoryname = $_POST["txtCategory"];
	
	$query="insert into products values (".$itemid.",'".$itemname."','".$description."',".$price.",".$qty.",'".$categoryname."','".$fname."')";
	
	if(mysql_query($query))
	{
//	echo $query;
	echo "Producted successfully inserted...!!";
	}
	else
	{
		echo mysql_error();
	}
}
else
{

	$itemid=0;
	$q="select * from products";
	$r=mysql_query($q);
				while($f=mysql_fetch_array($r))
				{
					if($f['itemno']>$itemid)
					{
						$itemid=$f['itemno'];
					}
				}
				$itemid++;
}

				




	?>
<h1>Welcome Administrator : Product Master </h1>

Please fill in the form below :<br>

<FORM METHOD=POST ACTION="" enctype='multipart/form-data'>


<TABLE cellpadding="10">
<TR>
	<TD>Item id</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="txtItemid" value="<?php echo $itemid; ?>" readonly="true"> </TD>
</TR>
<TR>
	<TD>Item Name</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="txtItemName"></TD>
</TR>
<TR>
	<TD>Description</TD>
	<TD>:</TD>
	<TD><TEXTAREA NAME="txtDescription" ROWS="5" COLS="20" onfocus="this.value=''">Enter Description</TEXTAREA></TD>
</TR>
<TR>
	<TD>Price</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="txtPrice"></TD>
</TR>
<TR>
	<TD>Quantity</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="txtQty"></TD>
</TR>
<TR>
	<TD>Category</TD>
	<TD>:</TD>
	<TD>
	
	<SELECT NAME="txtCategory">
	<?php

	$q="select * from category";
	$r=mysql_query($q);
				while($f=mysql_fetch_array($r))
				{
			
				echo "<option value= '".$f['categoryname']."'>".$f['categoryname']."</option>" ;
				}

				

	?>
	
	</SELECT></TD>
</TR>
<TR>
	<TD>Image</TD>
	<TD>:</TD>
	<TD><input type='file' name='image' size='14'></TD>
</TR>
<TR>
	<TD colspan="3"><INPUT TYPE="submit" value="submit" name="add"></TD>
</TR>
</TABLE>


</FORM>

<?php
	require_once("master_footer.php");
	?>