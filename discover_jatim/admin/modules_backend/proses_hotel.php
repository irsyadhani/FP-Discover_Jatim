<?php
	include('../../database.php');
	
		$v_proc = $_REQUEST['proc'];
	
		switch($v_proc){
			case "add":
			$v_id_hotel = $_POST['id_hotel'];
			$v_id_pariwisata = $_POST['id_pariwisata'];
			$v_nama_hotel = $_POST['nama_hotel'];
			$v_alamat_hotel = $_POST['alamat_hotel'];
			$v_bintang = $_POST['bintang'];
			$v_deskripsi_hotel = $_POST['deskripsi_hotel'];
			$v_foto_hotel = $_FILES['foto_hotel']['name'];
			$tmp = $_FILES['foto_hotel']['tmp_name'];
			$type = $_FILES['foto_hotel']['type'] = ("png" && "jpg" && "jpeg" && "gif");
			move_uploaded_file($tmp, "../../resources/images/hotel/".$v_foto_hotel);

			$sql = $db->prepare("INSERT INTO hotel (id_hotel, id_pariwisata, nama_hotel, alamat_hotel, bintang, deskripsi_hotel, foto_hotel) VALUES (:id_hotelParam, :id_pariwasataParam, :nama_hotelParam, :alamat_hotelParam, :bintangParam, :deskripsi_hotelParam, :foto_hotelParam)");
			
			$sql->bindParam(':id_hotelParam', $v_id_hotel);
			$sql->bindParam(':id_pariwasataParam', $v_id_pariwisata);
			$sql->bindParam(':nama_hotelParam', $v_nama_hotel);
			$sql->bindParam(':alamat_hotelParam', $v_alamat_hotel);
			$sql->bindParam(':bintangParam', $v_bintang);
			$sql->bindParam(':deskripsi_hotelParam', $v_deskripsi_hotel);
			$sql->bindParam(':foto_hotelParam', $v_foto_hotel);
			
			$sql->execute();
			
				echo"
					<script>
						alert('Upload Succes');
						window.location.href='../index.php?p=index_hotel';
					</script>
				";
			
			break;
			
			case "edit":
				$v_id_hotel = $_POST['id_hotel'];
				$v_id_hotel_ubah = $_POST['id_hotel_ubah'];
				$v_id_pariwisata = $_POST['id_pariwisata'];
				$v_nama_hotel = $_POST['nama_hotel'];
				$v_alamat_hotel = $_POST['alamat_hotel'];
				$v_bintang = $_POST['bintang'];
				$v_deskripsi_hotel = $_POST['deskripsi_hotel'];
				$v_tmp = $_FILES['foto_hotel']['tmp_name'];
				
				$sqlPicture = "";
				if($_FILES['foto_hotel']['name'] != ''){
					$v_foto_hotel = $_FILES['foto_hotel']['name'];
					$v_type = $_FILES['foto_hotel']['type'] = ("jpg" && "png" && "jpeg" && "gif");
					move_uploaded_file($v_tmp, "../../resources/images/hotel/".$v_foto_hotel);
					
					$sqlPicture = ", foto_hotel = :foto_hotelParam";
				}
				
				$sql = $db->prepare("UPDATE hotel SET id_hotel = :id_hotel_ubahParam, id_pariwisata = :id_pariwisataParam, nama_hotel = :nama_hotelParam, alamat_hotel = :alamat_hotelParam, bintang = :bintangParam, deskripsi_hotel = :deskripsi_hotelParam $sqlPicture WHERE id_hotel = :id_hotel");
				
				$sql->bindParam(':id_hotel_ubahParam', $v_id_hotel_ubah);
				$sql->bindParam(':id_hotel', $v_id_hotel);
				$sql->bindParam(':id_pariwisataParam', $v_id_pariwisata);
				$sql->bindParam(':nama_hotelParam', $v_nama_hotel);
				$sql->bindParam(':alamat_hotelParam', $v_alamat_hotel);
				$sql->bindParam(':bintangParam', $v_bintang);
				$sql->bindParam(':deskripsi_hotelParam', $v_deskripsi_hotel);

				if($_FILES['foto_hotel']['name'] !=""){
					$sql->bindParam(':foto_hotelParam', $v_foto_hotel);
				}
				
				$sql->execute();
				
				echo"
					<script>
					alert('Edit Success');
						window.location.href='../index.php?p=index_hotel';
					</script>
				";
			break;
			
			case "delete":
				$idParam = base64_decode(@$_GET['id']);
				
				$sql = $db->prepare("DELETE FROM hotel WHERE id_hotel = :id_hotel");
				$sql->bindParam(':id_hotel', $idParam);
				
				$sql->execute();
				
				echo"
					<script>
						window.location.href='../index.php?p=index_hotel';
					</script>
				";
			break;
		}