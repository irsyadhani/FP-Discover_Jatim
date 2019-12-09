<?php
	include('../../database.php');
	
		$v_proc = $_REQUEST['proc'];
	
		switch($v_proc){
			case "add":
			$v_id_pariwisata = $_POST['id_pariwisata'];
			$v_id_daerah = $_POST['id_daerah'];
			$v_nama_tempat = $_POST['nama_tempat'];
			$v_biaya_masuk = $_POST['biaya_masuk'];
			$v_deskripsi_pariwisata = $_POST['deskripsi_pariwisata'];
			$v_avg_rating = $_POST['avg_rating'];
			$v_link_website = $_POST['link_website'];

			$sql = $db->prepare("INSERT INTO pariwisata (id_pariwisata, id_daerah, nama_tempat, biaya_masuk, deskripsi_pariwisata, avg_rating, link_website) VALUES (:id_pariwasataParam, :id_daerahParam, :nama_tempatParam, :biaya_masukParam, :deskripsi_pariwisataParam, :avg_ratingParam, :link_websiteParam)");
			
			$sql->bindParam(':id_pariwasataParam', $v_id_pariwisata);
			$sql->bindParam(':id_daerahParam', $v_id_daerah);
			$sql->bindParam(':nama_tempatParam', $v_nama_tempat);
			$sql->bindParam(':biaya_masukParam', $v_biaya_masuk);
			$sql->bindParam(':deskripsi_pariwisataParam', $v_deskripsi_pariwisata);
			$sql->bindParam(':avg_ratingParam', $v_avg_rating);
			$sql->bindParam(':link_websiteParam', $v_link_website);
			
			$sql->execute();
			
				echo"
					<script>
						alert('Upload Succes');
						window.location.href='../index.php?p=index_pariwisata';
					</script>
				";
			
			break;
			
			case "edit":
				$v_id_pariwisata = $_POST['id_pariwisata'];
				$v_id_pariwisata_ubah = $_POST['id_pariwisata_ubah'];
				$v_id_daerah = $_POST['id_daerah'];
				$v_id_tempat = @$_POST['id_tempat'];
				$v_nama_tempat = $_POST['nama_tempat'];
				$v_biaya_masuk = $_POST['biaya_masuk'];
				$v_deskripsi_pariwisata = $_POST['deskripsi_pariwisata'];
				$v_avg_rating = @$_POST['avg_rating'];
				$v_link_website = $_POST['link_website'];
				
				$sql = $db->prepare("UPDATE pariwisata SET id_pariwisata = :id_pariwisata_ubahParam, id_daerah = :id_daerahParam, nama_tempat = :nama_tempatParam, biaya_masuk = :biaya_masukParam, deskripsi_pariwisata = :deskripsi_pariwisataParam, avg_rating = :avg_ratingParam, link_website = :link_websiteParam WHERE id_pariwisata = :id_pariwisata");
				
				$sql->bindParam(':id_pariwisata', $v_id_pariwisata);
				$sql->bindParam(':id_pariwisata_ubahParam', $v_id_pariwisata_ubah);
				$sql->bindParam(':id_daerahParam', $v_id_daerah);
				$sql->bindParam(':nama_tempatParam', $v_nama_tempat);
				$sql->bindParam(':biaya_masukParam', $v_biaya_masuk);
				$sql->bindParam(':deskripsi_pariwisataParam', $v_deskripsi_pariwisata);
				$sql->bindParam(':avg_ratingParam', $v_avg_rating);
				$sql->bindParam(':link_websiteParam', $v_link_website);
				
				$sql->execute();
				
				echo"
					<script>
					alert('Edit Success');
						window.location.href='../index.php?p=index_pariwisata';
					</script>
				";
			break;
			
			case "delete":
				$idParam = base64_decode(@$_GET['id']);
				
				$sql = $db->prepare("DELETE FROM pariwisata WHERE id_pariwisata = :id_pariwisata");
				$sql->bindParam(':id_pariwisata', $idParam);
				
				$sql->execute();
				
				echo"
					<script>
						window.location.href='../index.php?p=index_pariwisata';
					</script>
				";
			break;
		}