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

echo '<div class="bootstrap_menu"><div class="link"><a title="Download Video '.$name.' 3gp Mp4 HD" href="'.$dir.'/?p='.$id.'/'.hps($name).'.html"><strong><font color="#009900">'.$name.'</font></strong><br />
<table><tbody><tr valign="middle"><td><img src="https://ytimg.googleusercontent.com/vi/'.$id.'/default.jpg" alt="images" title="default" height="50" width="80" class="img-responsive zoom-img"></td> <td style="padding-left:2px;"><div style="padding-bottom:1px;"><td valign="top">Duration: '.$duration.'<br/>by <font color="#FF0000">'.$channel.'</font><br/>on '.$addedon.'</td></tr></tbody></table></a></div></div>';
}

echo '<div class="nav" style="text-align:center;">';
if(!empty($prevT)){
echo '<a href="'.$dir.'/search/'.$pq.'/'.$prevT.'/'.($p-1).'.html" title="Download Video '.hap1($q).' '.($p-1).' 3gp Mp4 HD" class="page">&laquo; Previous</a> – ';
}
if(!empty($querys)){
echo '<a href="'.$dir.'/search/'.hap($querys).'/'.$nextT.'/'.($p+1).'.html" title="Download Video '.hap1($querys).' '.($p+1).' 3gp Mp4 HD" class="page">Next Page &raquo;</a>';
}else{
echo '<a href="'.$dir.'/search/'.$pq.'/'.$nextT.'/'.($p+1).'.html" title="Download Video '.hap1($q).' '.($p+1).' 3gp Mp4 HD" class="page">Next Page &raquo;</a>';
}

echo '</div>';
}else{
echo '<div class="group"><p align="center"><b>Masih Error Njing!!</b></p></div>';
}
include 'foot.php';
?>
