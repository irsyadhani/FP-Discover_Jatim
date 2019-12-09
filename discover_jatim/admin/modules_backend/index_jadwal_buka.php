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
					<strong>DATA JADWAL</strong>
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
								<th>ID JADWAL</th>
								<th>NAMA PARIWISATA</th>
								<th>HARI BUKA</th>
								<th>JAM BUKA</th>
								<th>JAM TUTUP</th>
								<th colspan="2">ACTION</th>
							<tr>
						</thead>
						<tbody>
							<a href="index.php?p=form_jadwal_buka">
							<button type="button" class="tambah_data">
								&#10010; ADD DATA
							</button>
							</a>
							<?php
								$no = 1;
								$sql = $db->prepare("SELECT J.*, J.hari_buka AS hari, P.nama_tempat AS nama FROM jadwal_buka AS J LEFT JOIN pariwisata AS P ON(J.id_pariwisata = P.id_pariwisata)");
								$sql->execute();

								while($hasil = $sql->fetch(PDO::FETCH_ASSOC)){
							?>
								<tr>
									<td style="color:#000;"><?php echo $no; ?>.</td>
									<td><?php echo $hasil['id_jadwal']; ?></td>
									<td><?php echo $hasil['nama']; ?></td>
									<td><?php echo $hasil['hari']; ?></td>
									<td><?php echo $hasil['jam_buka']; ?></td>
									<td><?php echo $hasil['jam_tutup']; ?></td>
									<td><input type="button" value="&#9998;" class="edit_button" onclick="javascript:window.location.href='index.php?p=form_jadwal_buka&id=<?php echo addslashes(base64_encode(@$hasil['id_jadwal'])); ?>'; " />
									</td>
									<td><input type="button" class="delete_button" value="&times;"onclick="javascript:if(confirm('Are You Sure Want To Delete ?') == true) {window.location.href='modules_backend/proses_jadwal_buka.php?id=<?php echo base64_encode(@$hasil['id_jadwal']); ?>&proc=delete'} "/>
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