<?php
include 'functions.php';
if (empty($_SESSION['login']))
  header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Sistem Pendukung Keputusan (SPK) Metode Analytical Hierarchy Proccess(AHP) dan Technique For Others Reference by Similarity to Ideal Solution (TOPSIS) berbasis web dengan PHP dan MySQL. Studi kasus: pemilihan handphone." />
  <meta name="keywords" content="Sistem Pendukung Keputusan, Decision Support System, Analytical Hierarchy Proccess, AHP, Technique For Others Reference by Similarity to Ideal Solution, TOPSIS, Pemilihan Handphone, Tugas Akhir, Skripsi, Jurnal, Source Code, PHP, MySQL, CSS, JavaScript, Bootstrap, jQuery" />
  <meta name="author" content="herdikayan" />
  <link rel="icon" href="favicon.ico" />
  <link rel="canonical" href="http://ilmuskripsi.com" />

  <title>Source Code SPK Metode AHP dan TOPSIS</title>
  <link href="assets/css/flatly-bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/general.css" rel="stylesheet" />
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="?">AHP TOPSIS</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="<?= isActive(['periode', 'periode_tambah']) ?>" class="?m=periode"><a href="?m=periode&periode=<?= get('periode') ?>"><span class="glyphicon glyphicon-list-alt"></span> Periode</a></li>
          <li class="<?= isActive(['kriteria', 'rel_kriteria']) ?>" class="dropdown">
            <a href="?m=kriteria&periode=<?= get('periode') ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-th-large"></span> Kriteria <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li class="<?= isActive('kriteria') ?>"><a href="?m=kriteria&periode=<?= get('periode') ?>"><span class="glyphicon glyphicon-th-large"></span> Kriteria</a></li>
              <li class="<?= isActive('rel_kriteria') ?>"><a href="?m=rel_kriteria&periode=<?= get('periode') ?>"><span class="glyphicon glyphicon-th-list"></span> Nilai bobot kriteria</a></li>
            </ul>
          </li>
          <li class="<?= isActive(['alternatif', 'rel_alternatif']) ?>" class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Alternatif <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li class="<?= isActive('alternatif') ?>"><a href="?m=alternatif&periode=<?= get('periode') ?>"><span class="glyphicon glyphicon-user"></span> Alternatif</a></li>
              <li class="<?= isActive('rel_alternatif') ?>"><a href="?m=rel_alternatif&periode=<?= get('periode') ?>"><span class="glyphicon glyphicon-signal"></span> Nilai bobot alternatif</a></li>
            </ul>
          </li>
          <li class="<?= isActive('hitung') ?>"><a href="?m=hitung&periode=<?= get('periode') ?>"><span class="glyphicon glyphicon-calendar"></span> Perhitungan</a></li>
          <li class="<?= isActive('password') ?>"><a href="?m=password&periode=<?= get('periode') ?>"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
          <li class="<?= isActive('logout') ?>"><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
        <div class="navbar-text"></div>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container">
    <?php
    if (file_exists($mod . '.php')) {
      // cek periode
      if (is_null(get('periode'))) {
        $row = $db->get_row("SELECT * FROM tb_periode order by tahun desc limit 1");
        redirect_js("index.php?m=$mod&periode=$row->tahun");
        die;
      }

      $row = $db->get_row("SELECT * FROM tb_periode WHERE tahun='" . get('periode') . "'");
      if (is_null($row)) {
        echo <<<HTML
          <div class="page-header">
              <h1>Periode Tidak Ditemukan</h1>
          </div>
        HTML;
        die;
      }
      include $mod . '.php';
    } else {
      include 'home.php';
    }
    ?>
  </div>
  <footer class="footer bg-primary">
    <div class="container">
      <p>Copyright &copy; <?= date('Y') ?> BAGAS PERMANA SETIAWAN <em class="pull-right"></em></p>
    </div>
  </footer>
</body>

</html>