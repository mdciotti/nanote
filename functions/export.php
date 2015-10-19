<?php

$username='greenfir3';//$_POST['username'];
$password=md5('yeahright');//$_POST['password'];
$saveDir='../users/'.md5(md5($username).$password).'/';
/*$data=array(
	'id'=>$_POST['note_id'],
	'title'=>trim($_POST['title']),
	'content'=>$_POST['content'],
	'revision'=>array(
		'minute'=>$_POST['minute'],
		'hour'=>$_POST['hour'],
		'day'=>$_POST['day'],
		'month'=>$_POST['month'],
		'year'=>$_POST['year']
	)
);*/
$data=array(
	'id'=>'x',
	'title'=>trim('Test Notes'),
	'content'=>'This is the content',
	'revision'=>array(
		'minute'=>'05',
		'hour'=>'20',
		'day'=>'03',
		'month'=>'07',
		'year'=>'2010'
	)
);
function table_row($title,$content,$char,$sep,$cap){
	$newLine="\r\n";
	$titleSize=7;
	$contentSize=28;
	$titleSpaces="";
	$contentSpaces="";
	for($h=1;$h<=($titleSize-strlen($title));$h++){
		$titleSpaces=$titleSpaces.$char;
	}
	for($i=1;$i<=($contentSize-strlen($content));$i++){
		$contentSpaces=$contentSpaces.$char;
	}
	return $cap.$char.strtoupper($title).$titleSpaces.$char.$sep.$char.$content.$contentSpaces.$char.$cap.$newLine;
}
function table_div($div,$sep,$cap){
	return table_row("","",$div,$sep,$cap);
}
function table_cap($char){
	return table_row("","",$char,$char,$char);
}
$fileHeader="".
table_cap("=").
table_row("title",$data['title']," ","|","|").
table_div("-","+","|").
table_row("created",""," ","|","|").
table_row("revised",$data['revision']['hour'].":".$data['revision']['minute']." on ".$data['revision']['day'].".".$data['revision']['month'].".".$data['revision']['year']," ","|","|").
table_row("note id",$data['id']," ","|","|").
table_row("creator",$username," ","|","|").
table_div("-","+","|").
table_row("","http://nanote.net/"," ","|","|").
table_cap("=");
/*if(!is_dir($saveDir)){
	echo 'Error: Could not save to the user\'s directory.';
}else{*/
	$fileName=$saveDir.'txt/'.$data['title'].'.txt';
	var_dump($fileName);
	echo '<pre>'.$fileHeader.'</pre>';
	$doc=fopen($fileName,"w");
	fwrite($doc,$fileHeader);
	fwrite($doc,$data['content']);
	fclose($doc);
//}
?>