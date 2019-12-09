<?php 
	if(@$_SESSION['administrator'] ==""){
		echo"
			<script>
				window.location.href='index.php';
			</script>
		";
		}else{	
?>
<!-- content -->
	<div class="container" id="content_sidebar">
		<div class="row">
			<div class="col-12">
				<div class="trash_content">
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-6">
				<div class="title-content">
					<strong>DATA FOTO PARIWISATA</strong>
					<small class="small-title-content">MANAGE THE DATA</small>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-12">
				<div class="wishlist">
					<table class="table table-hover">
						<thead>
							<tr>
								<th style="color:#000;">NO</th>
								<th>ID FOTO</th>
								<th>PARIWISATA</th>
								<th>FOTO</th>
								<!-- deskripsinya di view -->
								<!-- <th>DESCRIPTION</th> -->
								<th colspan="3">ACTION</th>
							<tr>
						</thead>
						<tbody>
							<a href="index.php?p=form_foto_pariwisata">
							<button type="button" class="tambah_data">
								&#10010; ADD DATA
							</button>
							</a>
							<?php
								$no = 1;
								$sql = $db->prepare("SELECT fp.*, fp.id_foto , p.nama_tempat FROM foto_pariwisata fp LEFT JOIN pariwisata p ON(fp.id_pariwisata = p.id_pariwisata)");
								$sql->execute();

								while($hasil = $sql->fetch(PDO::FETCH_ASSOC)){
									$path = "../resources/images/foto pariwisata/";
							?>
								<tr>
									<td style="color:#000;"><?php echo $no; ?>.</td>
									<td><?php echo $hasil['id_foto']; ?></td>
									<td><?php echo $hasil['nama_tempat']; ?></td>
									<td><img src="<?php echo $path.$hasil['foto_pariwisata']; ?>" width="156" height="116"></td>

									<td><input type="button" value="&#9998;" class="edit_button" onclick="javascript:window.location.href='index.php?p=form_foto_pariwisata&id=<?php echo addslashes(base64_encode(@$hasil['id_foto'])); ?>'; " />
									</td>
									<td><input type="button" class="delete_button" value="&times;"onclick="javascript:if(confirm('Are You Sure Want To Delete ?') == true) {window.location.href='modules_backend/proses_foto_pariwisata.php?id=<?php echo base64_encode(@$hasil['id_foto']); ?>&proc=delete'} "/>
									</td>
								<tr>
							<?php
								$no = $no +1;
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
				
	</div>
	
	<!-- content -->
		<?php } ?>