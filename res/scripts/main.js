function getPrefs(){
	console.log('getPrefs()');
	$.ajax({
	url:'./users/'+global.user_path+'/preferences.json',
	dataType:'json',
	cache:false,
	success:function(data){global.prefs=data},
	error:function(msg,msg2,msg3){
		console.error('Unable to load user preferences; using defaults instead ('+[msg,msg2,msg3]+')');
		global.prefs={
			save:'often',
			keys:{
				mod:17,
				save:83,
				create:79,
				del:46
			}
		}
	}
	});
}
function postNote(id){
	console.log('postNote('+id+')');
	$.post('./functions/save_note.php',global.dataToPost);
}
function fadeNotes(){
	console.log('fadeNotes()');
	if(global.fadeIndex<($('.item')).length){
		$('.item:eq('+global.fadeIndex+')').fadeIn();//.slideDown();
		global.fadeIndex++;
		if(global.fadeIndex!=($('.item')).length) window.setTimeout('fadeNotes()',100);
	}
}
function loadNotes(){
	console.log('loadNotes()');
	if(global.notes.length!=0){
		var today=(new Date()).getDate();
		var thisMonth=(new Date()).getMonth()+1;
		var thisYear=(new Date()).getYear()+1900;
		$('#notes').html('');
		for(i=0;i<global.notes.length;i++){
			if(global.notes[i]!=undefined){
			if(global.notes[i].year==thisYear && global.notes[i].month==thisMonth && global.notes[i].day==today){
				if(global.notes[i].minute<10) global.notes[i].minute='0'+global.notes[i].minute;
				var lastEdit=global.notes[i].hour+':'+global.notes[i].minute;
			}else{
				var lastEdit=global.notes[i].day+'.'+global.notes[i].month+'.'+global.notes[i].year;
			}
			$('#notes').append(
			'<div class="item" id="note_'+i+'" onclick="editNote('+i+')">'+
				'<date class="date" date-time="'+global.notes[i].day+'-'+global.notes[i].month+'-'+global.notes[i].year+'">'+lastEdit+'</date>'+
				'<div class="title">'+global.notes[i].title+'</div>'+
				'<div class="preview">'+global.notes[i].content+'</div>'+
			'</div>');
		}
		}
		$('.item:odd').addClass('a');
		$('.item:even').addClass('b');
		fadeNotes();
		var itemCount=0;
		$(".item").each(function(){
			itemCount++;
		});
		$('#filterCount').text(itemCount);
		$('#itemCount').text(itemCount);
		$('#counter').fadeIn();
	}else{
		$('#notes').html('<div id="nonotes">You have no notes.<br />Click the "+" button to create a new note.</div>');
	}
}
function getNotes(){
	console.log('getNotes()');
	$.ajax({
	url:'./users/'+global.user_path+'/manifest.json',
	dataType:'json',
	cache:false,
	success:function(data){
		for(x=0;x<data.length;x++){
			getNote(data[x]);
		}
		global.lastNoteID=data[data.length-1];
		window.setTimeout('loadNotes()',500);
	},
	error:function(msg,msg2,msg3){
		console.error('Unable to load notes manifest ('+[msg,msg2,msg3]+')');
	}
	});
}
function getNote(id){
	console.log('getNote('+id+')');
	$.ajax({
	url:'./users/'+global.user_path+'/note_'+id+'.xml',
	dataType:'xml',
	cache:false,
	success:function(data){
		global.notes[id]={
			title:$(data).find('title').text(),
			content:$(data).find('content').text(),
			minute:$(data).find('revision').attr('m'),
			hour:$(data).find('revision').attr('h'),
			day:$(data).find('revision').attr('d'),
			month:$(data).find('revision').attr('mo'),
			year:$(data).find('revision').attr('y')
		}
	},
	error:function(msg,msg2,msg3){
		console.error('Unable to load note '+id+' ('+[msg,msg2,msg3]+')');
	}
	});
}
function updateNoteItem(id){
	console.log('updateNoteItem('+id+')');
	if(global.notes[id].minute<10) global.notes[id].minute='0'+global.notes[id].minute;
	$('#note_'+id).html(
	'<date date-time="'+global.notes[id].day+'-'+global.notes[id].month+'-'+global.notes[id].year+'">'+global.notes[id].hour+':'+global.notes[id].minute+'</date>'+
	'<div class="title">'+global.notes[id].title+'</div>'+
	'<div class="preview">'+global.notes[id].content+'</div>');
}
/*function setStatus(msg,seconds){
	console.log('setStatus('+msg+','+seconds+')');
	$('#status').html(msg);
	$('#status').fadeIn();
	window.setTimeout("$('#status').fadeOut();",seconds*1000);
}*/
function saveNote(id){
	console.log('saveNote('+id+')');
	if(global.keyTimer!=false) window.clearTimeout(global.keyTimer);
	$.Growl.show({title:'Saving&hellip;',timeout:3000});
	var D=new Date();
	global.notes[id].minute=D.getMinutes();
	global.notes[id].hour=D.getHours();
	global.notes[id].day=D.getDate();
	global.notes[id].month=D.getMonth()+1;
	global.notes[id].year=D.getYear()+1900;
	global.notes[id].content=$('#editor').val();//.replace(/'/g,"\\"+"'");
	global.notes[id].title=$('#noteTitle').val();
	postNote(id);
	updateNoteItem(id);
}
function checkKey(key){
	//console.log('checkKey('+key+')');
	if(
		(key>=48 && key<=57) ||
		(key>=65 && key<=90) ||
		(key>=96 && key<=107) ||
		(key>=109 && key<=111) ||
		(key>=186 && key<=192) ||
		(key>=219 && key<=222) ||
		(key==8) ||
		(key==9) ||
		(key==13) ||
		(key==32) ||
		(key==46)
	){
		return true;
	}else{
		return false;
	}
}
function noteChanged(id){
	//console.log('noteChanged('+id+')');
	if(checkKey(event.which)){
		if(global.keyTimer!=false) window.clearTimeout(global.keyTimer);
		global.keyTimer=window.setTimeout('saveNote('+id+')',5*1000);
	}
	if(event.which==9){
		event.preventDefault();
		t=event.target;
		ss=t.selectionStart;
		se=t.selectionEnd;
		tab="\t";
		//t.value=t.value.slice(0,ss).concat(tab).concat(t.value.slice(ss,t.value.length));
		t.value=t.value.slice(0,ss)+tab+t.value.slice(ss,t.value.length);
		/*if(ss==se){
			t.selectionStart=t.selectionEnd=ss+tab.length;
		}else{
			t.selectionStart=ss+tab.length;
			t.selectionEnd=se+tab.length;
		}*/
	}
}
function editNote(id){
	console.log('editNote('+id+')');
	$('.item').removeClass('selected');
	$('#note_'+id).addClass('selected');
	global.currentNote=id;
	$('#note').html(
		'<div id="editbar">'+
			'<div id="favoriteStar" title="favorite"></div>'+
			'<input type="text" id="noteTitle" value="'+global.notes[id].title+'"'+
			' onkeydown="noteChanged('+id+')"'+
			' onpaste="saveNote('+id+')"'+
			' oncut="saveNote('+id+')"'+
			' onblur="saveNote('+id+')" title="title" />'+
			'<div id="editTools">'+
				'<div class="button" id="save" title="save">save</div>'+
				'<div class="button" onclick="shareNote('+id+')" title="share">share</div>'+
				'<div class="button" onclick="exportAs('+id+',\'txt\')" title="export">export</div>'+
				'<div id="deleteButton" title="delete"></div>'+
			'</div>'+
		'</div>'+
		'<textarea id="editor"'+
		' onkeydown="noteChanged('+id+')"'+
		' onpaste="saveNote('+id+')"'+
		' oncut="saveNote('+id+')"'+
		' onblur="saveNote('+id+')">'+global.notes[id].content+'</textarea>'
	);
	$('#editor').focus();
}
function createNote(){
	console.log('createNote()');
	var D=new Date();
	var time={
		'minute':D.getMinutes(),
		'hour':D.getHours(),
		'day':D.getDate(),
		'month':D.getMonth()+1,
		'year':D.getYear()+1900
	}
	var lastEdit=time.hour+':'+time.minute;
	var newID=global.lastNoteID+1;
	$.post("./functions/create_note.php",{
		'user_path':global.user_path,
		'note_id':newID,
		'minute':time.minute,
		'hour':time.hour,
		'day':time.day,
		'month':time.month,
		'year':time.year
	});
	$.getJSON('./users/'+global.user_path+'/manifest.json',{'test':8});
	$('#notes').append(
		'<div class="item" id="note_'+newID+'" onclick="editNote('+newID+')">'+
			'<date class="date" date-time="'+time.day+'-'+time.month+'-'+time.year+'">'+lastEdit+'</date>'+
			'<div class="title">[new note]</div>'+
			'<div class="preview"></div>'+
		'</div>');
	$('.item:eq('+global.fadeIndex+1+')').fadeIn();//.slideDown();
}
function exportAs(id,format){
	console.log('exportAs('+id+',\''+format+'\')');
	$.post('./functions/export.php',{
		'user_path':global.user_path,
		'format':format,
		'note_id':id,
		'title':global.notes[id].title,
		'content':global.notes[id].content,
		'minute':global.notes[id].minute,
		'hour':global.notes[id].hour,
		'day':global.notes[id].day,
		'month':global.notes[id].month,
		'year':global.notes[id].year
	});
}
function searchNotes(q){
	var itemCount=0;
	$(".item").each(function(){
		$(this).removeClass('a');
		$(this).removeClass('b');
		console.log($(this).filter('>.title').text());
		if($(this).text().search(new RegExp(q, "i"))<0){
			$(this).slideUp();
			$(this).addClass('hidden');
		}else{
			$(this).slideDown();
			$(this).removeClass('hidden');
			itemCount++;
		}
	});
	$('.item:not(.hidden)').filter(':odd').addClass('a');
	$('.item:not(.hidden)').filter(':even').addClass('b');
	$('#filterCount').text(itemCount);
}
function view(type,el){
	console.log('view(\''+type+'\')');
	$('#view > .selected').removeClass('selected');
	$(el).addClass('selected');
}
function sortBy(sortMethod,el){
	console.log('sortBy(\''+sortMethod+'\')');
	$('#sort > .selected').removeClass('selected');
	$(el).addClass('selected');
	
	switch(sortMethod){
		case 'name':
			var firstLetters=new Array();
			i=0;
			$('.item').each(function(){
				firstLetters[i]=($(this).find('.title').text()).charAt(0);
				i++;
			});
			console.log(firstLetters);
			break;
		case 'created':
			
			break;
		case 'updated':
			
			break;
		default:
			return 0;
			break;
	}
}
function setNotesWidth(){
	if(window.outerWidth>800) $('#noteSelector').css('max-width',Math.floor(window.outerWidth/3)+'px');
}
$(document).ready(function(){
	console.log('$(document).ready()');
	
	$.reject({
		header:'Your internet browser is incompatible with nanote',
		paragraph1:'We\'re very sorry for any inconvenience, and hope you understand our motives to stay with cutting-edge technology.',
		paragraph2:'However, you can choose one of the following internet browsers to enjoy nanote:',
		close:true,
		closeLink:'Or try the compatibiliy version',
		closeURL:'./ie.php',
		closeMessage:'The compatibility version will attempt to make nanote run correctly in your browser, yet many features will either be missing or degraded.',
		reject:{
			all:true
			/*gecko:false,
			webkit:true,
			trident:true,
			khtml:true,
			presto:true*/
		},
		display:['gcf','chrome','firefox','safari'],
		imagePath:'./res/img/jReject/'
	});
	
	$('#main').append(global.HTML.appBar);
	$('#main').append(global.HTML.content);
	$('#main').append(global.HTML.statusbar);
	
	setNotesWidth();
	
	//$('#notes').jScrollPane({animateTo:true});
	
	$('#version').text(global.version);
	$('#copyrightYear').text(global.copyrightYear);
	$('#notes').html('<div id="loadingNotes">Loading&hellip;</div>');
	
	TopUp.images_path="./res/img/top_up/";
	
	getPrefs();
	getNotes();
});
window.onresize=function(){
	setNotesWidth();
}