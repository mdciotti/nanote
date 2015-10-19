@font-face{
	font-family: "Elegance1";
	src: url('/nanote/res/fonts/Elegance.ttf');
}
*:not(#editor):not(#searchbox):not(#noteTitle){
	user-select: none;
	-webkit-user-select: none;
	-moz-user-select: none;
}
a{
	color: inherit;
	text-decoration: none;
}
html{
	height: 100%;
	width: 100%;
}
body{
	margin: 0;
	font-family: 'Segoe UI', 'Lucida Grande', Helvetica-Neue, sans-serif;
	background-color: #000;
	overflow: hidden;
	height: 100%;
	width: 100%;
	min-width: 800px;
	min-height: 200px;
	cursor: default;
	display: box;
	box-align: stretch;
	box-orient: vertical;
	display: -webkit-box;
	-webkit-box-align: stretch;
	-webkit-box-orient: vertical;
	display: -moz-box;
	-moz-box-align: stretch;
	-moz-box-orient: vertical;
}
#main{
	box-flex: 1;
	-webkit-box-flex: 1;
	-moz-box-flex: 1;
	display: box;
	box-align: stretch;
	box-orient: vertical;
	display: -webkit-box;
	-webkit-box-align: stretch;
	-webkit-box-orient: vertical;
	display: -moz-box;
	-moz-box-align: stretch;
	-moz-box-orient: vertical;
}
.toolbar{
	background-color: #ccc;
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(rgb(208,208,208)), to(rgb(167,167,167)));
	background-image: -moz-linear-gradient(top, rgb(208,208,208), rgb(167,167,167));
	border-top: 1px solid #e2e2e2;
	border-bottom: 1px solid #515151;
	color: #111;
	overflow: hidden;
}
#appBar{
	height: 32px;
	padding: 0px 10px;
}
#logo{
	float: left;
}/*
#tabs{
	margin-left: 10px;
	float: left;
}
.tab{
	float: left;
	min-width: 100px;
	border-radius: 10px 10px 0 0;
	-webkit-border-radius: 10px 10px 0 0;
	-moz-border-radius: 10px 10px 0 0;
	border: 1px solid rgb(80,80,80);
	border-bottom: none;
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(rgb(255,255,255)), to(rgb(180,180,180)));
	background-image: -moz-linear-gradient(top, rgb(255,255,255), rgb(180,180,180));
	font-size: 18px;
	font-family: Arial, sans-serif;
	font-weight: bold;
	color: #333;
	padding: 2px 5px 2px 5px;
	margin: 5px 4px 0 0;
	text-align: center;
	cursor: pointer;
	box-shadow: 0 0 0 1px rgba(255,255,255,.25);
	-webkit-box-shadow: 0 0 0 1px rgba(255,255,255,.5);
	-moz-box-shadow: 0 0 0 1px rgba(255,255,255,.25);
}
.tab.selected{
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(rgb(75,75,75)), to(rgb(180,180,180)));
	background-image: -moz-linear-gradient(top, rgb(75,75,75), rgb(180,180,180));
	color: #ddd;
	text-shadow: 0px -1px 1px rgba(0,0,0,.75);
	padding-top: 3px;
	padding-bottom: 1px;
}
.tab.disabled{
	color: #999;
	cursor: default;
}
.tab:active:not(.selected):not(.disabled){
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(rgb(180,180,180)), to(rgb(255,255,255)));
	background-image: -moz-linear-gradient(top, rgb(180,180,180), rgb(255,255,255));
	padding-top: 3px;
	padding-bottom: 1px;
}*/
.button{
	border: 1px solid rgb(80,80,80);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(rgb(255,255,255)), to(rgb(180,180,180)));
	background-image: -moz-linear-gradient(top, rgb(255,255,255), rgb(180,180,180));
	font-size: 16px;
	font-family: Arial, sans-serif;
	font-weight: bold;
	color: #333;
	height: 19px;
	min-width: 15px;
	padding: 2px 5px 2px 5px;
	margin: 3px 0px 4px 10px;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	box-shadow: 0px 1px rgba(255,255,255,.25);
	-webkit-box-shadow: 0px 1px rgba(255,255,255,.25);
	-moz-box-shadow: 0px 1px rgba(255,255,255,.25);
	text-shadow: 0px 1px 1px rgba(255,255,255,.75);
	float: left;
	text-align: center;
	vertical-align: middle;
}
.button:hover:not(.disabled){
	cursor: pointer;
}
.button.selected{
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(rgb(75,75,75)), to(rgb(180,180,180)));
	background-image: -moz-linear-gradient(top, rgb(75,75,75), rgb(180,180,180));
	color: #ddd;
	text-shadow: 0px -1px 1px rgba(0,0,0,.75);
	padding-top: 3px;
	padding-bottom: 1px;
}
.button.disabled{
	color: #999;
	cursor: default;
}
.button:active:not(.selected):not(.disabled){
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(rgb(180,180,180)), to(rgb(255,255,255)));
	background-image: -moz-linear-gradient(top, rgb(180,180,180), rgb(255,255,255));
	padding-top: 3px;
	padding-bottom: 1px;
}
.button.left{
	border-top-right-radius: 0;
	border-bottom-right-radius: 0;
	-webkit-border-top-right-radius: 0;
	-webkit-border-bottom-right-radius: 0;
	-moz-border-radius-topright: 0;
	-moz-border-radius-bottomright: 0;
}
.button.middle{
	margin-left: 0;
	margin-right: 0;
	border-radius: 0;
	-webkit-border-radius: 0;
	-moz-border-radius: 0;
}
.button.right{
	margin-left: 0;
	border-top-left-radius: 0;
	border-bottom-left-radius: 0;
	-webkit-border-top-left-radius: 0;
	-webkit-border-bottom-left-radius: 0;
	-moz-border-radius-topleft: 0;
	-moz-border-radius-bottomleft: 0;
}
.button.left + .button.right, .button.left + .button.middle, .button.middle + .button.middle, .button.middle + .button.right{
	border-left: none;
}
.dropdownMenu{
	background-color: rgba(255,255,255,.95);
	min-width: 200px;
	max-width: 400px;
	overflow: hidden;
	font-size: 14px;
	font-weight: normal;
	text-align: left;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	box-shadow: 0px 5px 10px rgba(0,0,0,.5);
	-webkit-box-shadow: 0px 5px 10px rgba(0,0,0,.5);
	-moz-box-shadow: 0px 5px 10px rgba(0,0,0,.5);
	display: none;
	position: absolute;
	padding: 5px 0;
}
.dropdownMenu > hr{
	margin: 4px 10px;
	border: none;
	border-top: 1px solid rgba(0,0,0,.5);
}
.dropdownarrow{
	font-size: 12px;
}
.icon{
	height:22px;
	width: 22px;
	vertical-align: middle;
	float: left;
	margin-top: -1px;
}
#userpanel{
	float: right;
}
#options{
	float: right;
}
#optionsMenu{
	right: 66px;
	top: 30px;
}
.option{
	padding: 2px 10px;
	height: 20px;
}
.option.disabled{
	color: rgba(0,0,0,.5);
}
.option:hover:not(.disabled){
	background-color: rgb(58,101,242);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(rgb(100,131,248)), to(rgb(16,71,236)));
	color: #eee;
	padding: 1px 10px;
	border-top: 1px solid rgb(90,122,238);
	border-bottom: 1px solid rgb(16,71,236);
}
.option:active:not(.disabled){
	background-color: rgb(58,101,242);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(rgb(16,71,236)), to(rgb(100,131,248)));
	border-top: 1px solid rgb(90,122,238);
	border-bottom: 1px solid rgb(16,71,236);
	padding: 2px 10px 0 10px;
}
#content{
	box-flex: 1;
	-webkit-box-flex: 1;
	-moz-box-flex: 1;
	display: box;
	box-align: stretch;
	box-orient: horizontal;
	display: -webkit-box;
	-webkit-box-align: stretch;
	-webkit-box-orient: horizontal;
	display: -moz-box;
	-moz-box-align: stretch;
	-moz-box-orient: horizontal;
	overflow: hidden;
}
#content > div{
	box-flex: 1;
	-webkit-box-flex: 1;
	-moz-box-flex: 1;
}
#noteSelector{
	border-right: 1px solid rgb(163,163,163);
	border-bottom: 1px solid rgb(163,163,163);
	display: box;
	box-align: stretch;
	box-orient: vertical;
	display: -webkit-box;
	-webkit-box-align: stretch;
	-webkit-box-orient: vertical;
	display: -moz-box;
	-moz-box-align: stretch;
	-moz-box-orient: vertical;
}
#filterBar{
	height: 32px;
	-webkit-box-shadow: 0px 0px 10px rgba(0,0,0,1);
}
#sort{
	float: left;
}
#searchbar{
	float: left;
	margin: 4px 0 4px 10px;
	padding: 0px 2px 0px 10px;
	background-color: #fff;
	border-radius: 20px;
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	box-shadow: 0px -1px 1px rgba(0,0,0,.5), 0px 1px 1px rgba(255,255,255,.75);
	-webkit-box-shadow: 0px -1px 1px rgba(0,0,0,.5), 0px 1px 1px rgba(255,255,255,.75);
	-moz-box-shadow: 0px -1px 1px rgba(0,0,0,.5), 0px 1px 1px rgba(255,255,255,.75);
}
#searchbox{
	font-size: 16px;
	font-family: "Segoe UI","Lucida Grande",sans-serif;
	border: none;
	padding: 1px 0;
	margin: 0;
	background-color: transparent;
	width: 100px;
}
#counter{
	display: inline-block;
	font-size: 10px;
	text-align: center;
	color: rgba(0,0,0,.5);
	width: 10px;
	padding: 0;
	margin: 0;
	position: absolute;
	display: none;
}
#filterCount{
	line-height: 12px;
}
#itemCount{
	border-top: 1px solid rgba(0,0,0,.5);
	line-height: 10px;
}
#search{
	height: 20px;
	width: 20px;
	border: 0;
	margin: -6px 4px 0px 12px;
	vertical-align: middle;
}
#notes{
	background-color: rgb(214,221,229);
	color: rgb(92,110,129);
	text-shadow: 0px 1px 1px rgba(255,255,255,.5);
	overflow-y: scroll;
	overflow-x: hidden;
	box-flex: 1;
	-webkit-box-flex: 1;
	-moz-box-flex: 1;
}
#loadingNotes{
	text-align: center;
	font-weight: bold;
}
#nonotes{
	text-align: center;
	font-weight: bold;
}
.item{
	background-color: transparent;
	border-top: 1px solid #fff;
	border-bottom: 1px solid #b4b4b4;
	padding: 2px 10px 3px 10px;
	height: 34px;
	overflow: hidden;
	cursor: pointer;
	display: none;
}
.item.b{
	background-color: rgba(0,0,0,.05);
}
.item:hover{
	background-color: rgba(255,255,255,.5);
	-webkit-transition: all .25s ease;
}
.title{
	font-weight: bold;
	overflow: hidden;
	font-size: 14px;
	white-space: nowrap;
	text-overflow: ellipsis;
}
.preview, date{
	text-shadow: none;
	font-size: 12px;
	color: #666;
	margin-left: 10px;
	white-space: nowrap;
}
.preview{
	overflow: hidden;
	text-overflow: ellipsis;
}
date{
	float: right;
}
.item.selected{
	background-color: rgb(59,117,193);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(rgb(92,147,213)), to(rgb(25,87,172)));
	background-image: -moz-linear-gradient(top, rgb(92,147,213), rgb(25,87,172));
	border-top: 1px solid rgb(130,172,223);
	border-bottom: 1px solid rgb(13,64,216);
}
.item.selected > .title{
	color: #fff;
	text-shadow: 0px -1px 1px rgba(0,0,0,.5);
}
.item.selected > .preview, .item.selected > date{
	color: #ccc;
}
#note{
	background-color: #fff;
	border-bottom: 1px solid rgb(163,163,163);
	display: box;
	box-align: stretch;
	box-orient: vertical;
	display: -webkit-box;
	-webkit-box-align: stretch;
	-webkit-box-orient: vertical;
	display: -moz-box;
	-moz-box-align: stretch;
	-moz-box-orient: vertical;
}
#quickstart{
	text-align: center;
	height: 100%;
	background-color: #ddd;
	box-flex: 1;
	-webkit-box-flex: 1;
	-moz-box-flex: 1;
}
#quickstart .trigger{
	width: 100px;
	height: 100px;
	border: 1px solid rgb(80,80,80);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(rgb(255,255,255)), to(rgb(180,180,180)));
	background-image: -moz-linear-gradient(top, rgb(255,255,255), rgb(180,180,180));
	border-radius: 10px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	box-shadow: 0px 1px rgba(255,255,255,.75);
	-webkit-box-shadow: 0px 1px rgba(255,255,255,.75);
	-moz-box-shadow: 0px 1px rgba(255,255,255,.75);
	position: relative;
	left: 50%;
	top: 50%;
	margin-left: -51px;
	margin-top: -51px;
}
#quickstart .trigger:hover:not(.disabled){
	cursor: pointer;
}
#quickstart .trigger:active:not(.selected):not(.disabled){
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(rgb(180,180,180)), to(rgb(255,255,255)));
	background-image: -moz-linear-gradient(top, rgb(180,180,180), rgb(255,255,255));
}
#quickstart .trigger img{
	width: 100px;
	height: 100px;
}
#editbar{
	height: 32px;
	background-color: #ccc;
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(rgb(208,208,208)), to(rgb(167,167,167)));
	background-image: -moz-linear-gradient(top, rgb(208,208,208), rgb(167,167,167));
	border-top: 1px solid #e2e2e2;
	border-bottom: 1px solid #515151;
	color: #111;
	padding: 0px 10px;
	overflow: hidden;
}
#favoriteStar{
	background-image: url(../img/star_dark.png);
	background-size: 100%;
	float: left;
	margin: 4px 10px 4px 0;
	height: 24px;
	width: 24px;
	cursor: pointer;
}
#favoriteStar:not(.favorite):hover,#favoriteStar .favorite{
	background-image: url(../img/star_lite.png);
}
#favoriteStar.favorite:hover{
	background-image: url(../img/star_dark.png);
}
#noteTitle{
	background-color: transparent;
	border: none;
	font-size: 18px;
	font-family: "Segoe UI","Lucida Grande",sans-serif;
	font-weight: bold;
	float: left;
	display: block;
	padding: 1px 0;
	margin: 2px 0;
	width: 25%;
	text-shadow: 0px 1px rgba(255,255,255,.5);
}
#editTools{
	float: right;
}
#deleteButton{
	background-image: url(../img/delete_dark.png);
	background-size: 100%;
	margin: 4px 0 4px 10px;
	float: left;
	height: 24px;
	width: 24px;
	cursor: pointer;
}
#deleteButton:hover{
	background-image: url(../img/delete_lite.png);
}
#editor{
	height: 100%;
	min-height: 100%;
	width: 100%;
	min-width: 100%;
	border: none;
	overflow: auto;
	margin: 0;
	padding: 10px;
	display: block;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	box-flex: 1;
	-webkit-box-flex: 1;
	-moz-box-flex: 1;
}
#statusbar{
	height: 24px;
	text-shadow: 0px 1px 1px rgba(255,255,255,.5);
	padding: 0 10px;
}
#status{
	overflow: hidden;
	font-size: 14px;
	white-space: nowrap;
	text-overflow: ellipsis;
	padding: 3px 0px;
}
#info{
	float: right;
	font-size: 12px;
	padding: 5px 0px;
	margin-left: 10px;
}