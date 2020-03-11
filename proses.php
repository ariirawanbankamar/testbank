
<?php 
session_start();
include 'database.php';
$db = new database();
$id_deb =$_POST['id_debtor'];
$nama = $_POST['name_debtor'];
$nama2 = $_POST['name_debtor2'];
$ktp = $_POST['ktp_debtor'];
$lamount = $_POST['loan_amount'];
$lperiod=$_POST['loan_period'];
$lpurpose= $_POST['loan_purpose'];
$dob =$_POST['dob_debtor'];
$sex = $_POST['sex_debtor'];
$aksi = $_GET['aksi']; 
$verktp = substr($ktp,6,6) ;
$verktpmo = substr($ktp,8,2) ;
$verktpyr = substr($ktp,10,2) ;
$verktpcw = substr($verktp,0,2) -40 ;
$verktpco = substr($verktp,0,2)  ;
$verdob = date("d", strtotime($dob));
$verdobmo = date("m", strtotime($dob)); 
$verdobyr = date("y", strtotime($dob)); 
// var_dump($verktpmo);var_dump($verdobmo);die; 
if($aksi == "tambah"){ 
  if ((($verktpco == $verdob) && ($sex <> '1')) or 
  (($verktpcw == $verdob) && ($sex <> '2'))
  ) {
    $_SESSION["errordate"] = "Jenis Kelamin Beda dengan KTP";
    header("location:index.php");
  } else if ((($verktpco <> $verdob) && ($sex == '1')) or
  (($verktpcw <> $verdob) && ($sex == '2'))){    
    $_SESSION["errordate"] = "DOB beda dengan KTP";
    header("location:index.php");
 }
  
 else if ($verktpmo !== $verdobmo) {
  $_SESSION["errordate"] = "Month didn't match with KTP";
 }else if ($verktpyr !== $verdobyr) {
  $_SESSION["errordate"] = "Year didn't match with KTP";
 }

  else {
    $res1 = "1";
  }
  if ($lamount <'1000' OR $lamount >'10000' ) {
    $_SESSION["erroramount"] = "Please input loan amount between 1000 and 10000";
    header("location:index.php");
  }else {
    $res2 = "1";
    header("location:index.php");
  }

  
  if ($res1 == '1' && $res2 == '1') {
    $db->input($nama,$nama2,$ktp,$lamount,$lperiod,$lpurpose,$dob,$sex);
    $_SESSION["input"] = "Data has been added !";
  }
   header("location:index.php"); 
  
 } 
 elseif($aksi == "hapus"){ 	
 	$db->hapus($_GET['id']);
	header("location:index.php");
 }
 elseif($aksi == "update"){
  if ((($verktpco == $verdob) && ($sex <> '1')) or 
  (($verktpcw == $verdob) && ($sex <> '2'))
  ) {
    $_SESSION["errordate"] = "Jenis Kelamin Beda dengan KTP";
  } else if ((($verktpco <> $verdob)   && ($sex == '1')) or
  (($verktpcw <> $verdob)  && ($sex == '2')))
  {    
    $_SESSION["errordate"] = "Date didn't match with KTP";
 } else if ($verktpmo !== $verdobmo) {
  $_SESSION["errordate"] = "Month didn't match with KTP";
 }else if ($verktpyr !== $verdobyr) {
  $_SESSION["errordate"] = "Year didn't match with KTP";
 }
 else {
  $res1 = "1";
}


if ($lamount <'1000' OR $lamount >'10000' ) {
  $_SESSION["erroramount"] = "Please input loan amount between 1000 and 10000";
}else {
  $res2 = "1";
}

if ($res1 == '1' && $res2 == '1') {
  $db->update($id_deb,$nama, $nama2,$ktp,$lamount,$lperiod,$lpurpose,$dob,$sex);
  $_SESSION["updated"] = "Data has been updated!";
}

 header("location:index.php"); 
 
 }
 elseif($aksi == "print") {
  $db->cetak($_GET['id']);
	header("location:cetak.php");
 }
 
?>
 