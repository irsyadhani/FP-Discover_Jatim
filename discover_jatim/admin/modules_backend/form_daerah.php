<?php 
	if(@$_SESSION['administrator'] ==""){
		echo"
			<script>
				window.location.href='index.php';
			</script>
		";
		}else{	
?>
<?php if(@$_GET['id'] !=""){
		$idParam = base64_decode(@$_GET['id']);
		$sql = $db->prepare("SELECT * FROM daerah WHERE id_daerah = :id_daerah");
		$sql->bindParam(':id_daerah', $idParam);
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
						<strong>EDIT DAERAH</strong>
						<small class="small-title-content">CHANGE DAERAH  DATA</small>
					<?php }else{ $rand = substr(md5(microtime()),rand(0,26),6); ?>
						<strong>ADD DAERAH</strong>
						<small class="small-title-content">UPLOAD DAERAH DATA</small>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-12">
				<div class="stores_letter">
					<form method="post" action="modules_backend/proses_daerah.php" enctype="multipart/form-data">
						<?php if(@$_GET['id'] !="") {?>
							<input type="hidden" name="proc" value="edit">
							<input type="hidden" name="id_daerah" value="<?php echo $idParam ?>">
						<?php }else{ ?>
							<input type="hidden" name="proc" value="add">
						<?php } ?>
						
						<div style="margin-bottom:-10;"><h5>ID DAERAH :</h5></div>
						<input class="input-1-full" type="text" 
						name="<?php if(@$_GET['id'] !=""){
							echo "id_daerah_ubah";
						}else{
							echo "id_daerah";}?>"
						value="<?php if(@$_GET['id'] !=""){echo @$hasil['id_daerah'];}else{ echo $rand;} ?>" placeholder="Id daerah" required>
						

						<div style="margin-bottom:-10; margin-top:10;"><h5>NAMA DAERAH :</h5></div>
						<input class="input-1-full" type="text" name="nama_daerah" value="<?php echo @$hasil['nama_daerah'] ?>" placeholder="Nama daerah" required>

						<a href="index.php?p=index_daerah"><button type="button" class="button_comment_reset">Back</button></a>
						<button type="reset" class="button_comment_reset">Reset</button>
						<button type="submit" class="button_comment">Submit</button>
					</form>
				</div>
			</div>
		</div>
				
	</div>
	
	<!-- content -->
	<?php } ?>