<?php
	include('../../database.php');
	
		$v_proc = $_REQUEST['proc'];
	
		switch($v_proc){
			case "add":
			$v_id_review = @$_POST['id_review'];
			$v_id_pengguna = $_POST['id_pengguna'];
			$v_id_pariwisata = $_POST['id_pariwisata'];
			$v_status = $_POST['status'];
			$v_deskripsi_review = $_POST['deskripsi_review'];

			$sql = $db->prepare("INSERT INTO review (id_review, id_pengguna, id_pariwisata, status, deskripsi_review) VALUES (:id_reviewParam, :id_penggunaParam, :id_pariwasataParam, :statusParam, :deskripsi_reviewParam)");
			
			$sql->bindParam(':id_reviewParam', $v_id_review);
			$sql->bindParam(':id_penggunaParam', $v_id_pengguna);
			$sql->bindParam(':id_pariwasataParam', $v_id_pariwisata);
			$sql->bindParam(':statusParam', $v_status);
			$sql->bindParam(':deskripsi_reviewParam', $v_deskripsi_review);

			$sql->execute();
			
				echo"
					<script>
						alert('Upload Succes');
						window.location.href='../index.php?p=index_review';
					</script>
				";
			
			break;
			
			case "edit":
				$v_id_review = $_POST['id_review'];
				$v_id_review_ubah = $_POST['id_review_ubah'];
				$v_id_pengguna = $_POST['id_pengguna'];
				$v_id_pariwisata = $_POST['id_pariwisata'];
				$v_status = $_POST['status'];
				$v_deskripsi_review = $_POST['deskripsi_review'];
				
				$sql = $db->prepare("UPDATE review SET id_review = :id_review_ubahParam, id_pengguna = :id_penggunaParam, id_pariwisata = :id_pariwisataParam, status = :statusParam, deskripsi_review = :deskripsi_reviewParam WHERE id_review = :id_review");
				
				$sql->bindParam(':id_review', $v_id_review);
				$sql->bindParam(':id_review_ubahParam', $v_id_review_ubah);
				$sql->bindParam(':id_penggunaParam', $v_id_pengguna);
				$sql->bindParam(':id_pariwisataParam', $v_id_pariwisata);
				$sql->bindParam(':statusParam', $v_status);
				$sql->bindParam(':deskripsi_reviewParam', $v_deskripsi_review);
				
				$sql->execute();
				
				echo"
					<script>
					alert('Edit Success');
						window.location.href='../index.php?p=index_review';
					</script>
				";
			break;
			
			case "delete":
				$idParam = base64_decode(@$_GET['id']);
				
				$sql = $db->prepare("DELETE FROM review WHERE id_review = :id_review");
				$sql->bindParam(':id_review', $idParam);
				
				$sql->execute();
				
				echo"
					<script>
						window.location.href='../index.php?p=index_review';
					</script>
				";
			break;
		}