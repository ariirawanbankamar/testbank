<?php
class database{

	var $host = "localhost";
	var $uname = "root";
	var $pass = "";
	var $dbd = "ari_irawan_bank_amar";
  var $conn = "";

	function __construct(){
		$this->conn=mysqli_connect($this->host, $this->uname, $this->pass,$this->dbd);
     
  }

   

  function tampil_data_purpose(){
     
    $data = "select * from purpose";
    $result=mysqli_query($this->conn,$data);
   
    return $result;
  }

  function period(){
     
    $data = "select * from period";
    $result=mysqli_query($this->conn,$data);
   
    return $result;
  }

  function purpose(){
     
    $data = "select * from purpose";
    $result=mysqli_query($this->conn,$data);
   
    return $result;
  }

  function tampil_data(){
     
    $data = 
    "SELECT * FROM debtor as a 
    join purpose as b on a.loan_purpose = b.id_purpose
    join period as c on c.id_period = a.loan_period";
    $result=mysqli_query($this->conn,$data);
   
    return $result;
  }


  function input($nama,$nama2,$ktp,$lamount,$lperiod,$lpurpose,$dob,$sex){
     
    mysqli_query($this->conn,"insert into debtor values
     ('','$nama','$nama2','$ktp','$lamount','$lperiod','$lpurpose','$dob','$sex')
    
    ");
  }

  // function input2($dob){
  //   mysqli_query($this->conn,"truncate table temp");
  //   mysqli_query($this->conn,"insert into temp values
  //   ('','$dob')");
  // }

  // function cek_valid($dob){
  //   mysqli_query($this->conn,"select dob from temp");
    
    
  // }

  function hapus($id){
     
    $data = mysqli_query($this->conn,"delete from debtor where id_debtor='$id'");
    while($d = mysqli_fetch_array($data)){
      $hasil[] = $d;
    }
    return $hasil;
  }

  function edit($id){
     
    $data = mysqli_query($this->conn,"select * from debtor where id_debtor='$id'");
    while($d = mysqli_fetch_array($data)){
      $hasil[] = $d;
    }
    return $hasil;
  }

  function update($id,$nama,$nama2,$ktp,$lamount,$lperiod,$lpurpose,$ldob,$lsex){
     
    mysqli_query($this->conn,"update debtor set name_debtor='$nama',name_debtor2='$nama2', 
    ktp_debtor='$ktp', loan_amount='$lamount', 
    loan_period='$lperiod', loan_purpose='$lpurpose', dob_debtor='$ldob',
     sex_debtor='$lsex'
    where id_debtor='$id'");
  }

}