<?php

include('function.php');
$lang = get_language();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="<?php echo $lang; ?>" />
<meta http-equiv="imagetoolbar" content="no" />
<meta name="robots" content="index,follow" />
<meta name="keywords" content="<?php echo get_text('keyword',$lang); ?>" />
<meta name="description" content="<?php echo get_text('description',$lang); ?>" />
<meta name="rating" content="general" />
<meta name="author" content="Benoît GRUNENBERGER" />
<meta name="copyright" content="Benoît GRUNENBERGER" />
<meta name="generator" content="Bloc-Note" />
<meta name="distribution" content="Global" />
<meta name="publisher" content="Benoît GRUNENBERGER" />
<link href="http://www.egrunenberger.com/favicon.ico" rel="SHORTCUT ICON" />
<link rel="stylesheet" type="text/css" media="all" href="style.css" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="function.js"></script>
<script type="text/javascript" src="behavior.js"></script>
<title><?php echo get_text('title',$lang); ?></title>

</head>

<body id="main" onload="start();">

<input type="button" id="btn_hash" value="<?php echo get_text('to hash',$lang); ?>" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" id="btn_crack" value="<?php echo get_text('to crack',$lang); ?>" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" id="btn_history" value="<?php echo get_text('history',$lang); ?>" />




<div id="zone_hash">
<p><?php echo get_text('hash string',$lang); ?></p>
<input type="text" id="zone_hash_text" size="64" maxlength="128" />
&nbsp;&nbsp;&nbsp;
<span id="zone_hash_msg"></span>

<br /><br />

<select id="zone_hash_type_hash" multiple="multiple" >
<option value="md2" >md2</option>
<option value="md4" >md4</option>
<option value="md5" >md5</option>
<option value="sha1" >sha1</option>
<option value="sha256" >sha256</option>
<option value="sha384" >sha384</option>
<option value="sha512" >sha512</option>
<option value="ripemd128" >ripemd128</option>
<option value="ripemd160" >ripemd160</option>
<option value="ripemd256" >ripemd256</option>
<option value="ripemd320" >ripemd320</option>
<option value="whirlpool" >whirlpool</option>
<option value="tiger128,3" >tiger128,3</option>
<option value="tiger160,3" >tiger160,3</option>
<option value="tiger192,3" >tiger192,3</option>
<option value="tiger128,4" >tiger128,4</option>
<option value="tiger160,4" >tiger160,4</option>
<option value="tiger192,4" >tiger192,4</option>
<option value="snefru" >snefru</option>
<option value="gost" >gost</option>
<option value="adler32" >adler32</option>
<option value="crc32" >crc32</option>
<option value="crc32b" >crc32b</option>
<option value="haval128,3" >haval128,3</option>
<option value="haval160,3" >haval160,3</option>
<option value="haval192,3" >haval192,3</option>
<option value="haval224,3" >haval224,3</option>
<option value="haval256,3" >haval256,3</option>
<option value="haval128,4" >haval128,4</option>
<option value="haval160,4" >haval160,4</option>
<option value="haval192,4" >haval192,4</option>
<option value="haval224,4" >haval224,4</option>
<option value="haval256,4" >haval256,4</option>
<option value="haval128,5" >haval128,5</option>
<option value="haval160,5" >haval160,5</option>
<option value="haval192,5" >haval192,5</option>
<option value="haval224,5" >haval224,5</option>
<option value="haval256,5" >haval256,5</option>
</select>
<input type="button" id="zone_hash_btn_all" value="<?php echo get_text('all',$lang); ?>" />
&nbsp;&nbsp;
<input type="button" id="zone_hash_btn_none" value="<?php echo get_text('nothing',$lang); ?>" />
<br /><br />
<input type="button" id="zone_hash_btn_hash" value="<?php echo get_text('to hash',$lang); ?>" disabled="disabled" />
<br /><br />
<div id="zone_hash_result"></div>

</div>

<!-- ------------------------------------------------------------- LIMIT HASH / CRACK ------------------------------------------------------------ !-->

<div id="zone_crack">
<p><?php echo get_text('crack hash',$lang); ?></p>
<input type="text" id="zone_crack_text" size="64" maxlength="128" />
&nbsp;&nbsp;&nbsp;
<span id="zone_crack_msg"></span>
<br /><br />
<select id="zone_crack_type_hash" multiple="multiple">
<option value="md2" >md2</option>
<option value="md4" >md4</option>
<option value="md5" >md5</option>
<option value="sha1" >sha1</option>
<option value="sha256" >sha256</option>
<option value="sha384" >sha384</option>
<option value="sha512" >sha512</option>
<option value="ripemd128" >ripemd128</option>
<option value="ripemd160" >ripemd160</option>
<option value="ripemd256" >ripemd256</option>
<option value="ripemd320" >ripemd320</option>
<option value="whirlpool" >whirlpool</option>
<option value="tiger128,3" >tiger128,3</option>
<option value="tiger160,3" >tiger160,3</option>
<option value="tiger192,3" >tiger192,3</option>
<option value="tiger128,4" >tiger128,4</option>
<option value="tiger160,4" >tiger160,4</option>
<option value="tiger192,4" >tiger192,4</option>
<option value="snefru" >snefru</option>
<option value="gost" >gost</option>
<option value="adler32" >adler32</option>
<option value="crc32" >crc32</option>
<option value="crc32b" >crc32b</option>
<option value="haval128,3" >haval128,3</option>
<option value="haval160,3" >haval160,3</option>
<option value="haval192,3" >haval192,3</option>
<option value="haval224,3" >haval224,3</option>
<option value="haval256,3" >haval256,3</option>
<option value="haval128,4" >haval128,4</option>
<option value="haval160,4" >haval160,4</option>
<option value="haval192,4" >haval192,4</option>
<option value="haval224,4" >haval224,4</option>
<option value="haval256,4" >haval256,4</option>
<option value="haval128,5" >haval128,5</option>
<option value="haval160,5" >haval160,5</option>
<option value="haval192,5" >haval192,5</option>
<option value="haval224,5" >haval224,5</option>
<option value="haval256,5" >haval256,5</option>
</select>
<input type="button" id="zone_crack_btn_all" value="<?php echo get_text('all',$lang); ?>" />
&nbsp;&nbsp;
<input type="button" id="zone_crack_btn_none" value="<?php echo get_text('nothing',$lang); ?>" />
<br /><br />
<input type="button" id="zone_crack_btn_crack" value="<?php echo get_text('to crack',$lang); ?>" disabled="disabled" />
<br /><br />
<div id="zone_crack_result"></div>

</div>

<div id="zone_history"><div>

</body>
<script type="text/javascript" src="event.js"></script>
</html>


