<?php
	include('../../database.php');
	
		$v_proc = $_REQUEST['proc'];
	
		switch($v_proc){
			case "add":
			$v_id_daerah = $_POST['id_daerah'];
			$v_nama_daerah = $_POST['nama_daerah'];///
			
			$sql = $db->prepare("INSERT INTO daerah (id_daerah, nama_daerah) VALUES (:id_daerahParam, :nama_daerahParam)");
			
			$sql->bindParam(':id_daerahParam', $v_id_daerah);
			$sql->bindParam(':nama_daerahParam', $v_nama_daerah);
			$sql->execute();
			
				echo"
					<script>
						alert('Upload Succes');
						window.location.href='../index.php?p=index_daerah';
					</script>
				";
			
			break;
			
			case "edit":
				$v_id_daerah = $_POST['id_daerah'];
				$v_id_daerah_ubah = $_POST['id_daerah_ubah'];
				$v_nama_daerah = $_POST['nama_daerah'];

				$sql = $db->prepare("UPDATE daerah SET id_daerah = :id_daerah_ubahParam, nama_daerah = :nama_daerahParam WHERE id_daerah = :id_daerah");
				
				$sql->bindParam(':id_daerah', $v_id_daerah);
				$sql->bindParam(':id_daerah_ubahParam', $v_id_daerah_ubah);
				$sql->bindParam(':nama_daerahParam', $v_nama_daerah);
				
				$sql->execute();
				
				echo"
					<script>
					alert('Edit Success');
						window.location.href='../index.php?p=index_daerah';
					</script>
				";
			break;
			
			case "delete":
				$idParam = base64_decode(@$_GET['id']);
				
				$sql = $db->prepare("DELETE FROM daerah WHERE id_daerah = :id_daerah");
				$sql->bindParam(':id_daerah', $idParam);
				
				$sql->execute();
				
				echo"
					<script>
						window.location.href='../index.php?p=index_daerah';
					</script>
				";
			break;
		}