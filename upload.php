<?php 
$msg = "";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nutribox";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("connection_failed  " . $conn->connect_error);
}
if(isset($_POST['submit'])){
$a="";
$b="";
$c="";
$d="";
$e="";
$f="";
$target_dir = "img/user/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check != false) {
        $a = "Gambar tenanan - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        $a = "ra gambar weh.<br>";
        $uploadOk = 0;
    }
}
if (file_exists($target_file)) {
    $b = "nama file dah ada.<br>";
    $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $c = "kegeden cu.<br>";
    $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $d = "he he he kok aplod file ekstensi ne ." . $imageFileType .   ", kudune JPG, JPEG, PNG & GIF files ekstensi.<br>";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    $e = "moh ngaplod aku cih.<br>";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $f = "The file ". basename( $_FILES["fileToUpload"]["name"]). " telah di upload.";

        $link = $target_dir . basename( $_FILES["fileToUpload"]["name"]);
        $nama = basename( $_FILES["fileToUpload"]["name"]);
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "nutribox";
        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->query( "INSERT INTO `image`(`nama`, `url`) VALUES ('$nama','$target_file')");
    } else {
        $f = "Sorry, there was an error uploading your file.";
    }
} $msg = $a . $b . $c . $d . $e . $f;
}
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Karma Shop</title>

    <!--
            CSS
            ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<html>
<body>
    <div class="container"><br>
<?php if ($msg != "") { ?> <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <h4 class="alert-heading"><strong>ERROR!</strong></h4><hr>
                <?php echo $msg;?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
                </div><?php }?>
            
                
            </div>
                
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<br><br><br><br>

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama File</th>
      <th scope="col">Preview</th>
      <th scope="col">Download</th>
    </tr>
  </thead>
  <tbody>
      <?php                 $awek = 1;
                            $sql = 'SELECT * FROM image';
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                              while ($row = $result->fetch_assoc()){
                                $baru = $row['url'];
                                echo '<tr><th>'. $awek .
                                    "</th><td>". $row['nama'] .  
                                    "</th><td><img src='" . $baru . "' width='100px' height='100px'>" .
                                    "</td><td><a class='btn btn-primary' href=" .  $baru . " role='button' download>Download</a></td></tr>"; $awek++;}
                            }
      ?>
  </tbody>
</table>

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
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>