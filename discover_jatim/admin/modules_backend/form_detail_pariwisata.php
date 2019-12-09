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
		$sql = $db->prepare("SELECT * FROM detail_pariwisata WHERE id_pariwisata = :id_pariwisata");
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
						<strong>EDIT DETAIL PARIWISATA</strong>
						<small class="small-title-content">CHANGE DETAIL PARIWISATA  DATA</small>
					<?php }elseif(@$_GET['idview'] != ""){ ?>
						<strong>VIEW DETAIL PARIWISATA</strong>
						<small class="small-title-content">VIEW  DATA</small>
					<?php }else{ ?>
						<strong>ADD DETAIL PARIWISATA</strong>
						<small class="small-title-content">UPLOAD DETAIL PARIWISATA DATA</small>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-12">
				<div class="stores_letter">
					<form method="post" action="modules_backend/proses_detail_pariwisata.php" enctype="multipart/form-data">
						<?php if(@$_GET['id'] || @$_GET['idview'] !="") {?>
							<input type="hidden" name="proc" value="edit">
							<input type="hidden" name="id_pariwisata" value="<?php echo $idParam ?>">
						<?php }else{ ?>
							<input type="hidden" name="proc" value="add">
						<?php } ?>
						
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

						<div style="margin-bottom:-10; margin-top:10;"><h5>ID KATEGORI :</h5></div>
						<select name="id_kategori" class="select_id" <?php if(@$_GET['idview'] !="") echo "disabled"; ?>>
							<option>-- NAMA KATEGORI --</option>
							<?php
								$sql = $db->prepare("SELECT * FROM kategori");
								$sql->execute();
								
								while($hasilKategori = $sql->fetch(PDO::FETCH_ASSOC)) {
							?>
							<option value="<?php echo $hasilKategori['id_kategori'];?>" <?php if($hasilKategori['id_kategori'] == @$hasil['id_kategori']) echo "selected"; ?>><?php echo $hasilKategori['nama_kategori'];?></option>
							
							<?php } ?>
						</select>

						<?php if(@$_GET['idview'] !="") {?>
						<a href="index.php?p=index_detail_pariwisata"><button type="button" class="button_comment_reset">Back</button></a>
						<?php }else{ ?>
						<a href="index.php?p=index_detail_pariwisata"><button type="button" class="button_comment_reset">Back</button></a>
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