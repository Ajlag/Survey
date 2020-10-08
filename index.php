<?php 
  session_start(); 

  if (!isset($_SESSION['KorisnickoIme'])) {
  	$_SESSION['msg'] = "Morate se prvo ulogovati";
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
 
  
</ul>
<div class="uvod" style="margin-left:10%; font-size:25px;">
<center><h3 style="color:red;">Pažljivo pročitajte i naučite nesto novo</h3></center>


<H2 style="color:red;">Šta je emocionalna inteligencija?</h2>
<p>
<b>Emocionalna inteligencija </b>je skup znanja i veština iz oblasti emocija.
<br>
<i>Biti emocionalno inteligentan znači razumeti osećanja, znati kako nastaju i čemu služe.

</i>

<br>
<center><img src="image/slika5.jpg" style="width:20%;height:20%; float:right"></center>

</p>
<h2 style="color:red;">Kakve osobine ima emocionalno inteligentna osoba</h2>
<p>
<b>Dakle, ukoliko ste emocionlano inteligentni imate sledeće osobine:</b>
<br>
1.Samosvesni ste;
<br>
2.Znate prepoznati emocije i kod sebe i kod drugih i znate kako upravljati njima, ne dozvoljavate da one vama upravljaju;
<br>
3. Fleksibilni ste, nemate strah od promjena, čak štaviše uživate biti izvan svoje zone komfora. Mnogi su stava da život počinje upravo izvan vaše zone komfora; 
<br>
4.Empatični ste, imate izuzetnu sposobnost razumijevanja drugih ljudi, njihovih emocija, ponašanja; 
 <br>
5.Otvoreni ste i komunikativni, znate ko ste i koliko vrijedite, nisu vam potrebne potvrde od drugih ljudi; 
<br>
6. Znate reći NE drugim ljudima;
<br>
7. Svjesni ste kakav uticaj na vaše emocije imaju toksični ljudi, i upravo zbog toga ih i izbjegavate; 
<br>
8. Zahvalni ste, mnoga istraživanja pokazuju koliki značaj ima zahvalnost na vaš mozak - znatno smanjenje hormona stresa; 
<br>
9. Nisu vam važna tuđa mišljenja, a i svjesni ste da je i vaše mišljenje o drugima nebitno; 
<br>


 </p>
<img src="image/slika6.jpg" style="width:60%;height:60%; margin-left:15%;">
<br>
<p>
Na ovoj fotografiji možete vidjeti na koji način se emocije manifestuju u vašem organizmu. Depresija izaziva osjećaj otupljivanja u rukama, nogama i glavi, dok s druge strane ljubav izaziva osjećaj topline u cijelom organizmu.
</p>
</div>
</div>
<div style=" background:rosybrown;;margin-right:3%;margin-left:3%"><p><center>
Copyright © 2020 Novi Pazar, Državni Univerzitet u Novom Pazaru</center>
</p>
</div>
</body>
</html>