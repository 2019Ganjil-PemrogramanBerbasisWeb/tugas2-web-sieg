<?php
session_start();
require_once "controller/conn.php";

	if (isset($_SESSION['user_id'])) {
		header('Location: ./index.php');
		exit();
	}

    $msg = "";
    $r_email = "";

    if (isset($_POST['register'])) {
        include 'controller/conn.php';

            $name = $conn->real_escape_string($_POST['name']);
            $email = $conn->real_escape_string($_POST['email']);
            $password = $conn->real_escape_string($_POST['password']);
            $cpassword = $conn->real_escape_string($_POST['cpassword']);

            $sql_e = "SELECT * FROM user WHERE email='$email'";
            $res_e = mysqli_query($conn, $sql_e);

            if (empty($name)) {
                $msg = "Tolong Tulis nama anda";
			}
			if (empty($email)) {
                $msg = "Tolong Tulis nama anda";
            }
            elseif (empty($password)) {
                $msg = "Tolong Tulis Password anda";
            }
            elseif (empty($cpassword)) {
                $msg = "Tolong Tulis konfirmasi Password anda";
            }

            elseif ($password != $cpassword) {
                $msg = "Tolong cek ulang password anda"; 
            }
            elseif (mysqli_num_rows($res_e) > 0) {
					$r_email = "Maaf Email Sudah Teregristrasi!"; 	
			}
            
            
                    else {
                        $hash = password_hash($password,PASSWORD_DEFAULT);
                        $conn->query( "INSERT INTO user (name,email,password) 
                        Values ('$name','$email','$hash')");
                        header("location: ./index.php"); }
			}
	elseif (isset($_POST['login'])) {
   if(empty($_POST['user_id'])){
			$msg="Tolong Isi User ID";
		}else {
		$name = $conn->real_escape_string($_POST['name']);
		$username = $conn->real_escape_string($_POST['username']);
		$Date = $conn->real_escape_string($_POST['date']);
		$time = $conn->real_escape_string($_POST['time']);
		$user_id  = $conn->real_escape_string($_POST['user_id']);
		function ubahtanggal($Date){
			$pisah=explode('/', $Date);
			$larik = array($pisah[2],$pisah[0],$pisah[1]);
			$satukan = implode('-', $larik);
			return $satukan;
		}

			if (!empty($_POST['name'])) {
			$conn->query( "UPDATE attendance SET subject='$name' where id=$user_id");
			}
			if (!empty($_POST['date'])) {
			$Date = ubahTanggal($Date);
			$conn->query( "UPDATE attendance SET, date='$Date' where id=$user_id");
			}
			if (!empty($_POST['time'])) {
			$conn->query( "UPDATE attendance SET , time='$time' where id=$user_id");
			}
			if (!empty($_POST['username'])) {
			$conn->query( "UPDATE attendance SET , name='$username' where id=$user_id");
			}
  }}
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="img/fav.png">
	<meta name="author" content="CodePixar">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta charset="UTF-8">
	<title>Karma Shop</title>

	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt="" height="73px"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Shop</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="category.html">Kategori Belanja</a></li>
									<li class="nav-item"><a class="nav-link" href="single-product.html">Detail Produk</a></li>
									<li class="nav-item"><a class="nav-link" href="checkout.html">Checkout Belanja</a></li>
									<li class="nav-item"><a class="nav-link" href="cart.html">Keranjang Belanja</a></li>
									<li class="nav-item"><a class="nav-link" href="confirmation.html">Persetujuan</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Info</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="blog.html">Info Nutrisi</a></li>
									<li class="nav-item"><a class="nav-link" href="single-blog.html">Info Nutribox</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown active">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Akun</a>
								<ul class="dropdown-menu">
									<li class="nav-item active"><a class="nav-link" href="login.html">Login/Daftar</a></li>
									<li class="nav-item"><a class="nav-link" href="tracking.html">Lacak Pesanan</a></li>
									<li class="nav-item"><a class="nav-link" href="elements.html">Riwayat</a></li>
								</ul>
							</li>
							<li class="nav-item"><a class="nav-link" href="contact.html">Bantuan</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login/Register</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Login/Register</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
			<?php if ($msg != "") { ?> <div class="alert alert-warning" role="alert"><?php echo $msg;?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div><?php }?>
				<div class="col-lg-6">
						<div class="login_form_inner">
							<h3>Daftar Nutribox</h3>
							<form class="row login_form" action="login.php" method="post" id="register" name="register" novalidate="novalidate">
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="name" name="name" placeholder="Nama" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama'">
								</div>
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
								</div>
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
								</div>
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" id="cpassword" name="cpassword" placeholder="Tulis Ulang Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tulis Ulang Password'">
								</div>
								<div class="col-md-12 form-group">
									<button type="submit" value="submit" name="register" id="register" class="primary-btn">Daftar</button>
								</div>
							</form>
						</div>
					</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Login Nutribox</h3>
						<form class="row login_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate" name="login" id="login">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Ingat saya</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn" name="login" id="login">Login</button>
								<a href="#">Lupa Password?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php 
	include 'footer.html'
	?>

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>