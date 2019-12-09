<?php include ("modules_backend/"."header.php");?>
	<?php
		if(@$_GET ['p'] !=""){
			include ("modules_backend/".$_GET['p'].".php");
		}else{
			include ("modules_backend/"."home.php");
		}
	?>