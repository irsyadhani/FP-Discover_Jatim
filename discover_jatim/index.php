<?php include("modules_frontend/header.php");?>


	<?php
		if(@$_GET ['p'] !=""){
			include ("modules_frontend/".$_GET['p'].".php");
		}else{
			include ("modules_frontend/home.php");
		}
	?>
	<!--id id katgeori nama merk jenis desk gambar size harga -->
<?php include("modules_frontend/footer.php");?>	