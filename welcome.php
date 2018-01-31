	<?php

require_once("master_header.php");
	session_start();
	$cname = $_SESSION["cname"];
	?>
<H1>Welcome : <?php echo $cname; ?></H1>
	
	<?php
	require_once("master_footer.php");
	?>

