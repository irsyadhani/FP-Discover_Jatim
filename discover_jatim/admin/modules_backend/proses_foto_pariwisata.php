<?php
	include('../../database.php');
	
		$v_proc = $_REQUEST['proc'];
	
		switch($v_proc){
			case "add":
			$v_id_foto = $_POST['id_foto'];
			$v_id_pariwisata = $_POST['id_pariwisata'];
			$v_foto_pariwisata = $_FILES['foto_pariwisata']['name'];
			$tmp = $_FILES['foto_pariwisata']['tmp_name'];
			$type = $_FILES['foto_pariwisata']['type'] = ("png" && "jpg" && "jpeg" && "gif");
			move_uploaded_file($tmp, "../../resources/images/foto pariwisata/".$v_foto_pariwisata);

			$sql = $db->prepare("INSERT INTO foto_pariwisata (id_foto, id_pariwisata, foto_pariwisata) VALUES (:id_fotoParam, :id_pariwasataParam, :foto_pariwisataParam)");
			
			$sql->bindParam(':id_fotoParam', $v_id_foto);
			$sql->bindParam(':id_pariwasataParam', $v_id_pariwisata);
			$sql->bindParam(':foto_pariwisataParam', $v_foto_pariwisata);

			$sql->execute();
			
				echo"
					<script>
						alert('Upload Succes');
						window.location.href='../index.php?p=index_foto_pariwisata';
					</script>
				";
			
			break;
			
			case "edit":
				$v_id_foto = $_POST['id_foto'];
				$v_id_foto_ubah = $_POST['id_foto_ubah'];
				$v_id_pariwisata = $_POST['id_pariwisata'];
				$v_tmp = $_FILES['foto_pariwisata']['tmp_name'];
				
				$sqlPicture = "";
				if($_FILES['foto_pariwisata']['name'] != ''){
					$v_foto_pariwisata = $_FILES['foto_pariwisata']['name'];
					$v_type = $_FILES['foto_pariwisata']['type'] = ("jpg" && "png" && "jpeg" && "gif");
					move_uploaded_file($v_tmp, "../../resources/images/foto pariwisata/".$v_foto_pariwisata);
					
					$sqlPicture = ", foto_pariwisata = :foto_pariwisataParam";
				}
				
				$sql = $db->prepare("UPDATE foto_pariwisata SET id_foto = :id_foto_ubahParam, id_pariwisata = :id_pariwisataParam$sqlPicture WHERE id_foto = :id_foto");
				
				$sql->bindParam(':id_foto', $v_id_foto);
				$sql->bindParam(':id_foto_ubahParam', $v_id_foto_ubah);
				$sql->bindParam(':id_pariwisataParam', $v_id_pariwisata);

				if($_FILES['foto_pariwisata']['name'] !=""){
					$sql->bindParam(':foto_pariwisataParam', $v_foto_pariwisata);
				}
				
				$sql->execute();
				
				echo"
					<script>
					alert('Edit Success');
						window.location.href='../index.php?p=index_foto_pariwisata';
					</script>
				";
			break;
			
			case "delete":
				$idParam = base64_decode(@$_GET['id']);
				
				$sql = $db->prepare("DELETE FROM foto_pariwisata WHERE id_foto = :id_foto");
				$sql->bindParam(':id_foto', $idParam);
				
				$sql->execute();
				
				echo"
					<script>
						window.location.href='../index.php?p=index_foto_pariwisata';
					</script>
				";
			break;
		}