<?php
require_once __DIR__ . '/vendor/autoload.php';

include 'database.php';

$db = new database(); 
$mpdf = new \Mpdf\Mpdf();


foreach($db->cetak($_GET['id']) as $d){

  $r =  $d['name_debtor'].' - '.$d['ktp_debtor'] .'.pdf' ; 

if ($d['sex_debtor'] =='1') { $sx = "Male";} else { $sx = "Female"; };
$html.='<h1>Hai, '. $d['name_debtor'] .', here is your detail :</h1>
<table class="table">
<tr><td>First Name</td><td>'. $d['name_debtor'] .'</td></tr>
<tr><td>Last Name</td><td>'. $d['name_debtor2'] .'</td></tr>
<tr><td>KTP</td><td>'. $d['ktp_debtor'] .'</td></tr>
<tr><td>Loan Amount</td><td>'. $d['loan_amount'] .'</td></tr>
<tr><td>Loan Period</td><td>'. $d['period_time'] .'</td></tr>
<tr><td>Loan Purpose</td><td>'. $d['desc_purpose'] .'</td></tr>
<tr><td>Date of Birth</td><td>'. date('d M Y', strtotime($d['dob_debtor'])) .'</td></tr>
<tr><td>Sex</td><td>'. $sx .'</td></tr>

</table>';

$mpdf->WriteHTML($html);
$mpdf->Output($r,\Mpdf\Output\Destination::INLINE);
}