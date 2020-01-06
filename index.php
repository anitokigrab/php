<?php
include 'func.php';
if(!empty($q)){
$title = 'Download '.hap1($q).' – Anime Shinoa';
$result = 'Result for '.hap1($q);
$pq = ''.hap($q).'';
$querys = $q;
}else{
$title = ''.$dir2.' – '.$dir3.'';
}

$anitoki = grab('https://anitoki.com/');
$postnya = cut('<div class="rseries right">','<div class="rekomf">', $anitoki);
// $posting = explode('<div class="rseries right">', $jupok[1]);
// $posting = explode('<div class="rekomf">', $posting[1]);
// $time = explode('<tr><td class="p_s">Time</td><td class="p_m">', $pecah[1]);
// $time = explode('</td></tr>', $time[1]);
// $pecaho = explode('<head>', $grogol);
// $title = explode('<title>', $pecaho[1]);
// $title = explode(' - GROGOLDRIVE LINK', $title[1]);
// include 'head.php';



echo ''.$postnya[1].'';
// include 'foot.php';
?>
