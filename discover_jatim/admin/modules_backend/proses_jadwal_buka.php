<?php
	include('../../database.php');
	
		$v_proc = $_REQUEST['proc'];
	
		switch($v_proc){
			case "add":
			$v_id_jadwal = @$_POST['id_jadwal'];
			$v_id_pariwisata = $_POST['id_pariwisata'];
			$v_hari_buka = $_POST['hari_buka'];
			$v_jam_buka = $_POST['jam_buka'];
			$v_jam_tutup = $_POST['jam_tutup'];

			$sql = $db->prepare("INSERT INTO jadwal_buka (id_jadwal, id_pariwisata, hari_buka, jam_buka, jam_tutup) VALUES (:id_jadwalParam, :id_pariwasataParam, :hari_bukaParam, :jam_bukaParam, :jam_tutupParam)");
			
			$sql->bindParam(':id_jadwalParam', $v_id_jadwal);
			$sql->bindParam(':id_pariwasataParam', $v_id_pariwisata);
			$sql->bindParam(':hari_bukaParam', $v_hari_buka);
			$sql->bindParam(':jam_bukaParam', $v_jam_buka);
			$sql->bindParam(':jam_tutupParam', $v_jam_tutup);

			$sql->execute();
			
				echo"
					<script>
						alert('Upload Succes');
						window.location.href='../index.php?p=index_jadwal_buka';
					</script>
				";
			
			break;
			
			case "edit":
				$v_id_jadwal = $_POST['id_jadwal'];
				$v_id_jadwal_ubah = $_POST['id_jadwal_ubah'];
				$v_id_pariwisata = $_POST['id_pariwisata'];
				$v_hari_buka = $_POST['hari_buka'];
				$v_jam_buka = $_POST['jam_buka'];
				$v_jam_tutup = $_POST['jam_tutup'];
				
				$sql = $db->prepare("UPDATE jadwal_buka SET id_jadwal = :id_jadwal_ubahParam, id_pariwisata = :id_pariwisataParam, hari_buka = :hari_bukaParam, jam_buka = :jam_bukaParam, jam_tutup = :jam_tutupParam WHERE id_jadwal = :id_jadwal");
				
				$sql->bindParam(':id_jadwal', $v_id_jadwal);
				$sql->bindParam(':id_jadwal_ubahParam', $v_id_jadwal_ubah);
				$sql->bindParam(':id_pariwisata', $v_id_pariwisata);
				$sql->bindParam(':hari_bukaParam', $v_hari_buka);
				$sql->bindParam(':jam_bukaParam', $v_jam_buka);
				$sql->bindParam(':jam_tutupParam', $v_jam_tutup);
				
				$sql->execute();
				
				echo"
					<script>
					alert('Edit Success');
						window.location.href='../index.php?p=index_jadwal_buka';
					</script>
				";
			break;
			
			case "delete":
				$idParam = base64_decode(@$_GET['id']);
				
				$sql = $db->prepare("DELETE FROM jadwal_buka WHERE id_jadwal = :id_jadwal");
				$sql->bindParam(':id_jadwal', $idParam);
				
				$sql->execute();
				
				echo"
					<script>
						window.location.href='../index.php?p=index_jadwal_buka';
					</script>
				";
			break;
		}