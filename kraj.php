<?php 
  session_start(); 

  if (!isset($_SESSION['KorisnickoIme'])) {
  	$_SESSION['msg'] = "Morate se ulogovati";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['KorisnickoIme']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>Emocionalna inteligencija</title>
<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
    <div clas="odj">
<?php if(isset($_SESSION['KorisnickoIme'])):?>
    <p>Prijavljeni korisnik je<strong> <?php echo $_SESSION['KorisnickoIme'];?></strong></p>

<p><a href="login.php?Odjavise='1'" style="color:red;">Odjavi se</a></p>
<?php endif?>
</div>
<div class="naslov"> <h2>Anketa o emocionalnoj inteligenciji</h2>
</div>
<div class=""> <?php if(isset($_SESSION['success'])):?>
<div class="error success">
<h3>
<?php 
echo $_SESSION['success'];
unset($_SESSION['success']);
?>
</h3>

</div>
<?php endif?>

<ul>
  <li><a class="active" href="index.php">Pocetna strana</a></li>
  <li><a href="anketa.php">Anketa</a></li>
 <p style="display:block; margin-top:100px;padding:200px 320px; font-size:50px; background-color:white; ">Hvala što ste učestvovali u anketi!</p>

 
<div style=" background:rosybrown;margin-right:3%;margin-left:3%"><p><center>
Copyright © 2020 Novi Pazar, Državni Univerzitet u Novom Pazaru</center>
</p>
</div>
</body>
</html>