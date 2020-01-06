<?php
$dir = 'https://ani.shinoa.best';
$dir2 = 'Anime Shinoa';
$dir3 = 'Gratis Download Anime Terbaru';
$goover = 'RzetYH75bxcvw64PD2XSDEut7BDw2Ae2_-zwqFhGznA';
$bing = '9B3E4F2B4CF1036D32C4E16EB8EE86E1';
$alexa = 'aDPt0cfic67RHz0kReW5waPf3Ns';
function stazz($url){
    $curl = curl_init();
     $header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
    $header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
    $header[] = "Cache-Control: max-age=0";
    $header[] = "Connection: keep-alive";
    $header[] = "Keep-Alive: 300";
    $header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $header[] = "Accept-Language: en-us,en;q=0.5";
    $header[] = "Pragma: ";
    $referer = "http://www.google.com";
    $btext = rand(0,99999);
    $browser = 'Mozilla/5.0' . $btext;
 
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_USERAGENT, $browser);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_REFERER, $referer);
    curl_setopt($curl, CURLOPT_AUTOREFERER, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 60);
    curl_setopt($curl, CURLOPT_MAXREDIRS, 14);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
return curl_exec($curl);
  curl_close($curl);
}
function stazzx($url)
{
$ua="Nokia6020/2.0 (04.90) Profile/MIDP-2.0 Cofiguration/CLDC-1.1";
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_USERAGENT,$ua);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$exec=curl_exec($ch);
return $exec;
}
function ft($t,$f=':'){
if($t < 3600){
return sprintf("%02d%s%02d", floor($t/60)%60, $f, $t%60);}else{return sprintf("%02d%s%02d%s%02d", floor($t/3600), $f, ($t/60)%60, $f, $t%60);
}}
function cut($content,$start,$end){
if($content && $start && $end) {
$r = explode($start, $content);
if (isset($r[1])){
$r = explode($end, $r[1]);
return $r[0];}
return '';}
}
function gL($id){
$yt= strstr(stazzx('https://m.youtube.com/watch?v='.$id),'</form>');
$data = explode('<div>',cut($yt,'<table','</table>'));
$length = explode('<span',$data[1]);
return trim($length[0]);
}
function gV($id){
$yt= strstr(stazzx('https://m.youtube.com/watch?v='.$id),'</form>');
$data = explode('<div>',cut($yt,'<table','</table>'));
$views = explode('views',$data[2]);
return trim($views[0]);
}
function gN($id){
$yt= strstr(stazzx('https://m.youtube.com/watch?v='.$id),'</form>');
$title = cut($yt,'bold">','</');
return $title;
}
function crut($txt) {
$txt = preg_replace('/[^a-zA-Z0-9\.\(\)\-\'\"]/', ' ', trim(strtolower($txt)));
$txt = ucwords(str_replace('  ',' ',$txt));
return $txt;
}
function crut1($txt) {
$txt = preg_replace("/[^a-zA-Z0-9_\-\']/", "_", trim(strtolower($txt)));
$txt = str_replace("__","_",$txt);
return $txt;
}
$vst = explode(',','nk,w,.c,pa,om,:/,ht,/');

function crut2($txt) {
$txt = str_replace("_","+",str_replace(" ","+",trim($txt)));
return $txt;
}
$share2 = '<a href="http://fb.com/sharer.php?u=http://'.$_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI'].'" title="Share Facebook"><img src="'.$dir.'/img/f2.png" width="16" height="16" alt="Share Facebook" title="Share Facebook"></a> <a href="http://twitter.com/share?url=http://'.$_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI'].'" title="Share Twitter"><img src="'.$dir.'/img/t2.png" width="16" height="16" alt="Share Twitter" title="Share Twitter"></a>';

function cek($text){
$kata = array("telek","teleko");
$hasil = 0;
$jumlah = count($kata);
for($i=0; $i<=$jumlah; $i++){
if(strstr($text, $kata[$i])){
$hasil = 1; }}
return $hasil;
}
function hps($txt){
$txt=strtolower($txt);
$txt=preg_replace("/[^a-zA-Z0-9-]/", "-", trim($txt)); 
return preg_replace('/-+/','-', $txt);
return $txt; }

function hps1($txt){
$txt=preg_replace("/[^a-zA-Z0-9.-]/", " ", trim($txt)); 
return $txt; }

