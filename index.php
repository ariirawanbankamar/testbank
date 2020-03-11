<?php


include 'database.php';
include 'script.php';
$db = new database();
session_start();
?>

<!doctype html>
<html lang="en">
  <head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Test Bank Amar</title>
  </head>
  <body>
  <div class="container">
  <br><br><br>
    <h1 class="breadcrumb">Data Debitur</h1>
    
    <a class="btn btn-primary" href="input.php">Input Data</a><br><br><br>
<?php 
if (!empty($_SESSION["errordate"])) {?>
 <div class="btn btn-warning">
<?php echo $_SESSION["errordate"];   ?></div> 
<?php echo "<br>";echo "<br>";}
 if (!empty($_SESSION["erroramount"])) { ?>
<div class="btn btn-warning">
<?php echo $_SESSION["erroramount"]; ?></div><?php echo "<br>";echo "<br>"; } ?>
<?php
if (!empty($_SESSION["input"])) { ?>
  <div class="btn btn-success">
  <?php echo $_SESSION["input"]; ?></div><?php echo "<br>";echo "<br>"; }  
  if (!empty($_SESSION["updated"])) { ?>
<div class="btn btn-success">
<?php echo $_SESSION["updated"]; ?></div><?php echo "<br>";echo "<br>"; } ?>

<table class="table ">
  <thead class="thead-light">
    <tr>
      <th scope="col">No</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">KTP</th>
      <th scope="col">Loan Amount</th>      
      <th scope="col">Loan Period</th>      
      <th scope="col">Loan Purpose</th>      
      <th scope="col">Date of Birth</th>    
      <th scope="col">Sex</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php $r=1;
if ($db->tampil_data()->num_rows =='0' or $db->tampil_data()->num_rows ==null ) { ?>
  <tr>
   
  <td colspan="10" style="text-align:center">Data Kosong</td>
    
</tr>
<?php
} else {
foreach($db->tampil_data() as $x){
?>
    <tr>
      <th scope="row"><?php echo $r;?></th>
      <td><?php echo $x['name_debtor']; ?></td>
      <td><?php echo $x['name_debtor2']; ?></td>
      <td><?php echo $x['ktp_debtor']; ?></td>
      <td><?php echo $x['loan_amount']; ?></td>
      <td><?php echo $x['period_time']; ?> months</td>
      <td><?php echo $x['desc_purpose']; ?></td>
      <td><?php echo date('d M Y', strtotime($x['dob_debtor'])); ?></td>
      <td><?php  if ($x['sex_debtor']=='1') 
          { echo "Male";} 
            else if ($x['sex_debtor']=='2') 
          {echo "Female";} 
            else 
          { echo "Error";} ?>
      </td>
      <td>
        <a class="btn btn-mini btn-info btn-sm" href="edit.php?id=<?php echo $x['id_debtor']; ?>&aksi=edit">Edit</a>
        <a class="btn btn-mini btn-danger btn-sm" href="proses.php?id=<?php echo $x['id_debtor']; ?>&aksi=hapus">Delete</a>
        <a class="btn btn-mini btn-danger btn-sm" href="cetak.php?id=<?php echo $x['id_debtor']; ?>&aksi=print">To PDF</a>      
      </td>
    </tr>
<?php $r++;} }?>
  </tbody>
  <tfoot class="table-info">
    <tr>
      <th colspan="9"></th>
      <th colspan="1">By : Ari Irawan</th>
    </tr>
  </tfoot>
</table>
</div>
  
    </body>
</html>
<?php session_destroy()?>