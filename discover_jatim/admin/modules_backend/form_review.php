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
		$sql = $db->prepare("SELECT * FROM review WHERE id_review = :id_review");
		$sql->bindParam(':id_review', $idParam);
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
						<strong>EDIT REVIEW BUKA</strong>
						<small class="small-title-content">CHANGE REVIEW  DATA</small>
					<?php }else{ $rand = substr(md5(microtime()),rand(0,26),6); ?>
						<strong>ADD REVIEW</strong>
						<small class="small-title-content">UPLOAD REVIEW DATA</small>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-12">
				<div class="stores_letter">
					<form method="post" action="modules_backend/proses_review.php" enctype="multipart/form-data">
						<?php if(@$_GET['id'] !="") {?>
							<input type="hidden" name="proc" value="edit">
							<input type="hidden" name="id_review" value="<?php echo $idParam ?>">
						<?php }else{ ?>
							<input type="hidden" name="proc" value="add">
						<?php } ?>
						
						<div style="margin-bottom:-10; margin-top:10;"><h5>ID REVIEW :</h5></div>
						<input class="input-1-full" type="text" name="<?php if(@$_GET['id'] !=""){
							echo "id_review_ubah";
						}else{
							echo "id_review";}?>" value="<?php if(@$_GET['id'] || @$_GET['idview'] !=""){echo $hasil['id_review'];}else{ echo $rand; }?>" placeholder="Id Review" required <?php if(@$_GET['idview'] !="") echo "disabled"; ?>>

						<div style="margin-bottom:-10; margin-top:10;"><h5>ID PENGGUNA :</h5></div>
						<select name="id_pengguna" class="select_id" <?php if(@$_GET['idview'] !="") echo "disabled"; ?>>
							<option>-- NAMA PENGGUNA --</option>
							<?php
								$sql = $db->prepare("SELECT * FROM pengguna");
								$sql->execute();
								
								while($hasilPengguna = $sql->fetch(PDO::FETCH_ASSOC)) {
							?>
							<option value="<?php echo $hasilPengguna['id_pengguna'];?>" <?php if($hasilPengguna['id_pengguna'] == @$hasil['id_pengguna']) echo "selected"; ?>><?php echo $hasilPengguna['nama_pengguna'];?></option>
							
							<?php } ?>
						</select>

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


						<?php if(@$_GET['id'] || @$_GET['idview'] !=""){ ?>
							<div style="margin-bottom:-10; margin-top:10;"><h5>STATUS :</h5></div>
							<select name="status" class="select_id" <?php if(@$_GET['idview'] !="") echo "disabled"; ?>>
								<option>-- STATUS --</option>
								<?php
									$sql = $db->prepare("SELECT * FROM review WHERE id_review = $idParam");
									$sql->execute();
									
									while($hasilStatus = $sql->fetch(PDO::FETCH_ASSOC)) {
								?>
									<?php if(@$hasilStatus['status'] =="tidak tampil"){?>
										<option value="<?php echo $hasilStatus['id_review'];?>" <?php if($hasilStatus['id_review'] == @$hasil['id_review']) echo "selected"; ?>><?php echo $hasilStatus['status'];?></option>
										<option value="tampil">tampil</option>
									<?php }elseif(@$hasilStatus['status'] =="tampil"){ ?>
										<option value="<?php echo $hasilStatus['id_review'];?>" <?php if($hasilStatus['id_review'] == @$hasil['id_review']) echo "selected"; ?>><?php echo $hasilStatus['status'];?></option>
										<option value="tidak tampil">tidak tampil</option>
									<?php } ?>
								<?php } ?>
							</select>
						<?php }else{?>
							<div style="margin-bottom:-10; margin-top:10;"><h5>STATUS :</h5></div>
							<select name="status" class="select_id" <?php if(@$_GET['idview'] !="") echo "disabled"; ?>>
								<option>-- STATUS --</option>
								<option value="tampil">tampil</option>
								<option value="tidak tampil">tidak tampil</option>
							</select>
						<?php }?>
						
						<div style="margin-bottom:-10; margin-top:20;"><h5>RATING :</h5></div>
						<input class="input-1-full" type="number" name="rating_review" value="<?php echo @$hasil['rating_review'] ?>" disabled>

						<div style="margin-bottom:-10; margin-top:10;"><h5>DESKRIPSI:</h5></div>
						<textarea class="input-1-full" <?php if(@$_GET['idview'] !="") echo 'rows="15"'; ?> rows="6" type="text" name="deskripsi_review" placeholder="Deskripsi Review" <?php if(@$_GET['idview'] !="") echo "disabled";?> required ><?php echo @$hasil['deskripsi_review'] ?></textarea>

						<?php if(@$_GET['idview'] !="") {?>
						<a href="index.php?p=index_review"><button type="button" class="button_comment_reset">Back</button></a>
						<?php }else{ ?>
						<a href="index.php?p=index_review"><button type="button" class="button_comment_reset">Back</button></a>
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