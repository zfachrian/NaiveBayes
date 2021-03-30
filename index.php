<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/x-icon" href="img/nbc.png" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />

  <!-- font awsome -->
  <link rel="stylesheet" href="css/fontawesome.css" />
  <link rel="stylesheet" href="css/brands.css" />
  <link rel="stylesheet" href="css/solid.css" />

  <link rel="stylesheet" href="css/gaya.css">

  <!-- google font -->
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700&display=swap" rel="stylesheet">

  <title>Tugas Naive Bayes</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">
            <img src="img/nbc.png" alt="" width=50 height=50>
          </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Naive Bayes
                  <span class="sr-only">(current)</span>
                </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data_simulasi.php">Data Latih</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <div class="container" style='margin-top:90px'>
      <div class="row">
        <div class="col-12 mt-5">
          <h2 class="tebal">Naive Bayes</h2>
          <p class="desc mt-4">Naïve Bayes Classifier merupakan sebuah metoda klasifikasi yang berakar pada teorema Bayes.
          Metode pengklasifikasian dengan menggunakan metode probabilitas dan statistik yg dikemukakan oleh ilmuwan Inggris Thomas Bayes,
          yaitu memprediksi peluang di masa depan berdasarkan pengalaman di masa sebelumnya sehingga dikenal sebagai Teorema Bayes.
          Ciri utama dr Naïve Bayes Classifier ini adalah asumsi yang sangat kuat (naïf) akan independensi dari masing-masing kondisi / kejadian.
          Menurut Olson Delen (2008) menjelaskan Naïve Bayes untuk setiap kelas keputusan, menghitung probabilitas dg syarat bahwa kelas keputusan adalah benar,
          mengingat vektor informasi obyek. Algoritma ini mengasumsikan bahwa atribut obyek adalah independen.
          Probabilitas yang terlibat dalam memproduksi perkiraan akhir dihitung sebagai jumlah frekuensi dari " master " tabel keputusan.</p>
        </div>
      </div>

    <div class="row">
      <div class="col-12 mt-4">
        <h3 class="tebal">Simulasi Probabilitas Pegawai Membeli Laptop.</h3>
      </div>

      <div class="col-6">
          <form method="POST" class="mt-3">

          <div class="form-group">
            <label for="umur">Umur :</label>
            <select name="umur" id="umur" class="form-control selBox" required="required">
                      <option value="" disabled selected>-- pilih umur anda--</option>
                      <?php
                      $data = array("<=30", "30...40", ">40");
                      for($i=0 ; $i < 3 ; $i++){
                        echo"<option value='$data[$i]'>$data[$i]</option>";
                      }
                      ?>
            </select>
          </div>

          <div class="form-group">
            <label for="umur">Gaji :</label>
            <select name="gaji" id="gaji" class="form-control selBox" required="required">
                <option value="" disabled selected>-- pilih gaji--</option>
                <option value="rendah">Rendah </option>
                <option value="sedang">Sedang</option>
                <option value="tinggi">Tinggi</option>
            </select>
          </div>

          <div class="form-group">
            <label for="umur">Status Hubungan :</label>
            <select name="hubungan" id="hubungan" class="form-control selBox" required="required">
                      <option value="" disabled selected>-- pilih status pernikahan--</option>
                      <option value="menikah">Menikah</option>
                      <option value="single">Single</option>
                  </select>
          </div>

          <div class="form-group">
            <label for="umur">Hutang :</label>
            <select name="hutang" id="hutang" class="form-control selBox" required="required">
                      <option value="" disabled selected>-- pilih hutang--</option>
                      <option value="punya">Punya</option>
                      <option value="tidak">Tidak</option>
                  </select>
          </div>

          <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-primary mt-3" id="dor" onclick="return simulasi()"/>
          </div>

          </form>
      </div>
    </div>
        
    <div class="row">
      <div class="col-12 mt-5 mb-5">
          <div id="hasilSIM" style="margin-bottom:30px;">

          </div>
      </div>
    </div>

    </div>

<!-- Footer -->
<footer class="page-footer font-small abu1">

  <!-- Footer Elements -->
  <div class="container">

    <!-- Grid row-->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-12 py-3">
        

        <div class="text-center">
          Made with <i class="fa fa-heart" style="color:#dc3545"></i> in My Home
        </div>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row-->

  </div>
  <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3 abu2">© <?php echo date('Y'); ?> Copyright
    <a href="https://linkedin.com/in/zfachrian">zfachrian</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.js"></script>
<script src="jspopper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- validasi -->
<script>
  $(document).ready(function(){
    $('.toggle').click(function(){
      $('ul').toggleClass('active');
    });
  });
</script>

<script>
  function simulasi()
  {
    var umur = $("#umur").val();
    var gaji = $("#gaji").val();
    var hubungan = $("#hubungan").val();
    var hutang = $("#hutang").val();

    //validasi
    var um = document.getElementById("umur");
    var tb = document.getElementById("gaji");
    var bb = document.getElementById("hubungan");
    var pp = document.getElementById("hutang");

    if(um.selectedIndex == 0){
      alert("Umur Tidak Boleh Kosong");
      return false;
    }

    if(tb.selectedIndex == 0){
      alert("Gaji Tidak Boleh Kosong");
      return false;
    }

    if(bb.selectedIndex == 0){
      alert("Hubungan Tidak Boleh Kosong");
      return false;
    }

    if(pp.selectedIndex == 0){
      alert("hutang Tidak Boleh Kosong");
      return false;
    }

    //batas validasi

      $.ajax({
        url :'simulasi.php',
        type : 'POST',
        dataType : 'html',
        data : {umur : umur , gaji : gaji , hubungan : hubungan , hutang : hutang},
        success : function(data){
          document.getElementById("hasilSIM").innerHTML = data;
        },
      });

      return false;

  }
</script>

<script>
$(document).ready(function(){
  $('#dor').click(function(){
    $('html, body').animate({
        scrollTop: $("#hasilSIM").offset().top
    }, 500);
  });
});
</script>
</body>
</html>
