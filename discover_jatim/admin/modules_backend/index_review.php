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
					<strong>DATA REVIEW</strong>
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
								<th>ID REVIEW</th>
								<th>PENGGUNA</th>
								<th>PARIWISATA</th>
								<th>STATUS</th>
								<th>RATING</th>
								<th colspan="3">ACTION</th>
							<tr>
						</thead>
						<tbody>
							<a href="index.php?p=form_review">
							<button type="button" class="tambah_data">
								&#10010; ADD DATA
							</button>
							</a>
							<?php
								$no = 1;
								$sql = $db->prepare("SELECT R.*, P.nama_pengguna , PR.nama_tempat FROM review AS R LEFT JOIN pengguna AS P ON(R.id_pengguna = P.id_pengguna) LEFT JOIN pariwisata AS PR ON(R.id_pariwisata = PR.id_pariwisata)");
								$sql->execute();

								while($hasil = $sql->fetch(PDO::FETCH_ASSOC)){
							?>
								<tr>
									<td style="color:#000;"><?php echo $no; ?>.</td>
									<td><?php echo $hasil['id_review']; ?></td>
									<td><?php echo $hasil['nama_pengguna']; ?></td>
									<td><?php echo $hasil['nama_tempat']; ?></td>
									<td><?php echo $hasil['status']; ?></td>
									<td><?php echo $hasil['rating_review']; ?></td>

									<td><input type="button" value="&#9998;" class="edit_button" onclick="javascript:window.location.href='index.php?p=form_review&id=<?php echo addslashes(base64_encode(@$hasil['id_review'])); ?>'; " />
									</td>
									<td><input type="button" value="&#9673;" class="view_button" onclick="javascript:window.location.href='index.php?p=form_review&idview=<?php echo addslashes(base64_encode(@$hasil['id_review'])); ?>'; " />
									</td>
									<td><input type="button" class="delete_button" value="&times;"onclick="javascript:if(confirm('Are You Sure Want To Delete ?') == true) {window.location.href='modules_backend/proses_review.php?id=<?php echo base64_encode(@$hasil['id_review']); ?>&proc=delete'} "/>
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