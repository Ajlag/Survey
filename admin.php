<?php 

include('server.php');
$servername="localhost";
$Username="root";
$passw="";
$dbName="anketa";

$konekcija=mysqli_connect($servername,$Username, $passw,$dbName);

if(!$konekcija){
	die("Konekcija nije uspela: ".mysqli_connect_error());
}
$_SESSION['loginstatus']="";
if(isset($_POST["submit"])){
	
	$s="select * from korisnici where KorisnickoIme='".$_POST["KorisnickoIme"]."' and Lozinka='".$_POST["Lozinka"]."'";
	
	$q=mysqli_query($konekcija,$s);
	$r=mysqli_num_rows($q);
	$data=mysqli_fetch_array($q);
	mysql_close($konekcija);
	if($r>0)
	{
		$_SESSION["KorisnickoIme"]=$_POST["KorisnickoIme"];
		$_SESSION["usertype"]=$data[2];
		$_SESSION['loginstatus']="yes";
		header("location:admin.php");
	}
	else
	{
		echo "<script>alert('Proverite Korisnicko ime i lozinku');</script>";
	}
}

if(isset($_GET['delete'])){
  $cekiraj = $_GET['checkbox'];
	foreach($cekiraj as $idb){
		$brisanje="DELETE FROM pitanja WHERE id=$idb";
		$rez=mysqli_query($konekcija,$brisanje);
		header("Location:admin.php");
		exit();
	}
}

$sql ="SELECT * FROM pitanja";
$upit=mysqli_query($konekcija,$sql);
$anketa=mysqli_fetch_all($upit,MYSQLI_ASSOC);

if(!isset($_SESSION['KorisnickoIme'])){
    $_SESSION['msg']="Morate se prvo ulogovati";
    header('location:login.php');
}
if(isset($_GET['Odjavise'])){
    session_destroy();
    unset($_SESSION['KorisnickoIme']);
    header("location:login.php");
    }



mysqli_close($konekcija);
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style2.css">
<style>

table, th, td {
    width: 100%;
    margin: auto;
    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;
   color: black;
    font-size: 100%;
}

.kdugme {
  background-color: rgba(49, 122, 151, 1); 
  color: white;
   width:20%; 
   height:50px;
   border: none;
border-radius:10px;
font-size: 110%;
margin-top: 1.3 auto%;
max-width: 7%;
min-width: 7%;
margin: auto;
margin-left: 49%;


}
</style>
</head>
<body>
  <div class="header">
  </div>
  <?php if(isset($_SESSION['KorisnickoIme'])):?>
    <p>Prijavljeni korisnik je<strong> <?php echo $_SESSION['KorisnickoIme'];?></strong></p>

<p><a href="login.php?Odjavise='1'" style="color:red;">Odjavi se</a></p>
<?php endif?>
<ul style="  width: 100%;">
  <li><a class="active" href="admin.php">Rezultati ankete</a></li>
  <li><a href="rezultati.php">Grafikon</a></li>
    
</ul>



<form action="admin.php" method="GET">
<center><p>Popunjene ankete</p></center>
<table>
<tr >
<th >ID</th> <th>Korisnik </th>  <th>Odgovor 1 </th>
<th >Odgovor 2 </th> <th>Odgovor 3 </th> <th>Odgovor 4 </th> <th>Odgovor 5 </th> <th>Odgovor 6 </th>
<th >Odgovor 7 </th> <th>Odgovor 8 </th> <th>Odgovor 9 </th> <th>Odgovor 10 </th> <th>Odgovor 11 </th> <th>Odgovor 12 </th><th>Brisanje</th>
</tr>
<?php foreach($anketa as $anketa) { 
    
                if($anketa['odgovor4']==$anketa['odgovor5']){
                    echo '<tr bgcolor="white">';
                }else{
                     echo '<tr bgcolor="red">';
                }
                ?>
    
            
<td> <?php echo $anketa['id'] ?> </td> <td> <?php echo $anketa['Korisnik']; ?> </td>
 <td> <?php echo $anketa['odgovor1']; ?> </td>
 <td> <?php echo $anketa['odgovor2']; ?> </td>
 <td> <?php echo $anketa['odgovor3']; ?> </td>
 <td> <?php echo $anketa['odgovor4'];  ?> </td> 
 <td> <?php echo $anketa['odgovor5']; ?> </td>
 <td > <?php echo $anketa['odgovor6']; ?> </td> 
 <td> <?php echo $anketa['odgovor7']; ?> </td>
 <td> <?php echo $anketa['odgovor8']; ?> </td> 
 <td> <?php echo $anketa['odgovor9']; ?> </td>
 <td> <?php echo $anketa['odgovor10']; ?> </td>
  <td> <?php echo $anketa['odgovor11']; ?> </td>
   <td> <?php echo $anketa['odgovor12']; ?> </td>


 <td> <input type="checkbox" name="checkbox[]"  value=<?php echo $anketa['id']; ?> /> </td>
</tr>
<?php } ?>
</table>

<br>
<input type="submit" name="delete" value="Obriši" class="kdugme" />
</form>

</body>
</html>