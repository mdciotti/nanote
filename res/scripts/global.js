var global={
	version:'0.1.3 alpha',
	copyrightYear:'2010',
	username:'greenfir3',//prompt('Username:'),
	password:MD5('yeahright'),//MD5(prompt('Password:')),
	user_path:'',
	prefs:false,
	fadeIndex:0,
	lastNoteID:null,
	saveCounter:1,
	keyTimer:false,
	notes:[],
	currentNote:0,
	dataToPost:{},
	days:[
		'Sunday',
		'Monday',
		'Tuesday',
		'Wednesday',
		'Thursday',
		'Friday',
		'Saturday'
	],
	HTML:{
		appBar:
			'<div class="toolbar" id="appBar">'+
				'<div id="logo"><a href="./"><img src="./res/img/logo/logo_alpha_small.png" alt="nanote" /></a></div>'+
				/*'<div id="tabs">'+
					'<div class="tab selected" id="nanote">notes</div>'+
					'<div class="tab disabled" id="lists">lists</div>'+
				'</div>'+*/
				'<div id="userpanel">'+
					'<div class="button menu" id="new" title="account" onclick=""><img class="icon" src="./res/img/icons/dark/user.png" /><span class="dropdownarrow">&#9660;</span></div>'+
				'</div>'+
				'<div class="button menu" id="options" onclick="$(\'#optionsMenu\').show();" title="preferences"><img class="icon" src="./res/img/icons/dark/settings.png" /><span class="dropdownarrow">&#9660;<!--&#9650;--></span></div>'+
				'<div class="dropdownMenu" id="optionsMenu">'+
					'<div class="option" onclick="toggle(\'offline\')">Offline Mode</div>'+
					'<hr />'+
					'<div class="option"><a class="rpxnow" onclick="return false;" href="https://nanote.rpxnow.com/openid/v2/signin?token_url=http%3A%2F%2Fnanote.zxq.net%2F">Sign In<a></div>'+
				'</div>'+
			'</div>',
		content:
			'<div id="content">'+
				'<div id="noteSelector">'+
					'<div class="toolbar" id="filterBar">'+
						'<div id="searchbar">'+
							'<input type="text" id="searchbox" placeholder="search" onkeyup="searchNotes(this.value)" />'+
							'<span id="counter">'+
								'<div id="filterCount"></div>'+
								'<div id="itemCount"></div>'+
							'</span>'+
							'<img id="search" src="./res/img/icons/dark/search.png" />'+
						'</div>'+
						'<div id="view">'+
							'<div class="button left selected" onclick="view(\'all\',this)" title="Show all">all</div>'+
							'<div class="button middle" onclick="view(\'notes\',this)" title="Show notes">notes</div>'+
							'<div class="button right"onclick="view(\'lists\',this)" title="Show lists">lists</div>'+
						'</div>'+
						'<div id="sort">'+
							'<div class="button left selected" onclick="sortBy(\'created\',this)" title="Sort by date created">created</div>'+
							'<div class="button middle" onclick="sortBy(\'updated\',this)" title="Sort by last update">updated</div>'+
							'<div class="button right" onclick="sortBy(\'name\',this)" title="Sort by name">name</div>'+
						'</div>'+
						'<div class="button" id="new" onclick="createNote()" title="new note"><img class="icon" src="./res/img/icons/dark/new.png" /></div>'+
					'</div>'+
					'<div id="notes"></div>'+
				'</div>'+
				'<div id="note">'+
					'<div id="quickstart">'+
						'<!--<div class="trigger" onclick="createNote()"><img src="./res/img/icons/dark/new.png" /></div>-->'+
					'</div>'+
				'</div>'+
			'</div>',
		statusbar:
			'<div class="toolbar" id="statusbar">'+
				'<div id="info">'+
					'<a href="javascript:about()"><span id="name">nanote</span> <span id="version"></span></a>&nbsp;&bull;&nbsp;'+
					'<span id="copyright">&copy;<span id="copyrightYear"><!--<?php echo date_format(new DateTime(),"Y") ?>--></span></span> '+
					'<a href="http://greenfir3.axxim.net/">Max Ciotti</a>&nbsp;&bull;&nbsp;'+
					'<a href="./Privacy.txt">Privacy</a>&nbsp;&bull;&nbsp;'+
					'<a href="mailto:nanote.app+support@gmail.com">Support</a>&nbsp;&bull;&nbsp;'+
					'<a href="mailto:nanote.app+bugs@gmail.com">Report a Bug</a>&nbsp;&bull;&nbsp;'+
					'<a href="http://twitter.com/nanoteapp">Twittter</a>'+
				'</div>'+
				'<div id="status"></div>'+
			'</div>'
	}
}