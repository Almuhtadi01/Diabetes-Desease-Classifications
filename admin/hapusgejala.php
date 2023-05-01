<?php
//include("showuser.php");
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedmin'])) {
	header('Location: ../index.php');
	exit();
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'laravel';
$DATABASE_PASS = 'lessweak!_@123';
$DATABASE_NAME = 'laravel';
// Try and connect using the info above.
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (!$conn) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if (empty($_POST['idgejala'])) {
	// One or more values are empty.
	die ('Please check at least one symptoms to be deleted.<a href=showgejala.php>kembali</a>');
}
//$dlid=$_GET['ID'];
$conv = implode($_POST['idgejala']);
//echo $conv;
//$sql = "SELECT * FROM tb_gejala WHERE id_gejala = '$conv'";
//$result = mysqli_query($conn, $sql);
//echo '<br>'.$sql;


//if (mysqli_num_rows($result)>0) {
   $stmt = $conn->prepare('DELETE FROM tb_gejala WHERE id_gejala = ? ');  		// We do not want to expose gejala in our database.
   $stmt->bind_param('s', $no);
   $length=count($_POST['idgejala']);
   //$jum=$_POST['idgejala'];
   for ($i=0; $i<$length; $i++){
       $No=$_POST['idgejala'][$i];
	   //echo $jum;
       
       //for ($x=0;$x<$length;$x++) {
		$no=$No;
		$stmt->execute();
       //}
   }

	echo 'berhasil menghapus. silakan kembali. <a href="showgejala.php">kembali</a>';
/*} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	//$jum=$_POST['jum'];
	echo '<br>';
	print_r ($_POST['idgejala']);
	//echo '<br>'.$jum;
}*/
?>
