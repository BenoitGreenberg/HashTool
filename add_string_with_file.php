<?php

set_time_limit(0);
include 'function.php';


$mysqli = mysqli_connect($host, $login, $pass, $db);

$filedico = fopen('dico.txt', 'a+');

$nb = 0;

echo 'Début de l\'ajout du fichier dico \r\n <br /> \r\n';

while (!feof($filedico)) {
    $str = trim(fgets($filedico, 100));
    $query = "INSERT INTO `cracktool` (`string`) VALUES ('".$str."')";

    if (mysqli_query($mysqli, $query)) {
        $query = "UPDATE `cracktool`
SET nb_char='".strlen($str)."', 
`md2`='".hash('md2', $str)."', 
`md4`='".hash('md4', $str)."', 
`md5`='".hash('md5', $str)."', 
`sha1`='".hash('sha1', $str)."', 
`sha256`='".hash('sha256', $str)."', 
`sha384`='".hash('sha384', $str)."', 
`sha512`='".hash('sha512', $str)."', 
`ripemd128`='".hash('ripemd128', $str)."', 
`ripemd160`='".hash('ripemd160', $str)."', 
`ripemd256`='".hash('ripemd256', $str)."', 
`ripemd320`='".hash('ripemd320', $str)."', 
`whirlpool`='".hash('whirlpool', $str)."', 
`tiger128,3`='".hash('tiger128,3', $str)."', 
`tiger160,3`='".hash('tiger160,3', $str)."', 
`tiger192,3`='".hash('tiger192,3', $str)."', 
`tiger128,4`='".hash('tiger128,4', $str)."', 
`tiger160,4`='".hash('tiger160,4', $str)."', 
`tiger192,4`='".hash('tiger192,4', $str)."', 
`snefru`='".hash('snefru', $str)."', 
`gost`='".hash('gost', $str)."', 
`adler32`='".hash('adler32', $str)."', 
`crc32`='".hash('crc32', $str)."', 
`crc32b`='".hash('crc32b', $str)."', 
`haval128,3`='".hash('haval128,3', $str)."', 
`haval160,3`='".hash('haval160,3', $str)."', 
`haval192,3`='".hash('haval192,3', $str)."', 
`haval224,3`='".hash('haval224,3', $str)."', 
`haval256,3`='".hash('haval256,3', $str)."', 
`haval128,4`='".hash('haval128,4', $str)."', 
`haval160,4`='".hash('haval160,4', $str)."', 
`haval192,4`='".hash('haval192,4', $str)."', 
`haval224,4`='".hash('haval224,4', $str)."', 
`haval256,4`='".hash('haval256,4', $str)."', 
`haval128,5`='".hash('haval128,5', $str)."', 
`haval160,5`='".hash('haval160,5', $str)."', 
`haval192,5`='".hash('haval192,5', $str)."', 
`haval224,5`='".hash('haval224,5', $str)."', 
`haval256,5`='".hash('haval256,5', $str)."'
WHERE `string`='".$str."' LIMIT 1";

        if (mysqli_query($mysqli, $query)) {
            $nb++;
        }
// usleep(1000);
    }
}
echo $nb.' mots ont été rajoutés \r\n <br /> \r\n';
echo 'Début de l\'optimisation \r\n <br /> \r\n';
sleep(2);
$query = 'OPTIMIZE TABLE `cracktool`';
if (mysqli_query($mysqli, $query)) {
    echo 'Fin de l\'optimisation \r\n <br /> \r\n Tout est OK !!!';
}

/*

low_priority_updates
DELAY_KEY_WRITE
*/;
