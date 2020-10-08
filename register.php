<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Anketa o emocionalno inteligenciji</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Registracija</h2>
  </div>
	
  <form method="post" action="register.php" name="formReg" onSubmit="Validacija()">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Korisnicko ime</label>
  	  <input type="text" name="KorisnickoIme" value="<?php echo $KorisnickoIme; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="text" name="Email" value="<?php echo $Email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Lozinka</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Potvrdi lozinku</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Registruj se</button>
  	</div>
  	<p>
Vec ste se registrovali? <a href="login.php">Uloguj se</a>
  	</p>
  </form>
</body>
</html>

<script>
function Validacija(){
var val=document.forms["formaReg"]["KorisnickoIme"].value;
if(val.length<5 || !isNaN(val)){
    alert("Unesite Korisnicko ime mora sadrzati vise karaktera");
    return false;
}
var val1=document.formas["formReg"]["password_1"].value;
if(val1.length<5){
    alert("Lozinka mora sadrzati najmanje 8 karaktera.");
    return false;
}
var val2=document.forms["formaReg"]["password_2"].value;
if(val2.length<5){
    alert("Lozinka mora sadrzati najmanje 8 karaktera.");
return false;
}


}

</script>