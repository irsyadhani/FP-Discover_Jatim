<?php
	include('../../database.php');
	
		$v_proc = $_REQUEST['proc'];
	
		switch($v_proc){
			case "add":
			$v_id_pariwisata = $_POST['id_pariwisata'];
			$v_id_kategori = $_POST['id_kategori'];

			$sql = $db->prepare("INSERT INTO detail_pariwisata (id_pariwisata, id_kategori) VALUES (:id_pariwasataParam, :id_kategoriParam)");
			
			$sql->bindParam(':id_pariwasataParam', $v_id_pariwisata);
			$sql->bindParam(':id_kategoriParam', $v_id_kategori);
			
			$sql->execute();
			
				echo"
					<script>
						alert('Upload Succes');
						window.location.href='../index.php?p=index_detail_pariwisata';
					</script>
				";
			
			break;
			
			case "edit":
				$v_id_pariwisata = $_POST['id_pariwisata'];
				$v_id_pariwisata_ubah = $_POST['id_pariwisata_ubah'];
				$v_id_kategori = $_POST['id_kategori'];
				
				$sql = $db->prepare("UPDATE detail_pariwisata SET id_pariwisata = :id_pariwisata_ubahParam, id_kategori = :id_kategoriParam WHERE id_pariwisata = :id_pariwisata");
				
				$sql->bindParam(':id_pariwisata', $v_id_pariwisata);
				$sql->bindParam(':id_pariwisata_ubahParam', $v_id_pariwisata_ubah);
				$sql->bindParam(':id_kategoriParam', $v_id_kategori);
				
				$sql->execute();
				
				echo"
					<script>
					alert('Edit Success');
						window.location.href='../index.php?p=index_detail_pariwisata';
					</script>
				";
			break;
			
			case "delete":
				$idParam = base64_decode(@$_GET['id']);
				
				$sql = $db->prepare("DELETE FROM detail_pariwisata WHERE id_pariwisata = :id_pariwisata");
				$sql->bindParam(':id_pariwisata', $idParam);
				
				$sql->execute();
				
				echo"
					<script>
						window.location.href='../index.php?p=index_detail_pariwisata';
					</script>
				";
			break;
		}