// Début Zone Hash

function behavior_zone_hash() {
var id_text = 'zone_hash_text';
var id_select = 'zone_hash_type_hash';

var ok;
var string = document.getElementById(id_text).value;

if (zone_hash_check_string(string)==1) {
ok = 1;
document.getElementById('zone_hash_msg').innerHTML = '';
}
else {
ok = 0;
document.getElementById('zone_hash_msg').innerHTML = 'Caractère interdit';
}

if (nb_selected(id_select)>=1 && ok==1 && string != '') {
document.getElementById('zone_hash_btn_hash').disabled = false;
}
else {
document.getElementById('zone_hash_btn_hash').disabled = true;
}
}

function behavior_zone_hash_btn_all() {
all_selected('zone_hash_type_hash')
}

function behavior_zone_hash_btn_none() {
none_selected('zone_hash_type_hash')
}

function behavior_zone_hash_btn_hash() {
var id_text = 'zone_hash_text';
var id_select = 'zone_hash_type_hash';

var string = document.getElementById(id_text).value;
var data = "string=" + string;
var select = document.getElementById(id_select);

var nb_option = select.length;
var val;
var selected;
for (a = 0; a < nb_option; a++)
    {
	val = select.options[a].value;
	selected = (select.options[a].selected)?1:0;
	if (selected == 1) data += "&" + val + "=" + selected;
    }

var ask = jQuery.post('hash.php', data);

function zone_hash_check_status() {
if (ask.readyState==4) document.getElementById('zone_hash_result').innerHTML = ask.responseText;
}

ask.onreadystatechange = zone_hash_check_status;

}

// Fin Zone Hash

// -----------------------------------------------------------------------------------------

// Début zone Crack

function behavior_zone_crack() {
var id_text = 'zone_crack_text';
var id_select = 'zone_crack_type_hash';
var string = document.getElementById(id_text).value;
var ok;

if (zone_crack_check_string(string)==1) {
ok = 1;
document.getElementById('zone_crack_msg').innerHTML = '';
}
else {
ok = 0;
document.getElementById('zone_crack_msg').innerHTML = 'Seuls les caractères héxadécimaux sont autorisés';
}

if (nb_selected(id_select)>=1 && ok==1 && string != '') {
document.getElementById('zone_crack_btn_crack').disabled = false;
}
else {
document.getElementById('zone_crack_btn_crack').disabled = true;
}



}




function behavior_zone_crack_text(selected) {
if (selected!=true) selected=false;
function obj_hash(name,nb_char,order) {
      this.name = name;
      this.nb_char = nb_char;
      this.order = order;
   }

var array_hash_nb_char = Array(new obj_hash('md2','32','1'),new obj_hash('md4','32','2'),new obj_hash('md5','32','3'),new obj_hash('sha1','40','4'),new obj_hash('sha256','64','5'),new obj_hash('sha384','96','6'),new obj_hash('sha512','128','7'),new obj_hash('ripemd128','32','8'),new obj_hash('ripemd160','40','9'),new obj_hash('ripemd256','64','10'),new obj_hash('ripemd320','80','11'),new obj_hash('whirlpool','128','12'),new obj_hash('tiger128,3','32','13'),new obj_hash('tiger160,3','40','14'),new obj_hash('tiger192,3','48','15'),new obj_hash('tiger128,4','32','16'),new obj_hash('tiger160,4','40','17'),new obj_hash('tiger192,4','48','18'),new obj_hash('snefru','64','19'),new obj_hash('gost','64','20'),new obj_hash('adler32','8','21'),new obj_hash('crc32','8','22'),new obj_hash('crc32b','8','23'),new obj_hash('haval128,3','32','24'),new obj_hash('haval160,3','40','25'),new obj_hash('haval192,3','48','26'),new obj_hash('haval224,3','56','27'),new obj_hash('haval256,3','64','28'),new obj_hash('haval128,4','32','29'),new obj_hash('haval160,4','40','30'),new obj_hash('haval192,4','48','31'),new obj_hash('haval224,4','56','32'),new obj_hash('haval256,4','64','33'),new obj_hash('haval128,5','32','34'),new obj_hash('haval160,5','40','35'),new obj_hash('haval192,5','48','36'),new obj_hash('haval224,5','56','37'),new obj_hash('haval256,5','64','38'));

var string = document.getElementById('zone_crack_text').value;
select = document.getElementById('zone_crack_type_hash');

for (i=select.length;select.length>=i && i!=0;i--) select.options[select.length-1] = null;

for (i=0;i<array_hash_nb_char.length;i++) {
if (string.length == array_hash_nb_char[i].nb_char && !exist('zone_crack_type_hash',array_hash_nb_char[i].name)) {
new_option = new Option(array_hash_nb_char[i].name,array_hash_nb_char[i].name,false,selected);
select.options[select.length] = new_option;
}
/*
else {
for (k=array_hash_nb_char;k<=array_hash_nb_char.length;k--) {
if (string.length != array_hash_nb_char[k].nb_char && exist('zone_crack_type_hash',array_hash_nb_char[k].name)) {
select.options[k] = null;
}
}
*/
}
behavior_zone_crack();
}

function behavior_zone_crack_btn_all() {
behavior_zone_crack_text(true)
}

function behavior_zone_crack_btn_none() {
behavior_zone_crack_text(false)
}

function behavior_zone_crack_btn_crack() {

var id_text = 'zone_crack_text';
var id_select = 'zone_crack_type_hash';

var string = document.getElementById(id_text).value;
var data = "string=" + string;
var select = document.getElementById(id_select);

var nb_option = select.length;
var val;
var selected;
for (a = 0; a < nb_option; a++)
    {
	val = select.options[a].value;
	selected = (select.options[a].selected)?1:0;
	if (selected == 1) data += "&" + val + "=" + selected;
    }

var ask = jQuery.post('crack.php', data);

function zone_crack_check_status() {
if (ask.readyState==4) document.getElementById('zone_crack_result').innerHTML = ask.responseText;
}

ask.onreadystatechange = zone_crack_check_status;

}


function behavior_zone_crack_email() {
var email = document.getElementById('zone_crack_email').value;

if (zone_crack_check_email(email)) document.getElementById('zone_crack_btn_email').disabled = false;
else document.getElementById('zone_crack_btn_email').disabled = true;

}



function behavior_zone_crack_btn_email() {
var email = document.getElementById('zone_crack_email').value;
var hash = document.getElementById('zone_crack_email_hash').value;
var data = 'email=' + email + '&hash=' + hash;
var ask = jQuery.post('email.php', data);

function zone_crack_email_check_status() {
if (ask.readyState==4) document.getElementById('zone_crack_result').innerHTML = ask.responseText;
}
ask.onreadystatechange = zone_crack_email_check_status;
}


// Fin zonne Crack

function start() {
$("#zone_hash").slideToggle("slow");
$("#zone_crack").slideToggle("slow");
behavior_zone_hash();
behavior_zone_crack();
behavior_zone_crack_text();
}