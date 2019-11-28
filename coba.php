<!DOCTYPE html>

<html>
<head>
  <title>Beranda Sistim Monitoring Online Tempat Pembuangan Sampah Surabaya</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body class="landing">

  <!-- Header -->
    <header id="header">
      <h1><strong><a href="index.html">Dibuat</a></strong> oleh tim Masriri</h1>
      <nav id="nav">
        <ul>
          <li><a href="index.html">Beranda</a></li>
          <li><a href="generic.html">Peta</a></li>
          <li><a href="login.html">Masuk</a></li>
        </ul>
      </nav>
    </header>


  <section id="one" class="wrapper style1">
  <div class="login-page">
    <div class="form">
      <form action="login.php" method="post" class="login-form">
        <input type="text" name="username" placeholder="username" value=<?php if(isset($username)){ echo $username;} else echo ""; ?>/>
        <input type="password" name="password" placeholder="password" value=<?php echo $password; ?>/>
        <button>login</button>
        <p class="message">Not registered? <a href="signup.html">Create an account</a></p>
        </form>
      </div>
    </div>
  </section>

</body>
</html>
