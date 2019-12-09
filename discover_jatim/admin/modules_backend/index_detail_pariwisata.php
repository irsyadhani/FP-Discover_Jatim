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
					<strong>DATA DETAIL PARIWISATA</strong>
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
								<th>PARIWISATA</th>
								<th>KATEGORI</th>
								<th>ACTION</th>
							<tr>
						</thead>
						<tbody>
							<a href="index.php?p=form_detail_pariwisata">
							<button type="button" class="tambah_data">
								&#10010; ADD DATA
							</button>
							</a>
							<?php
								$no = 1;
								$sql = $db->prepare("SELECT *, p.nama_tempat, k.nama_kategori FROM pariwisata p, kategori k, detail_pariwisata dp WHERE p.id_pariwisata = dp.id_pariwisata AND k.id_kategori = dp.id_kategori");
								$sql->execute();

								while($hasil = $sql->fetch(PDO::FETCH_ASSOC)){
							?>
								<tr>
									<td style="color:#000;"><?php echo $no; ?>.</td>
									<td><?php echo $hasil['nama_tempat']; ?></td>
									<td><?php echo $hasil['nama_kategori']; ?></td>
<!-- 
									<td><input type="button" value="&#9998;" class="edit_button" onclick="javascript:window.location.href='index.php?p=form_detail_pariwisata&id=<-?php echo addslashes(base64_encode(@$hasil['id_pariwisata'])); ?>'; " />
									</td> -->
									<td><input type="button" class="delete_button" value="&times;"onclick="javascript:if(confirm('Are You Sure Want To Delete ?') == true) {window.location.href='modules_backend/proses_detail_pariwisata.php?id=<?php echo base64_encode(@$hasil['id_pariwisata']); ?>&proc=delete'} "/>
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