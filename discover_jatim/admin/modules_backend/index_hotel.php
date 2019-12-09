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
					<strong>DATA HOTEL</strong>
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
								<th>ID HOTEL</th>
								<th>PARIWISATA</th>
								<th>HOTEL</th>
								<th>ALAMAT</th>
								<th>BINTANG</th>
								<!-- deskripsinya di view -->
								<!-- <th>DESCRIPTION</th> -->
								<th>FOTO</th>
								<th colspan="3">ACTION</th>
							<tr>
						</thead>
						<tbody>
							<a href="index.php?p=form_hotel">
							<button type="button" class="tambah_data">
								&#10010; ADD DATA
							</button>
							</a>
							<?php
								$no = 1;
								$sql = $db->prepare("SELECT h.*, h.nama_hotel AS nama, p.nama_tempat AS pariwisata FROM hotel AS h LEFT JOIN pariwisata AS p ON(p.id_pariwisata = h.id_pariwisata)");
								$sql->execute();

								while($hasil = $sql->fetch(PDO::FETCH_ASSOC)){
									$path = "../resources/images/hotel/";
							?>
								<tr>
									<td style="color:#000;"><?php echo $no; ?>.</td>
									<td><?php echo $hasil['id_hotel']; ?></td>
									<td><?php echo $hasil['pariwisata']; ?></td>
									<td><?php echo $hasil['nama']; ?></td>
									<td><?php echo $hasil['alamat_hotel']; ?></td>
									<td><?php echo $hasil['bintang']; ?></td>
									<td><img src="<?php echo $path.$hasil['foto_hotel']; ?>" width="156" height="116"></td>
									<!-- deskripsinya di view -->
									<!-- <td><-?php echo $hasil['deskripsi_pariwisata']; ?></td> -->
									<td><input type="button" value="&#9998;" class="edit_button" onclick="javascript:window.location.href='index.php?p=form_hotel&id=<?php echo addslashes(base64_encode(@$hasil['id_hotel'])); ?>'; " />
									</td>
									<td><input type="button" value="&#9673;" class="view_button" onclick="javascript:window.location.href='index.php?p=form_hotel&idview=<?php echo addslashes(base64_encode(@$hasil['id_hotel'])); ?>'; " />
									</td>
									<td><input type="button" class="delete_button" value="&times;"onclick="javascript:if(confirm('Are You Sure Want To Delete ?') == true) {window.location.href='modules_backend/proses_hotel.php?id=<?php echo base64_encode(@$hasil['id_hotel']); ?>&proc=delete'} "/>
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