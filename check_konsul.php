<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../index.php');
	exit();
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'laravel';
$DATABASE_PASS = 'lessweak!_@123';
$DATABASE_NAME = 'laravel';
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if (empty($_POST['idgejala'])) {
	// One or more values are empty.
	die ('Please check the symptom that you feel.<a href=konsultasi.php>kembali</a>');
}
//Users can only consultation once (for now)
if ($stmt = $conn->prepare('SELECT id_penyakit FROM tb_konsul WHERE id_pasien = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_SESSION['id']);
	$stmt->execute();
	$stmt->store_result();
	
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		echo 'Sesi anda telah usai.<a href="home.php">kembali</a>';
	} else {
   		if ($stmt = $conn->prepare('INSERT INTO tb_konsul (date, id_pasien, id_gejala, id_penyakit, penyakit) VALUES (?, ?, ?, ?, ?)')) {
     		// We do not want to expose gejala in our database.
			$date = date("Y/m/d");
     		$stmt->bind_param('sssss', $date, $id, $cv_str, $id_sick, $sick);
     		$jum=$_POST['jum'];
		
			//Desease variable with symtoms values
			$P01=array("G04","G06","G07","G09","G10");
			$P1=array("G04","G06","G07","G09","G15");
			$P02=array("G01","G02","G03","G05","G08","G11","G12","G13","P01");
			$P03=array("G14","G15","G16","P02");
			$P04=array("G01","G02","G03","G05","G08","G17","G18","P03");
		
			$id=$_SESSION['id'];
			$vks=$_POST['idgejala'];
			$id_penyakit = 'none';
			
			//Influenza
			if (count($_POST['idgejala']) == count($P1)) { 
				if ($vks[0] == $P1[0] and $vks[1] == $P1[1] and $vks[2] == $P1[2] and $vks[3] == $P1[3] and $vks[4] == $P1[4]) {
					//$val=count($P1); $val-=1; echo '<br>'; if ($_POST['idgejala'][$val]==$P1[$val]) {
					$id_penyakit="P1";
					$penyakit="Influenza";
				} elseif ($vks[0] == $P1[0] and $vks[1] == $P1[1] and $vks[2] == $P1[2] and $vks[3] == $P1[3] and $vks[4] == $P01[4]) {
					$id_penyakit="P01";
					$penyakit="Influenzaa";
				} else { 
					$penyakit="Gejala tidak terdefinisi,";
					$id_penyakit="G00";
				}
			// Diabetes Melitus Tipe 1		 
			} elseif (count($_POST['idgejala']) == count($P02)) {
				if ($vks[0] == $P02[0] and $vks[1] == $P02[1] and $vks[2] == $P02[2] and $vks[3] == $P02[3] and $vks[4] == $P02[4] and $vks[5] == $P02[5] and $vks[6] == $P02[6] and $vks[7] == $P02[7] and $vks[8] == $P02[8]) {

					$id_penyakit="P02";
					$penyakit = "Diabetes Melitus Tipe 1";

				} else {
					$id_penyakit="G00";
					$penyakit="Gejala tidak terdefinisi";
				}
			//Diabetes Melitus Tipe 2
			} elseif (count($_POST['idgejala']) == count($P03)) {
				if ($vks[0] == $P03[0] and $vks[1] == $P03[1] and $vks[2] == $P03[2] and $vks[3] == $P03[3]) {
					$id_penyakit="P03";
					$penyakit = "Diabetes Melitus Tipe 2";
				} else {
					$id_penyakit="G00";
					$penyakit="Gejala tidak terdefinisi";
				}
			//Diabetes Melitus Kehamilan
			} elseif (count($_POST['idgejala']) == count($P04)) {
				if ($vks[0] == $P04[0] and $vks[1] == $P04[1] and $vks[2] == $P04[2] and $vks[3] == $P04[3] and $vks[4] == $P04[4] and $vks[5] == $P04[5] and $vks[6] == $P04[6] and $vks[7] == $P04[7]) {
					$id_penyakit="P04";
					$penyakit = "Diabetes Melitus Kehamilan";
				} else {
					$id_penyakit="G00";
					$penyakit="Gejala tidak terdefinisi";
				}
			} else {
				$id_penyakit="G00";
				$penyakit = "Gejala tidak terdefinisi";
			}
		
			$i = 0 and $i < $jum;
			$id_sick=$id_penyakit;
			$sick=$penyakit;
			$cv_str = implode(",",$_POST['idgejala']);
			$stmt->execute();
			
			header('Location: view/usermessage.php');
			}  
	} 
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}   

?>
