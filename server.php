<?php
session_start();

include 'konekcija.php';
// initializing variables
$KorisnickoIme = "";
$Email    = "";
$Tip="user";
$prijavljena="user";
$errors = array(); 

// connect to the database


// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $KorisnickoIme = mysqli_real_escape_string($db, $_POST['KorisnickoIme']);
  $Email = mysqli_real_escape_string($db, $_POST['Email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($KorisnickoIme)) { array_push($errors, "Unesite Korisnicko ime"); }
  if (empty($Email)) { array_push($errors, "Unesite email"); }
  if (empty($password_1)) { array_push($errors, "Unesite sifru"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Lozinke se ne poklapaju");
  }
 if (strlen($KorisnickoIme) < 4 || strlen($KorisnickoIme) > 30){
      array_push($errors, "Korisnicko ime mora sadrzati vise od 4 karaktera a manje od 30");
 }
  if (strlen($Email) < 6 ){
      array_push($errors, "Email ime mora sadrzati vise od 6 karaktera ");
 }


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM korisnici WHERE KorisnickoIme='$KorisnickoIme' OR Email='$Email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['KorisnickoIme'] === $KorisnickoIme) {
      array_push($errors, "Korisnicko ime vec postoji");
    }

    if ($user['Email'] === $Email) {
      array_push($errors, "Email vec postoji");
    }
  
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO korisnici (KorisnickoIme,Lozinka,Email,Tip) 
  			  VALUES('$KorisnickoIme', '$password', '$Email', 'user')";
  	mysqli_query($db, $query);
	$_SESSION['tip']=$Tip;
	
  	$_SESSION['KorisnickoIme'] = $KorisnickoIme;
  	$_SESSION['success'] = "Sada ste prijavljeni";
  	header('location: index.php');
  }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
  $KorisnickoIme = mysqli_real_escape_string($db, $_POST['KorisnickoIme']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($KorisnickoIme)) {
  	array_push($errors, "Unesite korisnicko ime");
  }
  if (empty($password)) {
  	array_push($errors, "Unesite lozinku");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM korisnici WHERE KorisnickoIme='$KorisnickoIme' AND Lozinka='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
		while($row=$results->fetch_assoc()){
			$_SESSION['Id']=$row['Id'];
			$_SESSION['Tip']=$row['Tip'];
  	  $_SESSION['KorisnickoIme'] = $KorisnickoIme;
	  $loginu=$row['Tip'];
		}
		if($_SESSION['Tip']=="user"){
		header('location:index.php');
			$_SESSION['success'] = "Sada ste prijavljeni";
			}
		else
		{
			if($_SESSION['Tip']=="admin"){
				header('location:admin.php');
					$_SESSION['success'] = "Sada ste prijavljeni";
			}
			else{
				header('location:anketa.php');
					$_SESSION['success'] = "Sada ste prijavljeni";
			}
		}
	
  	}else {
  		array_push($errors, "Pogresno korisnicko ime ili lozinka");
  	}
  }
}

?>