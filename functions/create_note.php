<?php
$username=$_POST['username'];
$password=$_POST['password'];
$saveDir='./users/'.md5(md5($username).$password).'/';
$data=array(
	'id'=>$_POST['note_id'],
	'title'=>null,
	'revision'=>array(
		'minute'=>$_POST['minute'],
		'hour'=>$_POST['hour'],
		'day'=>$_POST['day'],
		'month'=>$_POST['month'],
		'year'=>$_POST['year']
	),
	'content'=>null
);

$doc=new DOMDocument();
$doc->formatOutput=true;

$note=$doc->createElement("note");

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
	$doc->createTextNode("[new note]")
);
$note->appendChild($title);

$content=$doc->createElement("content");
$content->appendChild(
	$doc->createTextNode("")
);
$note->appendChild($content);
$doc->appendChild($note);

if(!is_dir($saveDir)){
	//mkdir($saveDir, 0, true);
	echo 'Incorrect username or password.';
}else{
	echo 'File saved';
}
$doc->save($saveDir.'note_'.$data['id'].'.xml');
/*
$json=fopen($saveDir."manifest.json","r+");
$decoded_json=json_decode($json);
fwrite($json,json_encode(array_push($decoded_json,$decoded_json[sizeof($decoded_json)-1])));
fclose($json);*/
?>