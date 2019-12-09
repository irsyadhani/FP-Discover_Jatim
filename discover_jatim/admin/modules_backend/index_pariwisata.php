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
					<strong>DATA PARIWISATA</strong>
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
								<th>ID PARIWISATA</th>
								<th>DAERAH</th>
								<th>NAMA TEMPAT</th>
								<th>BIAYA MASUK</th>
								<!-- deskripsinya di view -->
								<!-- <th>DESCRIPTION</th> -->
								<th>AVERAGE RATING</th>
								<th colspan="3">ACTION</th>
							<tr>
						</thead>
						<tbody>
							<a href="index.php?p=form_pariwisata">
							<button type="button" class="tambah_data">
								&#10010; ADD DATA
							</button>
							</a>
							<?php
								$no = 1;
								$sql = $db->prepare("SELECT p.*, p.nama_tempat AS nama, d.nama_daerah AS daerah FROM pariwisata AS p LEFT JOIN daerah AS d ON(p.id_daerah = d.id_daerah)");
								$sql->execute();

								while($hasil = $sql->fetch(PDO::FETCH_ASSOC)){
							?>
								<tr>
									<td style="color:#000;"><?php echo $no; ?>.</td>
									<td><?php echo $hasil['id_pariwisata']; ?></td>
									<td><?php echo $hasil['daerah']; ?></td>
									<td><?php echo $hasil['nama']; ?></td>
									<td>Rp. <?php echo $hasil['biaya_masuk']; ?></td>
									<!-- deskripsinya di view -->
									<!-- <td><-?php echo $hasil['deskripsi_pariwisata']; ?></td> -->
									<td><?php echo $hasil['avg_rating']; ?></td>
									<td><input type="button" value="&#9998;" class="edit_button" onclick="javascript:window.location.href='index.php?p=form_pariwisata&id=<?php echo addslashes(base64_encode(@$hasil['id_pariwisata'])); ?>'; " />
									</td>
									<td><input type="button" value="&#9673;" class="view_button" onclick="javascript:window.location.href='index.php?p=form_pariwisata&idview=<?php echo addslashes(base64_encode(@$hasil['id_pariwisata'])); ?>'; " />
									</td>
									<td><input type="button" class="delete_button" value="&times;"onclick="javascript:if(confirm('Are You Sure Want To Delete ?') == true) {window.location.href='modules_backend/proses_pariwisata.php?id=<?php echo base64_encode(@$hasil['id_pariwisata']); ?>&proc=delete'} "/>
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