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
		$idParam = base64_decode(@$_GET['id']);
		$sql = $db->prepare("SELECT * FROM jadwal_buka WHERE id_jadwal = :id_jadwal");
		$sql->bindParam(':id_jadwal', $idParam);
		$sql->execute();
		$hasil = $sql->FETCH(PDO::FETCH_ASSOC);
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
						<strong>EDIT JADWAL BUKA</strong>
						<small class="small-title-content">CHANGE JADWAL BUKA  DATA</small>
					<?php }else{ $rand = substr(md5(microtime()),rand(0,26),6);?>
						<strong>ADD PARIWISATA</strong>
						<small class="small-title-content">UPLOAD PARIWISATA DATA</small>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-12">
				<div class="stores_letter">
					<form method="post" action="modules_backend/proses_jadwal_buka.php" enctype="multipart/form-data">
						<?php if(@$_GET['id'] !="") {?>
							<input type="hidden" name="proc" value="edit">
							<input type="hidden" name="id_jadwal" value="<?php echo $idParam ?>">
						<?php }else{ ?>
							<input type="hidden" name="proc" value="add">
						<?php } ?>
						
						<div style="margin-bottom:-10; margin-top:10;"><h5>ID JADWAL :</h5></div>
						<input class="input-1-full" type="text" name="<?php if(@$_GET['id'] !=""){
							echo "id_jadwal_ubah";
						}else{
							echo "id_jadwal";}?>" value="<?php if(@$_GET['id'] !=""){echo @$hasil['id_jadwal'];}else{ echo $rand;} ?>" placeholder="Id Jadwal" required>

						<div style="margin-bottom:-10; margin-top:10;"><h5>ID PARIWISATA :</h5></div>
						<select name="id_pariwisata" class="select_id">
							<option>-- NAMA PARIWISATA --</option>
							<?php
								$sql = $db->prepare("SELECT * FROM pariwisata");
								$sql->execute();
								
								while($hasilPariwisata = $sql->fetch(PDO::FETCH_ASSOC)) {
							?>
							<option value="<?php echo $hasilPariwisata['id_pariwisata'];?>" <?php if($hasilPariwisata['id_pariwisata'] == @$hasil['id_pariwisata']) echo "selected"; ?>><?php echo $hasilPariwisata['nama_tempat'];?></option>
							
							<?php } ?>
						</select>
						
						<div style="margin-bottom:-10; margin-top:20;"><h5>HARI BUKA :</h5></div>
						<input class="input-1-full" type="text" name="hari_buka" value="<?php echo @$hasil['hari_buka'] ?>" placeholder="Hari Buka" required>

						<div style="margin-bottom:-10; margin-top:10;"><h5>JAM BUKA :</h5></div>
						<input class="input-1-full" type="time" name="jam_buka" value="<?php echo @$hasil['jam_buka'] ?>" placeholder="Jam Buka" required>

						<div style="margin-bottom:-10; margin-top:10;"><h5>JAM TUTUP :</h5></div>
						<input class="input-1-full" type="time" name="jam_tutup" value="<?php echo @$hasil['jam_tutup'] ?>" placeholder="Jam Tutup" required>

						<a href="index.php?p=index_jadwal_buka"><button type="button" class="button_comment_reset">Back</button></a>
						<button type="reset" class="button_comment_reset">Reset</button>
						<button type="submit" class="button_comment">Submit</button>
					</form>
				</div>
			</div>
		</div>
				
	</div>
	
	<!-- content -->
	<?php } ?>