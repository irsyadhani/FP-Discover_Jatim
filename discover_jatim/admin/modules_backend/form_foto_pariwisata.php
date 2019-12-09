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
		$sql = $db->prepare("SELECT * FROM foto_pariwisata WHERE id_foto = :id_foto");
		$sql->bindParam(':id_foto', $idParam);
		$sql->execute();
		$hasil = $sql->FETCH(PDO::FETCH_ASSOC);
		$path = "../resources/images/foto pariwisata/";
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
						<strong>EDIT FOTO PARIWISATA</strong>
						<small class="small-title-content">CHANGE FOTO PARIWISATA DATA</small>
					<?php }elseif(@$_GET['idview'] != ""){ ?>
						<strong>VIEW FOTO PARIWISATA</strong>
						<small class="small-title-content">VIEW  DATA</small>
					<?php }else{ $rand = substr(md5(microtime()),rand(0,26),6); ?>
						<strong>ADD FOTO PARIWISATA</strong>
						<small class="small-title-content">UPLOAD FOTO PARIWISATA DATA</small>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-12">
				<div class="stores_letter">
					<form method="post" action="modules_backend/proses_foto_pariwisata.php" enctype="multipart/form-data">
						<?php if(@$_GET['id'] || @$_GET['idview'] !="") {?>
							<input type="hidden" name="proc" value="edit">
							<input type="hidden" name="id_foto" value="<?php echo $idParam ?>">
						<?php }else{ ?>
							<input type="hidden" name="proc" value="add">
						<?php } ?>
						
						<div style="margin-bottom:-10; margin-top:10;"><h5>ID FOTO :</h5></div>
						<input class="input-1-full" type="text" name="<?php if(@$_GET['id'] !=""){
							echo "id_foto_ubah";
						}else{
							echo "id_foto";}?>" value="<?php if(@$_GET['id'] || @$_GET['idview'] !=""){echo @$hasil['id_foto'];}else{echo $rand;} ?>" placeholder="Id Foto" required <?php if(@$_GET['idview'] !="") echo "disabled"; ?>>

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
						
						<?php if(@$_GET['idview'] !="") {?>
						<div style="margin-bottom:-10; margin-top:10;"><h5>FOTO PARIWISATA :</h5></div>
						<img class="input-1-full" src="<?php echo $path.$hasil['foto_pariwisata']; ?>" width="156" height="116">
						<br>
						<?php }else{ ?>

						<div style="margin-bottom:-10; margin-top:10;"><h5>FOTO PARIWISATA :</h5></div>
						<input type="file" value="<?php echo @$hasil['foto_pariwisata']?>" name="foto_pariwisata" style="position:absolute; margin-left:18px; margin-top:22px; color:#ff9800;" id="upload_user"  />
							<label for="upload_user" class="user_upload">
							Choose Image
							</label>
						<?php } ?>

						<?php if(@$_GET['idview'] !="") {?>
						<a href="index.php?p=index_foto_pariwisata"><button type="button" class="button_comment_reset">Back</button></a>
						<?php }else{ ?>
						<a href="index.php?p=index_foto_pariwisata"><button type="button" class="button_comment_reset">Back</button></a>
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