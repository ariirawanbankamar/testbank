<?php
include 'database.php'; 
include 'script.php';
$db = new database(); 
?>


<div class="container"> 
<br><br><br>
<h3 class="breadcrumb">Edit Debtor Data</h3>

<form action="proses.php?aksi=update" method="post">
<?php
foreach($db->edit($_GET['id']) as $d){
?>
<table>
	<tr>
		<td>First Name</td>
    <input type="hidden" name="id_debtor" value="<?php echo $d['id_debtor'] ?>">
		<td>
    <input required type="text" name="name_debtor" value="<?php echo $d['name_debtor'] ?>" class="form-control"></td>
	</tr>

	<tr>
		<td>Last Name</td>     
		<td>
    <input required type="text" name="name_debtor2" value="<?php echo $d['name_debtor2'] ?>" class="form-control"></td>
	</tr>

	<tr>
		<td>KTP</td>
		<td><input type="text" name="ktp_debtor" value="<?php echo $d['ktp_debtor'] ?>" class="form-control"></td>
	</tr>
	<tr>
		<td>Loan Amount</td>
		<td><input type="text" name="loan_amount" value="<?php echo $d['loan_amount'] ?>" class="form-control"></td>
	</tr>
  <tr>
		<td>Loan Period</td>
		<td><select name="loan_period" class="form-control">
    <option>--Select Period--</option>
    <?php foreach($db->period() as $p) { ?>
			<option 
          value="<?php echo $p['id_period']; ?>"
          <?php if( $_GET['id'] == $d['id_debtor'] && $d['loan_period'] == $p['id_period']) 
                { echo ' selected="selected"'; } ?>>
          <?php echo ($p['period_time']) ?> months
      </option>
		<?php } ?>
 
    </select></td>
	</tr>
  <tr>
		<td>Loan Purpose</td>
		<td><select   name="loan_purpose" class="form-control">
    <option>--Select Purpose--</option>
    <?php foreach($db->purpose() as $c) { ?>
			<option 
          value="<?php echo $c['id_purpose']; ?>"
          <?php if( $_GET['id'] == $d['id_debtor'] && $c['id_purpose'] == $d['loan_purpose']) 
                { echo ' selected="selected"'; } ?>>
          <?php echo ($c['desc_purpose']) ?> 
      </option>
		<?php } ?>
 </select></td>
	</tr>

  <tr>
		<td>Date of Birth</td>
		<td><input type="date" value="<?php echo $d['dob_debtor'] ?>" name="dob_debtor" class="form-control"></td>
	</tr>
  <tr>
		<td>Sex</td>
		<td>
    <label><input type="radio" name="sex_debtor" value="1" <?php if($d['sex_debtor']=='1') echo 'checked'?>>Male</label>
    <label><input type="radio" name="sex_debtor" value="2" <?php if($d['sex_debtor']=='2') echo 'checked'?>>Female</label>
   </td>
	</tr>
	<tr>
		<td><input class="form form-control btn btn-primary" type="submit" value="Simpan"></td>
		<td><a style="text-align:center" class="form form-control btn-danger" href="index.php">Back</a></td>
	</tr>
</table>
   <?php }?>
</form>
</div>