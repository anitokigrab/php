<?php
include 'func.php';
if(isset($_GET['query'])){
if(!empty($_GET['query'])){
header('Location: '.$dir.'/search/'.hap($_GET['query']).'.html');
}else{
header('Location: /');
}}
$q=$_GET['s'];
if(!empty($_GET['p'])){
$p=$_GET['p'];
}else{
$p = 1;
}
if(!empty($q)){
$title = 'Download '.hap1($q).' – Anime Shinoa';
$result = 'Result for '.hap1($q);
$pq = ''.hap($q).'';
$querys = $q;
}else{
$title = ''.$dir2.' – '.$dir3.'';
}
include 'head.php';
echo '<div class="ijo"><h3>'.$result.'</h3></div>';

$grab = ngegrab('https://anitoki.com');

echo ''.grab.'';
else{
echo '<div class="group"><p align="center"><b>Masih Error Njing!!</b></p></div>';
include 'foot.php';
?>
