<?php

session_start();
if(empty($_SESSION['KorisnickoIme']))
{
  header("Location: register.php");
  exit();
}

$servername="localhost";
$Username="root";
$passw="";
$dbName="anketa";

$konekcija = mysqli_connect($servername,$Username,$passw,$dbName);
if(!$konekcija)
{
    die("Konekcija nije uspela: ".mysqli_connect_error());
}

$upit = "SELECT odgovor8, count(*) as broj FROM pitanja GROUP BY odgovor8";
$rez = mysqli_query($konekcija,$upit);



?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
    width: 99%;
    height: 99%;
  font-size: 120%;
 margin: 1% 1% 1% 1%;
}
</style>
<title>Rezultati ankete</title>
<link rel="stylesheet" type="text/css" href="style2.css">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
   <script type="text/javascript">
   google.charts.load('current',{'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);
   function drawChart(){
	   var data=google.visualization.arrayToDataTable([
	   ['Opredeljenje','Broj'],
	   <?php 
	   while($row=mysqli_fetch_array($rez))
	   {
		   echo "['".$row["odgovor8"]."',".$row["broj"]."],";
	   }
	   ?>
	   ]);
	   var options={
		   title: 'Kada se osecam sretno lakse resavam probleme.' ,
		   is3D: true,
		   pieHole: 0.16,
		   titleTextStyle:{
			   color:'black',
			   fontSize:24 ,
			   
			   
		   },
		   fontSize:24,
		   legend: {textStyle: {color:'black'}}
	   };
	   var chart= new google.visualization.PieChart(document.getElementById('grafikon'));
       chart.draw(data, options); 
 }
 
  function Chart(){
	   var data=google.visualization.arrayToDataTable([
	   ['Opredeljenje','Broj'],
	   <?php 
	   while($row=mysqli_fetch_array($rez))
	   {
		   echo "['".$row["odgovor10"]."',".$row["broj"]."],";
	   }
	   ?>
	   ]);
   var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Density of Precious Metals, in g/cm^3",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById('grafikom1'));
      chart.draw(view, options);
 }
 </script>
</head>
<body>
    <div clas="odj">
<?php if(isset($_SESSION['KorisnickoIme'])):?>
    <p>Prijavljeni korisnik je<strong> <?php echo $_SESSION['KorisnickoIme'];?></strong></p>

<p><a href="login.php?Odjavise='1'" style="color:red;">Odjavi se</a></p>
<?php endif?>
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
  <li><a class="active" href="admin.php">Rezultati ankete</a></li>
  <li><a href="rezultati.php">Grafikon</a></li>
 
  
</ul>

<br /><br />  
           <div class="veliki">   
                <br />  
                <div id="grafikon"  ></div>  
           </div>  
 

<div style=" background:rosybrown;;margin-right:3%;margin-left:3%"><p><center>
Copyright © 2020 Novi Pazar, Državni Univerzitet u Novom Pazaru</center>
</p>
</div>
</body>
</html>