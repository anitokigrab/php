<!DOCTYPE html>
  <head>
  <!-- Required meta tags -->
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

.import label {
	font-family: Josefin Sans;
}
.import h2 {
	font-family: Lobster;
}
.upload h2 {
	font-family: Lobster;
}
.unzip h2 {
	font-family: Lobster;
}
</style>
  </head>
<body>
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
{echo '<div class="alert alert-success text-center" role="alert"><i class="fal fa-check-circle"></i> File berhasil diimport dan disimpan sebagai “<u><a title="Visit Link" href="./'.$file;
{echo '"><b><i class="far fa-external-link-square"></i> '.$file;
{echo '</b></a></u>”</div>';}}}
// File gagal di import.
else {echo '<div class="alert alert-danger text-center" role="alert"><i class="far fa-exclamation-circle"></i> Gagal mengimport file <b>'.basename($url).'';} echo '</b></div>';}
echo '<section id="import" class="import mb-4">
<div class="container">
<div class="row mb-3 pt-2">
<div class="col text-center">
<h2>Import File Menu</h2>
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
<div class="col text-center">
<h2>Upload File Menu</h2>
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
if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) { echo '<div class="alert alert-success text-center" role="alert">File “<u><b><a title="Visit Link" href="./'.$_FILES['file']['name'].'">'.$_FILES['file']['name'].'</a></b></u>” berhasil diupload...!!!</div><br/>'; }
else { echo '<div class="alert alert-danger text-center" role="alert">File gagal diupload...!!!</div><br/>'; }
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
        self::$status = '<div class="alert alert-primary text-center" role="alert"><b>File .ZIP atau .GZ berhasil ditemukan, silahkan pilih untuk di ekstrak.</b></div>';
      }
      else {
        self::$status = '<div class="alert alert-danger text-center" role="alert"><b>Tidak dapat menemukan file .ZIP atau .GZ didalam folder ini.</b></div>';
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
      self::$status = '<div class="alert alert-danger text-center" role="alert">Your PHP version does not support unzip functionality.</div>';
      return;
    }

    $zip = new ZipArchive;

    // Check if archive is readable.
    if ($zip->open($archive) === TRUE) {
      // Check if destination is writable
      if(is_writeable($destination . '/')) {
        $zip->extractTo($destination);
        $zip->close();
        self::$status = '<div class="alert alert-success text-center" role="alert"><b>File berhasil di ekstrak :)</b></div>';
      }
      else {
        self::$status = '<div class="alert alert-danger text-center" role="alert">Directory not writeable by webserver.</div>';
      }
    }
    else {
      self::$status = '<div class="alert alert-danger text-center" role="alert">Tidak dapat membaca file ZIP atau GZ.</div>';
    }
  }

  public static function extractGzipFile($archive, $destination) {
    // Check if zlib is enabled
    if(!function_exists('gzopen')) {
      self::$status = '<div class="alert alert-danger text-center" role="alert">Your PHP has no zlib support enabled.</div>';
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
      self::$status = '<div class="alert alert-success text-center" role="alert"><b>File berhasil di ekstrak :)</b></div>';
    }
    else {
      self::$status = '<div class="alert alert-danger text-center" role="alert"><b>Error mengekstrak file!</b></div>';
    }
  }
}
?>
<section id="unzip" class="unzip mb-4">
<div class="container">
<div class="row mb-3 pt-2">
<div class="col text-center">
<h2>Unzip File Menu</h2>
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
<hr/>
<table width="100%"><tr><td style="text-align:left;"><a href="." title="Back to directory">« Back to Directory</a></td><td style="text-align:right;">Script coded by <a title="st4zz Blog" href="http://blog.st4zz.io" target="_blank">./st4zz</a></td></tr></table>
</body>
</html>
