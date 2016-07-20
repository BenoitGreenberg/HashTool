<?php

include 'function.php';
$lang = get_language();
$str = $_POST['string'];

$array_hash = hash_algos();

echo '<table>
<tr> <th>'.get_text('hash type', $lang).'</th> <td>&nbsp;&nbsp;&nbsp;&nbsp;</td> <th>'.get_text('hash', $lang).'</th> </tr>
<tr> <td></td> <td></td> <td></td> </tr>';

for ($i = 0; $i < count($array_hash); $i++) {
    if ($_POST[$array_hash[$i]] == 1) {
        echo '<tr> <td>'.$array_hash[$i].'</td> <td>&nbsp;&nbsp;&nbsp;&nbsp;</td> <td>'.hash($array_hash[$i], $str).'</td> </tr>';
    }
}

echo '</table>';

if (strlen($str) <= 64) {
    $mysqli = mysqli_connect($host, $login, $pass, $db);

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

        if (mysqli_query($mysqli, $query) == 1) {
            $query = "INSERT INTO `history` (`string`,`action`) VALUES ('".$str."','add_string')";
            mysqli_query($mysqli, $query);
        }
    }
    mysqli_close($mysqli);
}

/*
$query = "INSERT INTO `cracktool` (`string`,`nbchar`,`md2`,`md4`,`md5`,`sha1`,`sha256`,`sha384`,`sha512`,`ripemd128`,`ripemd160`,`ripemd256`,`ripemd320`,`whirlpool`,`tiger128,3`,`tiger160,3`,`tiger192,3`,`tiger128,4`,`tiger160,4`,`tiger192,4`,`snefru`,`gost`,`adler32`,`crc32`,`crc32b`,`haval128,3`,`haval160,3`,`haval192,3`,`haval224,3`,`haval256,3`,`haval128,4`,`haval160,4`,`haval192,4`,`haval224,4`,`haval256,4`,`haval128,5`,`haval160,5`,`haval192,5`,`haval224,5`,`haval256,5`)
VALUES ('".$str."','Char_Length(".$str.")','".hash('md2',$str)."','".hash('md4',$str)."','".hash('md5',$str)."','".hash('sha1',$str)."','".hash('sha256',$str)."','".hash('sha384',$str)."','".hash('sha512',$str)."','".hash('ripemd128',$str)."','".hash('ripemd160',$str)."','".hash('ripemd256',$str)."','".hash('ripemd320',$str)."','".hash('whirlpool',$str)."','".hash('tiger128,3',$str)."','".hash('tiger160,3',$str)."','".hash('tiger192,3',$str)."','".hash('tiger128,4',$str)."','".hash('tiger160,4',$str)."','".hash('tiger192,4',$str)."','".hash('snefru',$str)."','".hash('gost',$str)."','".hash('adler32',$str)."','".hash('crc32',$str)."','".hash('crc32b',$str)."','".hash('haval128,3',$str)."','".hash('haval160,3',$str)."','".hash('haval192,3',$str)."','".hash('haval224,3',$str)."','".hash('haval256,3',$str)."','".hash('haval128,4',$str)."','".hash('haval160,4',$str)."','".hash('haval192,4',$str)."','".hash('haval224,4',$str)."','".hash('haval256,4',$str)."','".hash('haval128,5',$str)."','".hash('haval160,5',$str)."','".hash('haval192,5',$str)."','".hash('haval224,5',$str)."','".hash('haval256,5',$str)."')" or die("Erreur SQL ! <br /><br />".mysqli_error());
echo $result = mysqli_query($mysqli,$query);
*/;
