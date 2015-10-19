<?php

$username=$_POST['username'];
$password=$_POST['password'];
$saveDir='../users/'.md5(md5($username).$password).'/';
$data=array(
	'id'=>$_POST['note_id'],
	'title'=>$_POST['title'],
	'revision'=>array(
		'minute'=>$_POST['minute'],
		'hour'=>$_POST['hour'],
		'day'=>$_POST['day'],
		'month'=>$_POST['month'],
		'year'=>$_POST['year']
	),
	'content'=>$_POST['content']
);
/*
$username='greenfir3';
$password=md5('yeahright');
$saveDir='../users/'.md5(md5($username).$password).'/';
$data=array(
	'id'=>'8',
	'title'=>'test',
	'revision'=>array(
		'minute'=>'01',
		'hour'=>'02',
		'day'=>'03',
		'month'=>'04',
		'year'=>'0506'
	),
	'content'=>'Content'
);*/
$doc=new DOMDocument();
$doc->formatOutput=true;

$note=$doc->createElement("note");
/*
$created=$doc->createElement("created");
$created->appendChild($doc->createAttribute('m')->appendChild($doc->createTextNode($data['created']['minute'])));
$created->appendChild($doc->createAttribute('h')->appendChild($doc->createTextNode($data['created']['hour'])));
$created->appendChild($doc->createAttribute('d')->appendChild($doc->createTextNode($data['created']['day'])));
$created->appendChild($doc->createAttribute('mo')->appendChild($doc->createTextNode($data['created']['month'])));
$created->appendChild($doc->createAttribute('y')->appendChild($doc->createTextNode($data['created']['year'])));
$note->appendChild($created);*/

$revision=$doc->createElement("revision");
$min=$doc->createAttribute('m');
$min->appendChild($doc->createTextNode($data['revision']['minute']));
$revision->appendChild($min);
$hour=$doc->createAttribute('h');
$hour->appendChild($doc->createTextNode($data['revision']['hour']));
$revision->appendChild($hour);
$day=$doc->createAttribute('d');
$day->appendChild($doc->createTextNode($data['revision']['day']));
$revision->appendChild($day);
$month=$doc->createAttribute('mo');
$month->appendChild($doc->createTextNode($data['revision']['month']));
$revision->appendChild($month);
$year=$doc->createAttribute('y');
$year->appendChild($doc->createTextNode($data['revision']['year']));
$revision->appendChild($year);
$note->appendChild($revision);

$title=$doc->createElement("title");
$title->appendChild(
	$doc->createTextNode($data['title'])
);
$note->appendChild($title);

$content=$doc->createElement("content");
$content->appendChild(
	$doc->createTextNode($data['content'])
);
$note->appendChild($content);
$doc->appendChild($note);

if(!is_dir($saveDir)){
	echo 'Incorrect username or password.';
}else{
	echo 'File saved';
}
$doc->save($saveDir.'note_'.$data['id'].'.xml');
?>