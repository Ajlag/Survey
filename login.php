<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Anketa</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Prijavi se</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Korisnicko ime</label>
  		<input type="text" name="KorisnickoIme" >
  	</div>
  	<div class="input-group">
  		<label>Lozinka</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Prijavi se</button>
  	</div>
  	<p>
  		Nemate nalog? <a href="register.php">Registruj se</a>
  	</p>
  </form>
</body>
</html>