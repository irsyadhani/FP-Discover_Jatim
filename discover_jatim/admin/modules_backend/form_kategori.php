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
		$sql = $db->prepare("SELECT * FROM kategori WHERE id_kategori = :id_kategori");
		$sql->bindParam(':id_kategori', $idParam);
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
						<strong>EDIT KATEGORI</strong>
						<small class="small-title-content">CHANGE KATEGORI  DATA</small>
					<?php }else{ $rand = substr(md5(microtime()),rand(0,26),6); ?>
						<strong>ADD KATEGORI</strong>
						<small class="small-title-content">UPLOAD KATEGORI DATA</small>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-12">
				<div class="stores_letter">
					<form method="post" action="modules_backend/proses_kategori.php" enctype="multipart/form-data">
						<?php if(@$_GET['id'] !="") {?>
							<input type="hidden" name="proc" value="edit">
							<input type="hidden" name="id_kategori" value="<?php echo $idParam ?>">
						<?php }else{ ?>
							<input type="hidden" name="proc" value="add">
						<?php } ?>
						
						<div style="margin-bottom:-10;"><h5>ID KATEGORI :</h5></div>
						<input class="input-1-full" type="text" 
						name="<?php if(@$_GET['id'] !=""){
							echo "id_kategori_ubah";
						}else{
							echo "id_kategori";}?>"
						value="<?php if(@$_GET['id'] !=""){echo @$hasil['id_kategori'];}else{ echo $rand;} ?>" placeholder="Id kategori" required>
						

						<div style="margin-bottom:-10; margin-top:10;"><h5>NAMA KATEGORI :</h5></div>
						<input class="input-1-full" type="text" name="nama_kategori" value="<?php echo @$hasil['nama_kategori'] ?>" placeholder="Nama kategori" required>

						<a href="index.php?p=index_kategori"><button type="button" class="button_comment_reset">Back</button></a>
						<button type="reset" class="button_comment_reset">Reset</button>
						<button type="submit" class="button_comment">Submit</button>
					</form>
				</div>
			</div>
		</div>
				
	</div>
	
	<!-- content -->
	<?php } ?>