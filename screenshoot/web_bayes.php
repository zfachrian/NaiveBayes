<?php
require_once 'autoload.php';

$obj = new Bayes();

// echo $obj->sumData()."<br>";
// echo $obj->sumTrue()."<br>";
// echo $obj->sumFalse()."<br>";
// echo $obj->probUmur(21,0)."<br>";

$jumTrue = $obj->sumTrue();
$jumFalse = $obj->sumFalse();
$jumData = $obj->sumData();

$a1 = "<=30";
$a2 = "tinggi";
$a3 = "single";
$a4 = "tidak";

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
======================================<br>
umur : $a1<br>
gaji : $a2<br>
hubungan : $a3<br>
hutang : $a4<br>
=======================================<br><br>
";

echo "
======================================<br>
kemungkinan true : <br>
jumlah true : $jumTrue <br>
jumlah data : $jumData <br>
=======================================<br><br>
";

echo "
======================================<br>
kemungkinan false : <br>
jumlah false : $jumFalse <br>
jumlah data : $jumData <br>
=======================================<br><br>
";

echo "
======================================<br>
pATrue : $jumTrue / $jumData<br>
umur true : $umur / $jumTrue <br>
gaji true : $gaji / $jumTrue <br>
hubungan true : $hubungan / $jumTrue <br>
hutang true : $hutang / $jumTrue <br><br>
=======================================<br><br>
";

echo "
======================================<br>
pAFalse : $jumFalse / $jumData<br>
umur false : $umur2 / $jumTrue <br>
gaji false : $gaji2 / $jumTrue <br>
hubungan false : $hubungan2 / $jumTrue <br>
hutang false : $hutang2 / $jumTrue <br><br>
=======================================<br><br>
";

echo "
======================================<br>
presentasi yes : $paT<br>
presentasi no : $paF<br>
=======================================<br><br>
";

if($paT > $paF){
  echo "
  ======================================<br>
  PRESENTASI YES LEBIH BESAR DARI PADA PRESENTASI NO<br>
  =======================================
  <br><br>";
}else if($paF > $paT){
  echo "
  ======================================<br>
  PRESENTASI NO LEBIH BESAR DARI PADA PRESENTASI YES<br>
  =======================================
  <br><br>";
}

// echo $obj->hasilTrue($jumTrue,$jumData,$umur,$tinggi,$bb,$kesehatan,$pendidikan)."<br>";
// echo $obj->hasilFalse($jumTrue,$jumData,$umur2,$tinggi2,$bb2,$kesehatan2,$pendidikan2)."<br><br>";

$result = $obj->perbandingan($paT,$paF);
echo " Status : $result[0] <br>Presentasi diterima sebanyak : ".round($result[1],2)." % <br>Presentasi diolak sebanyak : ".round($result[2],2)." % ";
 ?>