function ngegrab($url)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$uaa = $_SERVER['HTTP_USER_AGENT'];
curl_setopt($ch, CURLOPT_USERAGENT, "User-Agent: $uaa");
return curl_exec($ch);
}
function samgrab($url){$ch = curl_init(); curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, '1');
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$header[] = "Accept-Language: en";
$header[] = "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.0; de; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3
";
$header[] = "Pragma: no-cache";
$header[] = "Cache-Control: no-cache";
$header[] = "Accept-Encoding: gzip,deflate";
$header[] = "Content-Encoding: gzip";
$header[] = "Content-Encoding: deflate";
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$load = curl_exec($ch);
curl_close($ch);
return $load;
}

function dateyt($date)
{
$date = substr($date,0,10); 
$date = explode('-',$date);
$mn   = date('F',mktime(0,0,0,$date[1])); 
$dates= ''.$date[2].' '.$mn.' '.$date[0].''; 
return $dates;
}

function format_time($t) 
{
$sam = str_replace('PT','',$t);
$sam = str_replace('H',':',$sam);
$sam = str_replace('M',':',$sam);
$sam = str_replace('S','',$sam);
return $sam;
}

function format_angka($angka){
$rupiah=number_format($angka,0,',','.');return $rupiah;
}
function hap($t){
$t=str_replace('.','',$t);
$t=str_replace('_','',$t);
$t=urlencode($t);
$t=str_replace(' ','-',$t);
$t=str_replace('%20','-',$t);
$t=str_replace('+','-',$t); 
$t=str_replace('%26','',$t);
$t=str_replace('-----','-',$t); 
$t=str_replace('----','-',$t); 
$t=str_replace('---','-',$t); 
$t=str_replace('--','-',$t); 
$t=str_replace('%2A','',$t);
$t=str_replace('%2C','',$t);
$t=str_replace('%2D','',$t);
$t=str_replace('%2F','',$t);
$t=str_replace('%21','',$t);
$t=str_replace('%22','',$t);
$t=str_replace('%23','',$t);
$t=str_replace('%24','',$t);
$t=str_replace('%25','',$t);
$t=str_replace('%27','',$t);
$t=str_replace('%28','',$t);
$t=str_replace('%29','',$t);
$t=str_replace('%3A','',$t);
$t=str_replace('%3B','',$t);
$t=str_replace('%3C','',$t);
$t=str_replace('%3D','',$t);
$t=str_replace('%3E','',$t);
$t=str_replace('%3F','',$t);
$t=str_replace('%5B','',$t);
$t=str_replace('%5C','',$t);
$t=str_replace('%5D','',$t);
$t=str_replace('%5E','',$t);
$t=str_replace('%5F','',$t);
$t=str_replace('%40','',$t);
$t=str_replace('%7B','',$t);
$t=str_replace('%7C','',$t);
$t=str_replace('%7D','',$t);
$t=str_replace('%7E','',$t);
$t=str_replace('%7F','',$t);
$t=urldecode($t);
$t=strtolower($t);
$t=str_replace('-','+',$t); 
return $t;
}

function hap1($t){
$t=str_replace('.','',$t);
$t=str_replace('_','',$t);
$t=urlencode($t);
$t=str_replace('%20','-',$t);
$t=str_replace(' ','-',$t);
$t=str_replace('-----','-',$t); 
$t=str_replace('----','-',$t); 
$t=str_replace('---','-',$t); 
$t=str_replace('--','-',$t); 
$t=str_replace('-','+',$t);
$t=str_replace('%2A','',$t);
$t=str_replace('%2C','',$t);
$t=str_replace('%2D','',$t);
$t=str_replace('%2F','',$t);
$t=str_replace('%21','',$t);
$t=str_replace('%22','',$t);
$t=str_replace('%23','',$t);
$t=str_replace('%24','',$t);
$t=str_replace('%25','',$t);
$t=str_replace('%26','',$t);
$t=str_replace('%27','',$t);
$t=str_replace('%28','',$t);
$t=str_replace('%29','',$t);
$t=str_replace('%3A','',$t);
$t=str_replace('%3B','',$t);
$t=str_replace('%3C','',$t);
$t=str_replace('%3D','',$t);
$t=str_replace('%3E','',$t);
$t=str_replace('%3F','',$t);
$t=str_replace('%5B','',$t);
$t=str_replace('%5C','',$t);
$t=str_replace('%5D','',$t);
$t=str_replace('%5E','',$t);
$t=str_replace('%5F','',$t);
$t=str_replace('%7B','',$t);
$t=str_replace('%7C','',$t);
$t=str_replace('%7D','',$t);
$t=str_replace('%7E','',$t);
$t=str_replace('%7F','',$t);
$t=str_replace('%40','',$t);
$t=urldecode($t);
$t=ucwords($t);
return $t;
}
?>
