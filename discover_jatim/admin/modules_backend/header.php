<?php include("../database.php");?>
<?php session_start();?>
<html>
<head>
	<title>Discover Jatim</title>
	<meta name="viewport" content="width=device-width, initial scale=1">
	<link rel="stylesheet" type="text/css" href="../includes/backend/css/style.css">
	<link rel="shortcut icon" href="../resources/images/logo/logo_discover_jatim_bg.png">
</head>
<body>
	<!-- header -->
	<header class="large">
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<li class="menu-right">
							<?php if(@$_SESSION['administrator'] !=""){ ?>
							<?php
								$sql = $db->prepare ("SELECT id_admin, administrator, password, foto_admin FROM admin WHERE administrator = '$_SESSION[administrator]'");
								$sql->execute();
								
								$hasil = $sql->fetch(PDO::FETCH_ASSOC)
							?>
							<a class="focus_account"><?php echo @$hasil['administrator'];?>
								<span class="profil_user">
									<div class="circle_profil">
										<?php if(@$hasil['foto_admin'] != "") { ?>
											<img src="http://localhost/discover_jatim/resources/images/profil_user/<?php echo @$hasil['foto_admin']?>">
										<?php }else{ ?>
											<img src="http://localhost/discover_jatim/resources/images/profil_user/empty.png">
										<?php } ?>
									</div>
									<div class="name_profil">
										<?php echo @$hasil['administrator']; ?>
									</div>
									<div class="button_logout">
										<form action="modules_backend/logout.php">
											<button type="text">LOGOUT</button>
										</form>
									</div>
								</span>
							</a>
							<?php }else{ ?>
								<a href="index.php">ADMIN</a>
							<?php } ?>
						</li>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- header -->
	<?php if(@$_SESSION['administrator'] !="" && @$_GET['p'] !="") {?>
	<input type="checkbox" id="sidebar">
		<label for="sidebar" class="open_side">
			&#9776;
		</label>
		<label for="sidebar" class="close_side">
			&times;
		</label>
		<!-- <form>
			<input class="ani" type="search" placeholder="Search...">
			<button type="submit" class="search_button">&#128269;</button>
		</form> -->
		<div class="menu_sidebar">
			<div class="img_side">
				<a href="index.php">
					<img src="../resources/images/logo/logo_discover_jatim.png">
				</a>
			</div>
			<div class="menu_side">
				<ul>
					<li>
						<a href="index.php?p=user"><i <?php if(@$_GET['p'] == 'user') echo "class='active'"; ?> >USER</i></a>
					</li>
					<li>
						<a href="index.php?p=index_daerah"><i 
						<?php 
							if(@$_GET['p'] == 'index_daerah') echo "class='active'"; 
							elseif(@$_GET['p'] == 'form_daerah') echo "class='active'";
						?> >DAERAH</i></a>
					</li>
					<li>
						<a href="index.php?p=index_foto_pariwisata"><i 
						<?php 
							if(@$_GET['p'] == 'index_foto_pariwisata') echo "class='active'"; 
							elseif(@$_GET['p'] == 'form_foto_pariwisata') echo "class='active'";
						?> >FOTO PARIWISATA</i></a>
					</li>
					<li>
						<a href="index.php?p=index_pariwisata"><i 
						<?php 
							if(@$_GET['p'] == 'index_pariwisata') echo "class='active'"; 
							elseif(@$_GET['p'] == 'form_pariwisata') echo "class='active'";
						?> >PARIWISATA</i></a>
					</li>
					<li>
						<a href="index.php?p=index_detail_pariwisata"><i 
						<?php 
							if(@$_GET['p'] == 'index_detail_pariwisata') echo "class='active'"; 
							elseif(@$_GET['p'] == 'form_detail_pariwisata') echo "class='active'";
						?> >DETAIL PARIWISATA</i></a>
					</li>
					<li>
						<a href="index.php?p=index_kategori"><i 
						<?php 
							if(@$_GET['p'] == 'index_kategori') echo "class='active'"; 
							elseif(@$_GET['p'] == 'form_kategori') echo "class='active'";
						?> >KATEGORI</i></a>
					</li>
					<li>
						<a href="index.php?p=index_jadwal_buka"><i 
						<?php 
							if(@$_GET['p'] == 'index_jadwal_buka') echo "class='active'"; 
							elseif(@$_GET['p'] == 'form_jadwal_buka') echo "class='active'";
						?> >JADWAL BUKA</i></a>
					</li>
					<li>
						<a href="index.php?p=index_hotel"><i 
						<?php 
							if(@$_GET['p'] == 'index_hotel') echo "class='active'"; 
							elseif(@$_GET['p'] == 'form_hotel') echo "class='active'";
						?> >HOTEL</i></a>
					</li>
					<li>
						<a href="index.php?p=index_review"><i 
						<?php 
							if(@$_GET['p'] == 'index_review') echo "class='active'"; 
							elseif(@$_GET['p'] == 'form_review') echo "class='active'";
						?> >REVIEW</i></a>
					</li>
					<li>
						<a href="modules_backend/logout.php"><i>LOGOUT</i></a>
					</li>
				</ul>
			</div>
		</div>
	<?php } ?>