<?php
session_start();
include 'database.php';
include 'script.php';
$db = new database();
?>

<div class="container">
<br><br><br>
<h1 class="breadcrumb">Bank Amar</h1>

<h3>Add Debtor Data</h3>
<div id="error"></div>
<form id="form" action="proses.php?aksi=tambah" method="post">
	
<table>
	<tr>
		<td>First Name</td>
		<td><input required type="text"  name="name_debtor" class="form-control"></td>
	</tr>

	<tr>
		<td>Last Name</td>
		<td><input required type="text"   name="name_debtor2" class="form-control"></td>
	</tr>
 
	<tr>
		<td>KTP</td>
		<td><input type="text"  name="ktp_debtor" class="form-control"></td>
	</tr>
	<tr>
		<td>Loan Amount</td>
		<td><input type="text"   name="loan_amount" class="form-control"></td>
	</tr>
  <tr>
		<td>Loan Period</td>
		<td><select name="loan_period"   class="form-control">
    <option>--Select Period--</option>
    <option value="1">12 mos</option>
    <option value="2">18 mos</option>
    <option value="3">24 mos</option>    
    <option value="4">30 mos</option>
    <option value="5">36 mos</option>    
    <option value="6">42 mos</option>
    <option value="7">48 mos</option>
    </select></td>
	</tr>
  <tr>
		<td>Loan Purpose</td>
		<td><select   name="loan_purpose"  class="form-control">
    <option>--Select Purpose--</option>
    <?php $r=1;
   foreach($db->tampil_data_purpose() as $x){
  ?>

    <option class="form-control" value="<?=$x['id_purpose']?>"> <?= $r.' - '.$x['desc_purpose']?></option>
    <?php
      $r++;}
    ?>
 </select></td>
	</tr>

  <tr>
		<td>Date of Birth</td>
		<td><input type="date" name="dob_debtor"   class="form-control"></td>
	</tr>
  <tr>
		<td>Sex</td>
		<td>
      <input type="radio" name="sex_debtor"  value="1"  >Male
      <input type="radio" name="sex_debtor"  value="2"  >Female
    </td>
	</tr>
	<tr>
		<td><input class="form form-control btn btn-primary" type="submit" value="Simpan"></td>
		<td><a style="text-align:center" class="form form-control btn-danger" href="index.php">Back</a></td>
	</tr>
</table>
</form>
</div>

 