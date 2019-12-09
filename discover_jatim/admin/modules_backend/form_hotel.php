<?php 
	if(@$_SESSION['administrator'] ==""){
		echo"
			<script>
				window.location.href='index.php';
			</script>
		";
		}else{	
?>
<?php if(@$_GET['id'] || @$_GET['idview'] !=""){
		if(@$_GET['id'] !=""){
			echo $idParam = base64_decode(@$_GET['id']);
		}elseif(@$_GET['idview'] !=""){
			echo $idParam = base64_decode(@$_GET['idview']);
		}
		$sql = $db->prepare("SELECT * FROM hotel WHERE id_hotel = :id_hotel");
		$sql->bindParam(':id_hotel', $idParam);
		$sql->execute();
		$hasil = $sql->FETCH(PDO::FETCH_ASSOC);
		$path = "../resources/images/hotel/";
	}
?>
	<!-- content -->
	<div class="container"  id="content_sidebar">
		<div class="row">
			<div class="col-12">
				<div class="trash_content">
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-6">
				<div class="title-content">
					<?php if(@$_GET['id'] != "") {?>
						<strong>EDIT HOTEL</strong>
						<small class="small-title-content">CHANGE HOTEL DATA</small>
					<?php }elseif(@$_GET['idview'] != ""){ ?>
						<strong>VIEW HOTEL</strong>
						<small class="small-title-content">VIEW  DATA</small>
					<?php }else{ $rand = substr(md5(microtime()),rand(0,26),6); ?>
						<strong>ADD HOTEL</strong>
						<small class="small-title-content">UPLOAD HOTEL DATA</small>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-12">
				<div class="stores_letter">
					<form method="post" action="modules_backend/proses_hotel.php" enctype="multipart/form-data">
						<?php if(@$_GET['id'] || @$_GET['idview'] !="") {?>
							<input type="hidden" name="proc" value="edit">
							<input type="hidden" name="id_hotel" value="<?php echo $idParam ?>">
						<?php }else{ ?>
							<input type="hidden" name="proc" value="add">
						<?php } ?>
						
						<div style="margin-bottom:-10; margin-top:10;"><h5>ID HOTEL :</h5></div>
						<input class="input-1-full" type="text" name="<?php if(@$_GET['id'] !=""){
							echo "id_hotel_ubah";
						}else{
							echo "id_hotel";}?>" value="<?php if(@$_GET['id'] || @$_GET['idview'] !=""){echo @$hasil['id_hotel'];}else{echo $rand;} ?>" placeholder="Id Hotel" required <?php if(@$_GET['idview'] !="") echo "disabled"; ?>>

						<div style="margin-bottom:-10; margin-top:10;"><h5>ID PARIWISATA :</h5></div>
						<select name="id_pariwisata" class="select_id" <?php if(@$_GET['idview'] !="") echo "disabled"; ?>>
							<option>-- NAMA PARIWISATA --</option>
							<?php
								$sql = $db->prepare("SELECT * FROM pariwisata");
								$sql->execute();
								
								while($hasilPariwisata = $sql->fetch(PDO::FETCH_ASSOC)) {
							?>
							<option value="<?php echo $hasilPariwisata['id_pariwisata'];?>" <?php if($hasilPariwisata['id_pariwisata'] == @$hasil['id_pariwisata']) echo "selected"; ?>><?php echo $hasilPariwisata['nama_tempat'];?></option>
							
							<?php } ?>
						</select>
						
						<div style="margin-bottom:-10; margin-top:20;"><h5>NAMA HOTEL :</h5></div>
						<input class="input-1-full" type="text" name="nama_hotel" value="<?php echo @$hasil['nama_hotel'] ?>" placeholder="Nama Hotel" required <?php if(@$_GET['idview'] !="") echo "disabled"; ?>>

						<div style="margin-bottom:-10; margin-top:10;"><h5>ALAMAT HOTEL :</h5></div>
						<input class="input-1-full" type="text" name="alamat_hotel" value="<?php echo @$hasil['alamat_hotel'] ?>" placeholder="Alamat Hotel" required <?php if(@$_GET['idview'] !="") echo "disabled"; ?>>
						
						<div style="margin-bottom:-10; margin-top:10;"><h5>BINTANG :</h5></div>
						<input class="input-1-full" type="number" name="bintang" min="1" max="5" value="<?php echo @$hasil['bintang'] ?>" placeholder="Bintang Hotel" reqiured>

						<div style="margin-bottom:-10; margin-top:10;"><h5>DESKRIPSI:</h5></div>
						<textarea class="input-1-full" <?php if(@$_GET['idview'] !="") echo 'rows="15"'; ?> rows="6" type="text" name="deskripsi_hotel" placeholder="Deskripsi" <?php if(@$_GET['idview'] !="") echo "disabled";?> required ><?php echo @$hasil['deskripsi_hotel'] ?></textarea>						
						
						<?php if(@$_GET['idview'] !="") {?>
						<div style="margin-bottom:-10; margin-top:10;"><h5>FOTO HOTEL :</h5></div>
						<br>
						<img style="width:396; height:216; opacity:1;" src="<?php echo $path.$hasil['foto_hotel']; ?>">
						<p></p>
						<?php }else{ ?>

						<div style="margin-bottom:-10; margin-top:10;"><h5>FOTO HOTEL :</h5></div>
						<input type="file" value="<?php echo @$hasil['foto_hotel']?>" name="foto_hotel" style="position:absolute; margin-left:18px; margin-top:22px; color:#ff9800;" id="upload_user"  />
							<label for="upload_user" class="user_upload">
							Choose Image
							</label>
						<?php } ?>

						<?php if(@$_GET['idview'] !="") {?>
						<a href="index.php?p=index_hotel"><button type="button" class="button_comment_reset">Back</button></a>
						<?php }else{ ?>
						<a href="index.php?p=index_hotel"><button type="button" class="button_comment_reset">Back</button></a>
						<button type="reset" class="button_comment_reset">Reset</button>
						<button type="submit" class="button_comment">Submit</button>
						<?php } ?>
					</form>
				</div>
			</div>
		</div>
				
	</div>
	
	<!-- content -->
	<?php } ?>