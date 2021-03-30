<?php
class Bayes
{
  private $pegawai = "data.json";
  // private $jumTrue = 0;
  // private $jumFalse = 0;
  // private $jumData = 0;

  function __construct()
  {

  }

  /*================================================================
  FUNCTION SUM TRUE DAN FALSE
  =================================================================*/
  function sumTrue()
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach($hasil as $hasil)
    {
      if($hasil['status'] == 1){
        $t += 1;
      }
    }

    return $t;
  }

  function sumFalse()
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach($hasil as $hasil)
    {
      if($hasil['status'] == 0){
        $t += 1;
      }
    }
    return $t;
  }

  function sumData()
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);
    return count($hasil);
  }

  //=================================================================

  /*================================================================
  FUNCTION PROBABILITAS
  =================================================================*/
  function probUmur($umur,$status)
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if($hasil['umur'] == $umur && $hasil['status'] == $status){
        $t += 1;
      }else if($hasil['umur'] == $umur && $hasil['status'] == $status){
        $t +=1;
      }
    }
    return $t;
  }

  function probGaji($gaji,$status)
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if($hasil['gaji'] == $gaji && $hasil['status'] == $status){
        $t += 1;
      }else if($hasil['gaji'] == $gaji && $hasil['status'] == $status){
        $t +=1;
      }
    }
    return $t;
  }

  function probHubungan($hubungan,$status)
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if($hasil['hubungan'] == $hubungan && $hasil['status'] == $status){
        $t += 1;
      }else if($hasil['hubungan'] == $hubungan && $hasil['status'] == $status){
        $t +=1;
      }
    }
    return $t;
  }

  function probHutang($hutang,$status)
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if($hasil['hutang'] == $hutang && $hasil['status'] == $status){
        $t += 1;
      }else if($hasil['hutang'] == $hutang && $hasil['status'] == $status){
        $t +=1;
      }
    }
    return $t;
  }

  //=================================================================

  /*=================================================================
  MARI BERHITUNG
  keterangan parameter :
  $sT   : jumlah data yang bernilai true ( sumTrue )
  $sF   : jumlah data yang bernilai false ( sumFalse )
  $sD   : jumlah data pada data latih ( sumData )
  $pU   : jumlah probabilitas umur ( probUmur )
  $pG   : jumlah probabilitas gaji ( probGaji )
  $pH   : jumlah probabilitas hubungan ( probHubungan )
  $pHut : jumlah probabilitas hutang (probHutang )
  ==================================================================*/

  function hasilTrue($sT = 0 , $sD = 0 , $pU = 0 ,$pG = 0, $pH= 0, $pHut = 0)
  {
    $paTrue = $sT / $sD;
    $p1 = $pU / $sT;
    $p2 = $pG / $sT;
    $p3 = $pH/ $sT;
    $p4 = $pHut / $sT;
    $hsl = $paTrue * $p1 * $p2 * $p3 * $p4;
    return $hsl;
  }

  function hasilFalse($sF = 0 , $sD = 0 , $pU = 0 ,$pG = 0, $pH= 0, $pHut = 0)
  {
    $paFalse = $sF / $sD;
    $p1 = $pU / $sF;
    $p2 = $pG / $sF;
    $p3 = $pH/ $sF;
    $p4 = $pHut / $sF;
    $hsl = $paFalse * $p1 * $p2 * $p3 * $p4;
    return $hsl;
  }

  function perbandingan($pATrue,$pAFalse)
  {
    if($pATrue > $pAFalse){
      $stt = "DITERIMA";
      $hitung = ($pATrue / ($pATrue + $pAFalse)) * 100;
      $diterima = 100 - $hitung;
    }elseif($pAFalse > $pATrue)
    {
      $stt = "DITOLAK";
      $hitung = ($pAFalse / ($pAFalse + $pATrue)) * 100;
      $diterima = 100 - $hitung;
    }

    $hsl = array($stt,$hitung,$diterima);
    return $hsl;
  }
  //=================================================================
}

?>
