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
echo '<div class="bootstrap_menu" align="right"><a href="http://click.buzzcity.net/click.php?partnerid=127456&bn=1" rel="nofollow" title="Download Gratis Video Youtube"><img src="http://ads.buzzcity.net/show.php?partnerid=127456&get=image&bn=1" alt="Download Gratis Video Youtube New" title="Download Gratis Video Youtube"/></a></div>
<div class="ijo"><h3>'.$result.'</h3></div>';

$grab = ngegrab('https://anitoki.com/?s='.crut2($querys).'');
$json = json_decode($grab);
$totals = $json->pageInfo->totalResults;
$nextT=$json->nextPageToken;
$prevT = $json->prevPageToken;
if($totals > 1){
foreach ($json->items as $hasil)
{
$id          = $hasil->id->videoId;
$name        = $hasil->snippet->title;
$ud          = strtolower("$ln");
$description = $hasil->snippet->description;
$channel     = $hasil->snippet->channelTitle;
$channelid   = $hasil->snippet->channelId;
$addedon     = dateyt($hasil->snippet->publishedAt);
$hasil       = ngegrab('https://anitoki.com/?p='.$id.'');
$dt          = json_decode($hasil);
foreach ($dt->items as $dta)
{
$time        = $dta->contentDetails->duration;
$duration    = format_time($time);
$views       = $dta->statistics->viewCount;
$likes       = $dta->statistics->likeCount;
$dislikes    = $dta->statistics->dislikeCount;
}
echo '<div class="bootstrap_menu"><div class="link"><a title="Download Video '.$name.' 3gp Mp4 HD" href="'.$dir.'/?p='.$id.'/'.hps($name).'.html"><strong><font color="#009900">'.$name.'</font></strong><br />
<table><tbody><tr valign="middle"><td><img src="https://ytimg.googleusercontent.com/vi/'.$id.'/default.jpg" alt="images" title="default" height="50" width="80" class="img-responsive zoom-img"></td> <td style="padding-left:2px;"><div style="padding-bottom:1px;"><td valign="top">Duration: '.$duration.'<br/>by <font color="#FF0000">'.$channel.'</font><br/>on '.$addedon.'</td></tr></tbody></table></a></div></div>';
}

echo '<center><a href="http://click.buzzcity.net/click.php?partnerid=127456&bn=2" rel="nofollow" title="Download Gratis Video Youtube"><img src="http://ads.buzzcity.net/show.php?partnerid=127456&get=image&bn=2" alt="Download Gratis Video Youtube New" title="Download Gratis Video Youtube"/></a></center>
<div class="nav" style="text-align:center;">';
if(!empty($prevT)){
echo '<a href="'.$dir.'/search/'.$pq.'/'.$prevT.'/'.($p-1).'.html" title="Download Video '.hap1($q).' '.($p-1).' 3gp Mp4 HD" class="page">&laquo; Previous</a> – ';
}
if(!empty($querys)){
echo '<a href="'.$dir.'/search/'.hap($querys).'/'.$nextT.'/'.($p+1).'.html" title="Download Video '.hap1($querys).' '.($p+1).' 3gp Mp4 HD" class="page">Next Page &raquo;</a>';
}else{
echo '<a href="'.$dir.'/search/'.$pq.'/'.$nextT.'/'.($p+1).'.html" title="Download Video '.hap1($q).' '.($p+1).' 3gp Mp4 HD" class="page">Next Page &raquo;</a>';
}

echo '</div>
<center><a href="http://click.buzzcity.net/click.php?partnerid=127456&bn=3" rel="nofollow" title="Download Gratis Video Youtube"><img src="http://ads.buzzcity.net/show.php?partnerid=127456&get=image&bn=3" alt="Download Gratis Video Youtube New" title="Download Gratis Video Youtube"/></a></center>';
}else{
echo '<div class="group"><p align="center"><b>Masih Error!!</b></p></div>';
}
include 'foot.php';
?>
