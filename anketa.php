<?php 
session_start();
if(!isset($_SESSION['KorisnickoIme'])){
    $_SESSION['msg']="Morate se prvo ulogovati";
    header('location:login.php');
}
if(isset($_GET['Odjavise'])){
    session_destroy();
    unset($_SESSION['KorisnickoIme']);
    header("location:login.php");
    }
	
	

?>
<script type="text/javascript">

function Poruka(){
    var inputElements = document.getElementById("poruka");
    for (var i = 0; i < inputElements.length-1; i++)
        { 
for (var j= 1; j < inputElements.length; j++){
            if (inputElements[i]==inputElements[j]){
                 alert("Niste odgovorili na pitanje 11."); 
                return false;
            } 
          
        }
}
          return true;
          
}

function validateForm1()
{  
     var i, chks = document.getElementsByName('izbor10[]');
    for (i = 0; i < chks.length; i++)
        if (chks[i].checked)
            return true;
            alert("Niste odgovorili na pitanje 10."); 
    return false;

    
    
    }
    
  /*  function validateForm(){
  var validation = true;
  validation &= validateForm1();
  validation &= Poruka();
  return validation;
}*/

</script>
<!DOCTYPE html>
<html>
<head>
<title>Emocionalna inteligencija</title>
<link rel="stylesheet" type="text/css" href="style2.css">
<style>
.kdugme {
background-color: rgba(49, 122, 151, 1);
color: #F0FFFF;
border-radius:10px;
width: 25%;
font-size: 110%;
margin-top: 1.3% auto;
height:40px;

}

.main-footer {
              padding: 30px;
              margin: auto;
              text-align:center;
             background-color:rgb(0,0,0,0.8);
             color:white;
            
}
</style>
</head>
<body>
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

<form method="GET" action="popunjena.php" onsubmit="return validateForm1()">
<p style="margin-left:25%;"><b><i>Poštovani , pred Vama se nalazi anketa koja je konstruisana u svrhu ispunjavanja predispitnih obaveza .  <br/>Pitanja se odnose na Vaš odnos prema sebi i drugima.
Popunite anketu  u odnosu na često prisutan osećanja i razmišljanja.</br> Nema pogrešnih odgovora.</b></i></p>
<table style="margin-left:35%; font-size:20px;">
<tr><td>

</td></tr>
<tr>
<td><b>1. Koliko godina imate ?</b> </td>
</tr>
<tr>

<td>
 <input type="radio" name="izbor1" value="Manjeod18" required>Manje od 18</br>
 <input type="radio" name="izbor1" value="Viseod18" required>Vise od 18<br>
<br/>
</td>
</tr>
<tr>
<td>
<b>2. Da li imate kontrolu nad svojim osećanjima?</b>
</td>
</tr>
<tr>
<td>
 <input type="radio" name="izbor2" value="Da" required> Da<br/>
 <input type="radio" name="izbor2" value="Ne" required> Ne<br/>
<br/>
</td>
</tr>

<tr>
<td><b>3. Znam kako cu odreagovati u odredjenim situacijama. </b> </td>
</tr>
<tr>
<td>
<input type="radio" name="izbor3" value="Uopstene" required > Uopste ne <br/>
<input type="radio" name="izbor3" value="Uglavnomne" required> Uglavnom ne<br/>
<input type="radio" name="izbor3" value="Kakokada" required> Kako kada<br/>
<input type="radio" name="izbor3" value="Uglavnomda" required> Uglavnom da<br/>
<input type="radio" name="izbor3" value="upotpunostida" required> U potpunosti da<br/>

<br/>
</td>
</tr>

<tr>
<td><b>4. Da li znate drugima da popravite raspoloženje? </b> </td>
</tr>
<tr>
<td>
 <input type="radio" name="izbor4" value="Da"required > Da<br/>
 <input type="radio" name="izbor4" value="Ne" required> Ne <br/>
<br/>
</td>
</tr>

<tr>
<td><b>5. Da li znate da obradujete prijatelja? </b> </td>
</tr>
<tr>
<td>
 <input type="radio" name="izbor5" value="Da" required> Da<br/>
 <input type="radio" name="izbor5" value="Ne" required> Ne <br/>

<br/>
</td>
</tr>

