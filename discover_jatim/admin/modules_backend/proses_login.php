<?php
	session_start();
	include("../../database.php");
	
	$v_administrator = addslashes($_POST['administrator']);
	$v_password	= addslashes($_POST['password']);
	
	$sql = $db->prepare("SELECT * FROM admin WHERE administrator='$v_administrator' && password='$v_password'");
	$sql->execute();
	$cek = $sql->rowCount();
	
	if($cek > 0){
		$_SESSION['administrator'] = $v_administrator;
		echo "
		<script>
			alert('Login Succes');
			window.location.href='../index.php?p=user';
		</script>
		";
	}else{
		echo "
		<script>
			alert('Login Failed');
			window.location.href='../index.php';
		</script>
		";
	}
?>