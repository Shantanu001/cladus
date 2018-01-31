<?php
error_reporting(0);
$loggedin=0;
require_once("connect.inc.php");

?>
<?php

				$user=$_POST['user'];
				$password=$_POST['password'];
				if($user=="" || $password=="")
				{
					header('Location: login.php?status=blank');
				}
				$q="select * from members where username='".$user."'";
				$r=mysql_query($q);
				if($f=mysql_fetch_array($r))
				{

					if($f['password']==$password)
					{
						$loggedin=1;
						session_start();
						$_SESSION["mid"]=$f['mid'];
						$_SESSION["uname"]=$user;
						$_SESSION["cname"]=$f['mname'];
						$utype=$f["usertype"];
						$_SESSION["utype"]=$f['usertype'];
						if($utype=="A")
						{
							header('Location: adminhome.php');
						}
						else
						{
							header('Location: welcome.php');
						}
						
					}
					

					if($loggedin==0)
					{
					echo "Invalid user id or password ";
					header('Location: login.php?status=invalid');
					}

				}
				else
				{
					echo "Invalid user id or password ";
					header('Location: login.php?status=invalid');
				}
	

	?>
	