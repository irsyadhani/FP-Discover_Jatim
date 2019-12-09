<?php
	include('../../database.php');
	
		$v_proc = $_REQUEST['proc'];
	
		switch($v_proc){
			case "add":
			$v_id_kategori = $_POST['id_kategori'];
			$v_nama_kategori = $_POST['nama_kategori'];
			
			$sql = $db->prepare("INSERT INTO kategori (id_kategori, nama_kategori) VALUES (:id_kategoriParam, :nama_kategoriParam)");
			
			$sql->bindParam(':id_kategoriParam', $v_id_kategori);
			$sql->bindParam(':nama_kategoriParam', $v_nama_kategori);
			$sql->execute();
			
				echo"
					<script>
						alert('Upload Succes');
						window.location.href='../index.php?p=index_kategori';
					</script>
				";
			
			break;
			
			case "edit":
				$v_id_kategori = $_POST['id_kategori'];
				$v_id_kategori_ubah = $_POST['id_kategori_ubah'];
				$v_nama_kategori = $_POST['nama_kategori'];

				$sql = $db->prepare("UPDATE kategori SET id_kategori = :id_kategori_ubahParam, nama_kategori = :nama_kategoriParam WHERE id_kategori = :id_kategori");
				
				$sql->bindParam(':id_kategori', $v_id_kategori);
				$sql->bindParam(':id_kategori_ubahParam', $v_id_kategori_ubah);
				$sql->bindParam(':nama_kategoriParam', $v_nama_kategori);
				
				$sql->execute();
				
				echo"
					<script>
					alert('Edit Success');
						window.location.href='../index.php?p=index_kategori';
					</script>
				";
			break;
			
			case "delete":
				$idParam = base64_decode(@$_GET['id']);
				
				$sql = $db->prepare("DELETE FROM kategori WHERE id_kategori = :id_kategori");
				$sql->bindParam(':id_kategori', $idParam);
				
				$sql->execute();
				
				echo"
					<script>
						window.location.href='../index.php?p=index_kategori';
					</script>
				";
			break;
		}