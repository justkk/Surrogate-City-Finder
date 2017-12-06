<?php
function file_get_contents_utf8($fn) { 
     $content = file_get_contents($fn); 
      return mb_convert_encoding($content, 'UTF-8', 
          mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true)); 
} 
$stack=array();
$data=file_get_contents("http://en.wikipedia.org/wiki/" . $_POST['cityname'] );
$finalend=mb_strlen($data,'UTF-8');
$start=mb_strpos($data,"<span class=\"plainlinks nourlexpansion\">",0,'UTF-8');
$semi=mb_substr($data,$start,$finalend-$start,'UTF-8');
$en=mb_strpos($semi,"><span",0,'UTF-8');
//$en=$en+$start;
$completedata=mb_substr($data,$start,$en,'UTF-8');
$start=mb_strpos($completedata,"href=",0,'UTF-8');
$semi=mb_substr($completedata,$start+5,mb_strlen($completedata,'UTF-8')-$start-5,'UTF-8');
$completedata=mb_substr($semi,1,mb_strlen($semi,'UTF-8')-2,'UTF-8');
//array_push($stack,($completedata));
$finalend=mb_strlen($data,'UTF-8');
$start=mb_strpos($data,"Average high",0,'UTF-8');
$test=mb_strpos($data,"Average high °F",0,'UTF-8');
if($start!=false)
{
	$semi1=mb_substr($data,$start,$finalend-$start,'UTF-8');
	$start2=mb_strpos($semi1,"</th>",0,'UTF-8');
	$end2=mb_strpos($semi1,"</tr>",0,'UTF-8');
	$semi2=mb_substr($semi1,$start2+5,$end2-$start2-5,'UTF-8');
	$set=mb_split("</td>",$semi2);
	$lim=sizeof($set);
	$i=0;
	while($i < $lim)
	{
		$ss=$set[$i];
		$semi=mb_split(">",$ss);
		$semi=$semi[1];
		$semi=mb_split("<",$semi);
		$semi=$semi[0];
		if($test==false)
			$semi=$semi;
		else
			$semi=(floatval($semi)-32)*0.27777;
		array_push($stack,($semi));
		$i=$i+1;
		if($i==13)
	break;
	}
}
	
	$finalend=mb_strlen($data,'UTF-8');
	$start=mb_strpos($data,"Average low",0,'UTF-8');
	$test=mb_strpos($data,"Average low °F",0,'UTF-8');

if($start!=false)
{
	$semi1=mb_substr($data,$start,$finalend-$start,'UTF-8');
	$start2=mb_strpos($semi1,"</th>",0,'UTF-8');
	$end2=mb_strpos($semi1,"</tr>",0,'UTF-8');
	$semi2=mb_substr($semi1,$start2+5,$end2-$start2-5,'UTF-8');
	$set=mb_split("</td>",$semi2);
	$lim=sizeof($set);
	$i=0;
	while($i < $lim)
	{
		$ss=$set[$i];
		$semi=mb_split(">",$ss);
		$semi=$semi[1];
		$semi=mb_split("<",$semi);
		$semi=$semi[0];
		if($test==false)
			$semi=$semi;
		else
			$semi=(floatval($semi)-32)*0.27777;
		array_push($stack,($semi));
		$i=$i+1;
		if($i==13)
	break;
	}
}

echo json_encode($stack);















?>
