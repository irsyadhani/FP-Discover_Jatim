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
					<strong>USER DATA</strong>
					<small class="small-title-content">VIEW THE PROFIL USER</small>
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
								<th>ID USER</th>
								<th>USERNAME</th>
								<th>PASSWORD</th>
								<th>NO TELEPON</th>
								<th>EMAIL</th>
								<th>PICTURE</th>
							<tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								$sql = $db->prepare("SELECT * FROM pengguna");
								$sql->execute();
								
								while($hasil = $sql->fetch(PDO::FETCH_ASSOC)){
									if($hasil['foto_pengguna'] == '') $hasil['foto_pengguna'] = 'empty.png';
									$path = "../resources/images/profil_user/";
							?>
								<tr>
									<td style="color:#000;"><?php echo $no; ?>.</td>
									<td><?php echo @$hasil['id_pengguna']; ?></td>
									<td><?php echo @$hasil['nama_pengguna']; ?></td>
									<td><?php echo @$hasil['kata_sandi']; ?></td>
									<td><?php echo @$hasil['no_telp']; ?></td>
									<td><?php echo @$hasil['email']; ?></td>
									<?php if(file_exists($path.$hasil['foto_pengguna'])){ ?>
										<td class="user_profil_admin"><img src="<?php echo $path.@$hasil['foto_pengguna']; ?>" /></td>
									<?php }else{ ?>
										<td><img src="<?php echo $path."empty.png" ?>" width="80" height="80" /></td>
									<?php } ?>
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