<?php

require_once("master_header.php");

?>

<?php
include_once('connect.inc.php');
$mid=0;
$mname="";
$mdistrict="";
$mstreet="";
$mcity="";
$mstate="";
$mpin="";
$mcountry="";
$dob="";
$mmob_no2="";
$mmob_no1="";
$memail="";
$howdidyoufindus="";
$username="";
$password="";

if(isset($_POST['add']))
{
 $mid=$_POST['mid'];
$mname=$_POST['mname'];
$mdistrict=$_POST['mdistrict'];
$mstreet=$_POST['mstreet'];
$mcity=$_POST['mcity'];
$mstate=$_POST['mstate'];
$mpin=$_POST['mpin'];
$mcountry=$_POST['mcountry'];
$dob=$_POST['dob'];
$mmob_no2=$_POST['mmob_no2'];
$mmob_no1=$_POST['mmob_no1'];
$memail=$_POST['memail'];
$username=$_POST['username'];
$password=$_POST['password'];
$howdidyoufindus=$_POST['howdidyoufindus'];
 
if(mysql_query("insert into members (mid,mname,mdistrict,mstreet,mcity,mstate,mpin,mcountry,dob,mmob_no1,mmob_no2,memail,username, password, howdidyoufindus, usertype)VALUES ('$mid','$mname','$mdistrict','$mstreet','$mcity','$mstate','$mpin','$mcountry','$dob','$mmob_no1','$mmob_no2','$memail','$username','$password','$howdidyoufindus','U')"))
	{
	echo "<CENTER><h3><IMG SRC='img/1.jpg' WIDTH='50' HEIGHT='50' BORDER=0 >Registration successful.</h3><br> Please Note your registration No. is $mid. <br>you may print this form by pressing (ctrl+p)</CENTER>";
	
	}
	else
	{
		
		echo "<IMG SRC='img/2.jpg' WIDTH='50' HEIGHT='50' BORDER=0 > Username Already Exists, Please give another username";
	}
}

?>
<?php
if(!isset($_GET["mid"]))
{
$query=mysql_query("select * from members");
while ($result=mysql_fetch_array($query))
	{
if($result['mid'] > $mid)
	$mid=$result['mid'];
	}
	if($mid==0)
	{
		$mid=1001;
	}
	else
	{
$mid++;	
	}
}
?>

<html>
<h3>Registration FORM</h3>
<FORM METHOD=POST ACTION="" enctype='multipart/form-data'>
<TABLE cellpadding="7px" >
<TR>
	<TD></TD>
	<TD></TD>
	<TD><INPUT TYPE="hidden" NAME="mid" id="" value="<?php echo $mid; ?>"></TD>
</TR>
<TR>
	
<TR>
	<TD>Name</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="mname" id="" value=""></TD>
</TR>
<TR>
	<TD>Street/Mohalla/Road</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="mstreet" id="" value=""></TD>
</TR>
<TR>
	<TD>City</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="mcity" id="" value="Muzaffarpur"></TD>
</TR>
<TR>
	<TD>District</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="mdistrict"></TD>
</TR>

<TR>
	<TD>State</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="mstate"id="" value="Bihar"></TD>
</TR>
<TR>
	<TD>Pin</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="mpin" id="" value=""></TD>
</TR>
<TR>
	<TD>Country</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="mcountry" id="" value="India"></TD>
</TR>
<TR>
	<TD>Date of Birth</TD>
	<TD>:</TD>
	<TD>
		<INPUT TYPE="text" NAME="dob" value='dd-mm-yyyy' onfocus="this.value=''">
	</TD>

	
</TR>
<TR>
	<TD>Mobile No. 1</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="mmob_no1" id="" value=""></TD>
</TR>
<TR>
	<TD>Mobile No. 2</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="mmob_no2" id="" value=""></TD>
</TR>
<TR>
	<TD>Email Address</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="memail" id="" value=""></TD>
</TR>
<TR>
	<TD>User Name</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="username" id="" value=""></TD>
</TR>
<TR>
	<TD>Password</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="password" NAME="password" id="" value=""></TD>
</TR>
<TR>
	<TD>How did you find us?</TD>
	<TD>:</TD>
	<TD>
	<SELECT NAME="howdidyoufindus"> 
	<option>- Select How did you find us? -</option>
	<option VALUE="Poster">Poster</option>
	<option VALUE="Handbill">Handbill</option>
	<option VALUE="Board">Board</option>
	<option VALUE="Friend">Friend</option>
	<option VALUE="Teacher">Some Teacher</option>
	<option VALUE="online_Add">Online Add</option>
	<option VALUE="Google">Google Search</option>
	<option VALUE="direct">Direct Office visit</option>
	<option VALUE="other">Other</option>
	</SELECT></TD>
	
</TR>

<TR>
	<TD><INPUT TYPE="submit" NAME="add" VALUE="Submit"> &nbsp;&nbsp;&nbsp; <a href="login.php">Login</a></TD>
</TR>
</TABLE>
</FORM>
<?php

require_once("master_footer.php");

?>