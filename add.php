<?php

$str = 'jéromg Luthringer';

$mysqli = mysqli_connect('localhost', 'root', '', 'cracktool');

$query = "INSERT INTO `cracktool` (`string`,`nbchar`,`md2`,`md4`,`md5`,`sha1`,`sha256`,`sha384`,`sha512`,`ripemd128`,`ripemd160`,`whirlpool`,`tiger128,3`,`tiger160,3`,`tiger192,3`,`tiger128,4`,`tiger160,4`,`tiger192,4`,`snefru`,`gost`,`adler32`,`crc32`,`crc32b`,`haval128,3`,`haval160,3`,`haval192,3`,`haval224,3`,`haval256,3`,`haval128,4`,`haval160,4`,`haval192,4`,`haval224,4`,`haval256,4`,`haval128,5`,`haval160,5`,`haval192,5`,`haval224,5`,`haval256,5`) 
VALUES ('".$str."','Char_Length(".$str.")','".hash('md2', $str)."','".hash('md4', $str)."','".hash('md5', $str)."','".hash('sha1', $str)."','".hash('sha256', $str)."','".hash('sha384', $str)."','".hash('sha512', $str)."','".hash('ripemd128', $str)."','".hash('ripemd160', $str)."','".hash('whirlpool', $str)."','".hash('tiger128,3', $str)."','".hash('tiger160,3', $str)."','".hash('tiger192,3', $str)."','".hash('tiger128,4', $str)."','".hash('tiger160,4', $str)."','".hash('tiger192,4', $str)."','".hash('snefru', $str)."','".hash('gost', $str)."','".hash('adler32', $str)."','".hash('crc32', $str)."','".hash('crc32b', $str)."','".hash('haval128,3', $str)."','".hash('haval160,3', $str)."','".hash('haval192,3', $str)."','".hash('haval224,3', $str)."','".hash('haval256,3', $str)."','".hash('haval128,4', $str)."','".hash('haval160,4', $str)."','".hash('haval192,4', $str)."','".hash('haval224,4', $str)."','".hash('haval256,4', $str)."','".hash('haval128,5', $str)."','".hash('haval160,5', $str)."','".hash('haval192,5', $str)."','".hash('haval224,5', $str)."','".hash('haval256,5', $str)."')" or die('Erreur SQL ! <br /><br />'.mysqli_error());

echo $result = mysqli_query($mysqli, $query);

mysqli_close($mysqli);
