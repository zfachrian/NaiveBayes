<?php
require_once 'autoload.php';

$obj = new Bayes();

$jumTrue = $obj->sumTrue();
$jumFalse = $obj->sumFalse();
$jumData = $obj->sumData();

$a1 = $_POST['umur'];
$a2 = $_POST['gaji'];
$a3 = $_POST['hubungan'];
$a4 = $_POST['hutang'];

//TRUE
$umur = $obj->probUmur($a1,1);
$gaji = $obj->probGaji($a2,1);
$hubungan = $obj->probHubungan($a3,1);
$hutang = $obj->probhutang($a4,1);

//FALSE
$umur2 = $obj->probUmur($a1,0);
$gaji2 = $obj->probGaji($a2,0);
$hubungan2 = $obj->probHubungan($a3,0);
$hutang2 = $obj->probHutang($a4,0);

//result
$paT = $obj->hasilTrue($jumTrue,$jumData,$umur,$gaji,$hubungan,$hutang);
$paF = $obj->hasilFalse($jumTrue,$jumData,$umur2,$gaji2,$hubungan2,$hutang2);


echo "
<div class='jumbotron jumbotron-fluid' id='hslPrekdiksinya'>
  <div class='container'>
    <h1 class='display-4 tebal'>Hasil Prediksi</h1>
    <p class='lead'>Berikut ini adalah hasil prediksi berdasarkan data training menggunakan metode naive bayes.</p>
  </div>
</div>
";

echo "
<div class='card' style='width: 25rem;'>
  <div class='card-header' style='background-color:#17a2b8;color:#fff'>
    <b>Informasi Calon Pegawai</b>
  </div>
  <ul class='list-group list-group-flush'>
    <li class='list-group-item'>umur : &nbsp;&nbsp;<b>$a1</b></li>
    <li class='list-group-item'>gaji : &nbsp;&nbsp;<b>$a2</b></li>
    <li class='list-group-item'>status hubungan : &nbsp;&nbsp;<b>$a3</b></li>
    <li class='list-group-item'>hutang : &nbsp;&nbsp;<b>$a4</b></li>
  </ul>
</div><br>
<hr>
";

echo "<br>
<table class='table table-bordered' style='font-size:18px;text-align:center'>
  <tr style='background-color:#17a2b8;color:#fff'>
    <th>Jumlah True</th>
    <th>Jumlah False</th>
    <th>Jumlah Total Data</th>
  </tr>
  <tr>
    <td>$jumTrue</td>
    <td>$jumFalse</td>
    <td>$jumData</td>
  </tr>
</table>
";

echo "<br>
<table class='table table-bordered' style='font-size:18px;text-align:center'>
  <tr style='background-color:#17a2b8;color:#fff'>
    <th></th>
    <th>True</th>
    <th>False</th>
  </tr>
  <tr>
    <td>pA</td>
    <td>$jumTrue / $jumData</td>
    <td>$jumFalse / $jumData</td>
  </tr>
  <tr>
    <td>Umur</td>
    <td>$umur / $jumTrue</td>
    <td>$umur2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Gaji</td>
    <td>$gaji / $jumTrue</td>
    <td>$gaji2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Status Hubungan</td>
    <td>$hubungan / $jumTrue</td>
    <td>$hubungan2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Hutang</td>
    <td>$hutang / $jumTrue</td>
    <td>$hutang2 / $jumFalse</td>
  </tr>
</table>
";

echo "<br>
  <table class='table table-bordered' style='font-size:18px;text-align:center;'>
    <tr style='background-color:#17a2b8;color:#fff'>
      <th>Presentasi Diterima</th>
      <th>Presentasi Ditolak</th>
    </tr>
    <tr>
      <td>$paT</td>
      <td>$paF</td>
    </tr>
  </table>
";

$result = $obj->perbandingan($paT,$paF);

if($paT > $paF){
  echo "<br>
  <h3 class='tebal'>PRESENTASI <span class='badge badge-success' style='padding:10px'><b>BELI</b></span> LEBIH BESAR DARI PADA PRESENTASI TIDAK BELI</h3><br>";
  echo "<h4><br>Presentasi beli sebanyak : <b>".round($result[1],2)." %</b> <br>Presentasi tidak beli sebanyak : <b>".round($result[2],2)." % </b></h4>";
}else if($paF > $paT){
  echo "<br>
  <h3 class='tebal'>PRESENTASI <span class='badge badge-danger' style='padding:10px'><b>TIDAK BELI</b></span> LEBIH BESAR DARI PADA PRESENTASI BELI</h3><br>";
  echo "<h4><br>Presentasi tidak beli sebanyak : <b>".round($result[1],2)." %</b> <br>Presentasi beli sebanyak : <b>".round($result[2],2)." % </b></h4>";
}


if($result[0] == "DITERIMA"){
  echo "
  <div class='alert alert-success mt-5' role='aler'>
    <h4 class='alert-heading'>Kesimpulan : $result[0] </h4>
    <p>berdasarkan hasil prediksi , anda dinyatakan <b>membeli laptop!</b></p>
    <hr>
    <p class='mb-0'>- Have a nice day -</p>
  </div>";
}else{
  echo"
  <div class='alert alert-danger mt-5' role='aler'>
  <h4 class='alert-heading'>Kesimpulan : $result[0] </h4>
  <p>berdasarkan hasil prediksi , anda dinyatakan <b>tidak membeli!</p>
  <hr>
  <p class='mb-0'>- Don't give up ! -</p>
  </div>";
}


 ?>
