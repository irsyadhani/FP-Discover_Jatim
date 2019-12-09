
<?php
	session_start();
		unset($_SESSION['administrator']);
	echo"
		<script>
		window.location.href='../index.php';
		</script>
		";
?>