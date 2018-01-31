<?php
require_once("master_header.php");
?>
<?php
if(isset($_GET["status"]))
{
$stat=$_GET["status"];
if($stat=="invalid")
{
	echo "<CENTER><IMG SRC='img/2.jpg' WIDTH='50' HEIGHT='50' BORDER=0 >Invalild username or password</CENTER>";
}
else if($stat=="blank")
	{
		echo "<CENTER><IMG SRC='img/2.jpg' WIDTH='50' HEIGHT='50' BORDER=0 > username or password blank</CENTER>";
	}
}
?>
<form name="f1" method="POST" action="phpLogin.php" >
<CENTER><TABLE cellpadding="10px" background="img//login_img.gif" style="background-size:100%;">
<tr>
<td colspan="3">

</td>
</tr>
<tr><td><BR><BR></td><td></td><td></td></tr>
<TR>
<TD>User Name</TD>
<TD>:</TD>
<TD><input type="text" name="user"></TD>
</TR>
<TR>
<TD>Password </TD>
<TD>:</TD>
<TD><input type="password" name="password"></TD>
</TR>
<br>
<TR>
<TD COLSPAN=3><CENTER><input type="submit"value="login"> &nbsp;&nbsp;&nbsp;&nbsp; <a href="registration.php">Sign Up </a></CENTER></TD>
</TR>
</TABLE></CENTER>
</form>

</TABLE></CENTER>
</form>
  <?php
require_once("master_footer.php");
?>