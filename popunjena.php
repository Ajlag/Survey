<?php
if(isset($_GET['krajAnkete'])){
session_start();
$servername="localhost";
$Username="root";
$passw="";
$dbName="anketa";

$konekcija=mysqli_connect($servername,$Username,$passw,$dbName);
if(!$konekcija){
die("Konekcija nije uspela:".mysqli_connect_error());
}
$osoba=$_SESSION['KorisnickoIme'];

$odgovor10=implode(',',$_GET['izbor10']);

$odgovor1=$_GET['izbor1'];

$odgovor2=$_GET['izbor2'];
$odgovor4=$_GET['izbor4'];
$odgovor3=$_GET['izbor3'];
$odgovor5=$_GET['izbor5'];
$odgovor6=$_GET['izbor6'];
$odgovor7=$_GET['izbor7'];
$odgovor8=$_GET['izbor8'];
$odgovor9=$_GET['izbor9'];
$odgovor11=$_GET['izbor11'];
$odgovor12=$_GET['izbor12'];
if(empty($odgovor1) || empty($odgovor2) || empty($odgovor3) || empty($odgovor4) || empty($odgovor5)
|| empty($odgovor6) || empty($odgovor7) || empty($odgovor8) || empty($odgovor9) || empty($odgovor10) || empty($odgovor11)  || empty($odgovor12))
{
    header("Location: anketa.php?error=emptyfields");
    exit();
}

$ubaci = "INSERT INTO pitanja (Korisnik,odgovor1,odgovor2,odgovor3,odgovor4,odgovor5,odgovor6,
odgovor7,odgovor8,odgovor9,odgovor10,odgovor11,odgovor12) VALUES ('$osoba','$odgovor1','$odgovor2',
'$odgovor3','$odgovor4','$odgovor5','$odgovor6','$odgovor7','$odgovor8','$odgovor9','$odgovor10','$odgovor11','$odgovor12')";

$rezultatAnkete = mysqli_query($konekcija,$ubaci);

mysqli_close($konekcija);
header("Location: kraj.php");
exit();
}
else
{
    header("Location: anketa.php");
    exit();
}

 
?>