<tr>
<td><b>6. Kada mi se neko dopada, odmah mu to dam do znanja. </b> </td>
</tr>
<tr>
<tr>
<td>
 <input type="radio" name="izbor6" value="UopsteNe"  required> Uopste ne<br/>
 <input type="radio" name="izbor6" value="UglavnomNe" required> Uglavnom ne <br/>
 <input type="radio" name="izbor6" value="Kakokada" required> Kako kada<br/>
 <input type="radio" name="izbor6" value="UglavnomDa" required> Uglavnom da<br/>
 <input type="radio" name="izbor6" value="Predvece" required> U potpunosti da <br/>
 
<br/>
</td>
</tr>

<tr>
<td><b>7. Da li možete opisati svoje trenutno emocionalno stanje?</b> </td>
</tr>

<tr>
<td>
 <input type="radio" name="izbor7" value="Da" required> Da<br/>
 <input type="radio" name="izbor7" value="Ne" required> Ne<br/>
<br/>
</td>
</tr>

<tr>
<td><b>8. Kada se osećam srećno i raspoloženo lakše rešavam probleme.</b> </td>
</tr>
<tr>
<td>
 <input type="radio" name="izbor8" value="Da" required> Da<br/>
 <input type="radio" name="izbor8" value="Ne" required> Ne<br/>
 <input type="radio" name="izbor8" value="NestoDrugo" required> Nešto drugo<br/>

<br/>
</td>
</tr>


<tr>
<td><b>9. Da li možete saznati kako se neko oseća na osnovu izraza lica te osobe?</b> </td>
</tr>

<tr>
<td>
<input type="radio" name="izbor9" value="Uopstene" required> Uopste ne <br/>
<input type="radio" name="izbor9" value="Uglavnomne" required> Uglavnom ne<br/>
<input type="radio" name="izbor9" value="Kakokada" required> Kako kada<br/>
<input type="radio" name="izbor9" value="Uglavnomda" required> Uglavnom da<br/>
<input type="radio" name="izbor9" value="upotpunostida" required> U potpunosti da<br/>
<input type="radio" name="izbor9" value="NeInteresujeMe" required> Ne interesuje me <br/>


<br/>
</td>
</tr>


<tr>
<td><b>10. Koja su vaša najčešća osećanja? </b> </td>
</tr>

<tr>
<td>
 <input type="checkbox" name="izbor10[]"  value="Sreca" > Sreća<br/>
 <input type="checkbox" name="izbor10[]"  value="Tuga"> Tuga <br/>
 <input type="checkbox" name="izbor10[]"  value="Ljutnja"> Ljutnja<br/>
 <input type="checkbox" name="izbor10[]"   value="Strah"> Strah<br/>
 <input type="checkbox" name="izbor10[]" value="Iznenadjenost"> Iznenađenost <br/>
 <input type="checkbox" name="izbor10[]"  value="NestoDrugo"> Nesto drugo <br/>

<br/>
</td>
</tr>

<tr>
		<td><b>11. Zašto bas navedena osećanja iz prethodnog pitanja?</b></td>
	</tr>
	
	<tr>
		<td>
		 <textarea  maxlength="40"  minlength="8" rows="3" cols="30" id="poruka"  name="izbor11" value="textt" onfocus="this.value=''; setbg('#e5fff3');" 
    oninvalid="invalidComment(this);" required></textarea>
		 <br/>	 
		</td>
	</tr>

<tr>
		<td><b>12. Da li možete da prepoznate kako je neko raspoložen, ako možete na koji način?</b></td>
	</tr>
	
	<tr>
<td>
<select name="izbor12" id="odg"> 
 <option value="Prekoizrazalica" required>Preko izraza lica</option>
 <option value="Pokretatela" required>Pokreta tela</option>
  <option value="Nemoguprepoznati" required>Ne mogu prepoznati</option>
   <option value="Drugo" required>Ostalo..</option>

</select>

<br/>
</td>
</tr>
	<br>
	
	<br>
<tr>
<td>
<center><input  style="" type="submit"  value="Zavrsi" name="krajAnkete" class="kdugme" onclick="return confirm('Da li ste sigurni?')" >

</input> </center>
</td>
</tr>

</table>

</form>

<footer class="main-footer">
                <small>Copyright © 2020 Novi Pazar, Državni Univerzitet u Novom Pazaru</small>
            </footer>

</div>


</body>
</html>