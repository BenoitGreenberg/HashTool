function checkcharacter(string,type) {

switch(type) {
case 'numeric':
var check = /[0-9]/;
break;
case 'alphabet':
var check = /[a-zA-Z]/;
break;
case 'alphabetaccentue':
var check = /[a-zA-ZéèàâäîïêëûüùçÄÂÜÛÊË]/;
break;
case 'alphanumeric':
var check = /[a-zA-Z0-9]/;
break;
case 'alphanumericaccentue':
var check = /[a-zA-Z0-9éèàâäîïêëûüùçÄÂÜÛÊË]/;
break;
case 'text':
var check = /[a-zA-Z0-9éèàâäîïêëûüùçÄÂÜÛÊË `'",;:.!?&²|$£µ°%@#§<>(){}]/;
break;
case 'email':
var check = /[a-zA-Z0-9_.@-]/;
break;
case 'hexadecimal':
var check = /[a-fA-F0-9]/;
break;
}

for(var i = 0; i < string.length; i++) {
if (check.exec(string.charAt(i)) == null) {
var result = 0;
return 0;
break;
}}
if (result !== 0) {
return 1;
}
}



function zone_hash_check_string(string) {
var check = /[a-zA-Z0-9éèàâäîïêëûüùçÄÂÜÛÊË `'",;:.!?&²|$£µ°%@#§<>(){}]/;

var testchar;
for (var i = 0; i < string.length; i++) {
if (check.exec(string.charAt(i)) == null) {
testchar = 0;
return 0;
break;
}}
if (testchar !== 0 && string.length <= 64) {
return 1;
}
else {
return 0;
}

}

function zone_crack_check_string(string) {
var check = /[a-fA-F0-9]/;

var testchar;
for (var i = 0; i < string.length; i++) {
if (check.exec(string.charAt(i)) == null) {
testchar = 0;
return 0;
break;
}}
if (testchar !== 0 && string.length <= 128) {
return 1;
}
else {
return 0;
}

}

function zone_crack_check_email(email) {
var check = /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/
if (check.exec(email) == null) {
return 0; // email invalide
}
else {
return 1; //email valide
}
}

function check_hash(string,type_hash) {

var check;
var nb;

switch(type_hash) {
case 'adler32':
check = /[0-9]/;
nb = 8;
break;
case 'crc32':
check = /[a-fA-F0-9]/;
nb = 8;
break;
case 'crc32b':
check = /[a-fA-F0-9]/;
nb = 8;
break;
case 'md2':
check = /[a-fA-F0-9]/;
nb = 32;
break;
case 'md4':
check = /[a-fA-F0-9]/;
nb = 32;
break;
case 'md5':
check = /[a-fA-F0-9]/;
nb = 32;
break;
case 'ripemd128':
check = /[a-fA-F0-9]/;
nb = 32;
break;
case 'tiger128,3':
check = /[a-fA-F0-9]/;
nb = 32;
break;
case 'tiger128,4':
check = /[a-fA-F0-9]/;
nb = 32;
break;
case 'haval128,3':
check = /[a-fA-F0-9]/;
nb = 32;
break;
case 'haval128,4':
check = /[a-fA-F0-9]/;
nb = 32;
break;
case 'haval128,5':
check = /[a-fA-F0-9]/;
nb = 32;
break;
case 'sha1':
check = /[a-fA-F0-9]/;
nb = 40;
break;
case 'ripemd160':
check = /[a-fA-F0-9]/;
nb = 40;
break;
case 'tiger160,3':
check = /[a-fA-F0-9]/;
nb = 40;
break;
case 'tiger160,4':
check = /[a-fA-F0-9]/;
nb = 40;
break;
case 'haval160,3':
check = /[a-fA-F0-9]/;
nb = 40;
break;
case 'haval160,4':
check = /[a-fA-F0-9]/;
nb = 40;
break;
case 'haval160,5':
check = /[a-fA-F0-9]/;
nb = 40;
break;
case 'tiger192,3':
check = /[a-fA-F0-9]/;
nb = 48;
break;
case 'tiger192,4':
check = /[a-fA-F0-9]/;
nb = 48;
break;
case 'haval192,3':
check = /[a-fA-F0-9]/;
nb = 48;
break;
case 'haval192,4':
check = /[a-fA-F0-9]/;
nb = 48;
break;
case 'haval192,5':
check = /[a-fA-F0-9]/;
nb = 48;
break;
case 'haval224,3':
check = /[a-fA-F0-9]/;
nb = 56;
break;
case 'haval224,4':
check = /[a-fA-F0-9]/;
nb = 56;
break;
case 'haval224,5':
check = /[a-fA-F0-9]/;
nb = 56;
break;
case 'sha256':
var check = /[a-fA-F0-9]/;
nb = 64;
break;
case 'snefru':
check = /[a-fA-F0-9]/;
nb = 64;
break;
case 'gost':
check = /[a-fA-F0-9]/;
nb = 64;
break;
case 'haval256,3':
check = /[a-fA-F0-9]/;
nb = 64;
break;
case 'haval256,4':
check = /[a-fA-F0-9]/;
nb = 64;
break;
case 'haval256,5':
check = /[a-fA-F0-9]/;
nb = 64;
break;
case 'sha384':
check = /[a-fA-F0-9]/;
nb = 96;
break;
case 'sha512':
check = /[a-fA-F0-9]/;
nb = 128;
break;
case 'whirlpool':
check = /[a-fA-F0-9]/;
nb = 128;
break;
}

var testchar;
for (var i = 0; i < string.length; i++) {
if (check.exec(string.charAt(i)) == null) {
testchar = 0;
return 0;
break;
}}
if (testchar !== 0 && string.length == nb) {
return 1;
}
else {
return 0;
}

}


function action_btn_hash() {
$('#zone_hash').slideToggle('slow');
}

function action_btn_crack() {
$('#zone_crack').slideToggle('slow');
}

function action_btn_history() {
$('#zone_history').slideToggle('slow');

var ask = jQuery.post('history.php');

function load_history() {
if (ask.readyState==4) document.getElementById('zone_history').innerHTML = ask.responseText;
}
ask.onreadystatechange = load_history;
}







// fonction qui sert à sélectionner toutes les options d'un select en indiquant l'ID du select en paramètre
function all_selected(id_select) {
var select = document.getElementById(id_select);
var nb_option = select.length;
for (a = 0; a < nb_option; a++)
    {
    select.options[a].selected = true;
    }
}

// fonction qui sert à désélectionner toutes les options d'un select en indiquant l'ID du select en paramètre
function none_selected(id_select) {
var select = document.getElementById(id_select);
var nb_option = select.length;
for (a = 0; a < nb_option; a++)
    {
    select.options[a].selected = false;
    }
}

// fonction qui regarde si un option existe
function exist(id_select,option) {
var select = document.getElementById(id_select);
var nb_option = select.length;
for (a = 0; a < nb_option; a++)
    {
    if (select.options[a].value==option) return 1;
    }
return 0;
	}

// fonction qui sert à récupérer les résultats du select
function know_selected(id_select) {
var select = document.getElementById(id_select);
var nb_option = select.length;
var val;
var selected = Array();
for (a = 0; a < nb_option; a++)
    {
	val = select.options[a].value;
    selected[val] = select.options[a].selected;
	alert(val + '  ' + selected[val]);
    }
	return selected;
}

function nb_selected(id_select) {
var select = document.getElementById(id_select);
var nb_option = select.length;
var nb_true = 0;
for (a = 0; a < nb_option; a++)
    {
    if (select.options[a].selected==true) {
	nb_true++;
	}
    }
	return nb_true;
}