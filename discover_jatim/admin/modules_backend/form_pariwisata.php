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
		$sql = $db->prepare("SELECT * FROM pariwisata WHERE id_pariwisata = :id_pariwisata");
		$sql->bindParam(':id_pariwisata', $idParam);
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
						<strong>EDIT PARIWISATA</strong>
						<small class="small-title-content">CHANGE PARIWISATA  DATA</small>
					<?php }elseif(@$_GET['idview'] != ""){ ?>
						<strong>VIEW PARIWISATA</strong>
						<small class="small-title-content">VIEW  DATA</small>
					<?php }else{ $rand = substr(md5(microtime()),rand(0,26),6); ?>
						<strong>ADD PARIWISATA</strong>
						<small class="small-title-content">UPLOAD PARIWISATA DATA</small>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-12">
				<div class="stores_letter">
					<form method="post" action="modules_backend/proses_pariwisata.php" enctype="multipart/form-data">
						<?php if(@$_GET['id'] || @$_GET['idview'] !="") {?>
							<input type="hidden" name="proc" value="edit">
							<input type="hidden" name="id_pariwisata" value="<?php echo $idParam ?>">
						<?php }else{ ?>
							<input type="hidden" name="proc" value="add">
						<?php } ?>
						
						<div style="margin-bottom:-10; margin-top:10;"><h5>ID PARIWISATA :</h5></div>
						<input class="input-1-full" type="text" name="<?php if(@$_GET['id'] !=""){
							echo "id_pariwisata_ubah";
						}else{
							echo "id_pariwisata";}?>" value="<?php if(@$_GET['id'] || @$_GET['idview'] !=""){echo @$hasil['id_pariwisata'];}else{echo $rand;} ?>" placeholder="Id pariwisata" required <?php if(@$_GET['idview'] !="") echo "disabled"; ?>>

						<div style="margin-bottom:-10; margin-top:10;"><h5>ID DAERAH :</h5></div>
						<select name="id_daerah" class="select_id" <?php if(@$_GET['idview'] !="") echo "disabled"; ?>>
							<option>-- ID TEMPAT --</option>
							<?php
								$sql = $db->prepare("SELECT * FROM daerah");
								$sql->execute();
								
								while($hasilDaerah = $sql->fetch(PDO::FETCH_ASSOC)) {
							?>
							<option value="<?php echo $hasilDaerah['id_daerah'];?>" <?php if($hasilDaerah['id_daerah'] == @$hasil['id_daerah']) echo "selected"; ?>><?php echo $hasilDaerah['nama_daerah'];?></option>
							
							<?php } ?>
						</select>
						
						<div style="margin-bottom:-10; margin-top:20;"><h5>NAMA TEMPAT :</h5></div>
						<input class="input-1-full" type="text" name="nama_tempat" value="<?php echo @$hasil['nama_tempat'] ?>" placeholder="Nama tempat" required <?php if(@$_GET['idview'] !="") echo "disabled"; ?>>

						<div style="margin-bottom:-10; margin-top:10;"><h5>BIAYA MASUK :</h5></div>
						<input class="input-1-full" type="text" name="biaya_masuk" value="<?php echo @$hasil['biaya_masuk'] ?>" placeholder="Biaya masuk" required <?php if(@$_GET['idview'] !="") echo "disabled"; ?>>

						<div style="margin-bottom:-10; margin-top:10;"><h5>DESKRIPSI:</h5></div>
						<textarea class="input-1-full" <?php if(@$_GET['idview'] !="") echo 'rows="15"'; ?> rows="6" type="text" name="deskripsi_pariwisata" placeholder="Deskripsi" <?php if(@$_GET['idview'] !="") echo "disabled";?> required <?php if(@$_GET['idview'] !="") echo "disabled"; ?>><?php echo @$hasil['deskripsi_pariwisata'] ?></textarea>						

						<!-- <div style="margin-bottom:-10; margin-top:10;"><h5>AVERAGE RATING :</h5></div>
						<input class="input-1-full" type="text" name="avg_rating" value="<-?php echo @$hasil['avg_rating'] ?>" placeholder="Average rating" disabled> -->

						<div style="margin-bottom:-10; margin-top:10;"><h5>LINK WEBSITE :</h5></div>
						<input class="input-1-full" type="text" name="link_website" value="<?php echo @$hasil['link_website'] ?>" placeholder="Link Website" required <?php if(@$_GET['idview'] !="") echo "disabled"; ?>>

						<?php if(@$_GET['idview'] !="") {?>
						<a href="index.php?p=index_pariwisata"><button type="button" class="button_comment_reset">Back</button></a>
						<?php }else{ ?>
						<a href="index.php?p=index_pariwisata"><button type="button" class="button_comment_reset">Back</button></a>
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