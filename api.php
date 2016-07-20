<?php


include 'function.php';
$lang = get_language();

/* ----- Mode HASH ----- */

if ($_POST['mode'] == 'hash') {
    $str = $_POST['string'];
    $array_hash = hash_algos();
    for ($i = 0; $i < count($array_hash); $i++) {
        if ($_POST[$array_hash[$i]] == 1) {
            echo $array_hash[$i].':'.hash($array_hash[$i], $str).'\r\n';
        }
    }

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
}


/* ----- Mode CRACK ----- */

if ($_POST['mode'] == 'crack') {
    class result
    {
        public $name;
        public $hash_type;

        public function result($str, $hash_type)
        {
            $this->str = $str;
            $this->hash_type = $hash_type;
        }
    }

    $mysqli = mysqli_connect($host, $login, $pass, $db);


    for ($i = 0; $i < count($array_hash); $i++) {
        if ($_POST[$array_hash[$i]] == 1) {
            $query = 'SELECT `string` FROM `cracktool` WHERE `'.$array_hash[$i]."`='".$str."'";
            $result = mysqli_query($mysqli, $query);

            if (mysqli_num_rows($result) > 0) {
                $nb_result++;
                $array_mysql = mysqli_fetch_assoc($result);
                $result_crack[$nb_result] = new result($array_mysql['string'], $array_hash[$i]);
            }
        }
    }

    if ($nb_result > 0) {
        for ($i = 0; $i < count($array_hash); $i++) {
            if ($_POST[$array_hash[$i]] == 1) {
                echo ' '.$array_hash[$i].' ';
            }
        }

        for ($i = 1; $i < count($result_crack) + 1; $i++) {
            echo $result_crack[$i]->str.':'.$result_crack[$i]->hash_type;
        }

        $query = "INSERT INTO `history` (`string`,`action`) VALUES ('".$str."','crack_succeed')";
        mysqli_query($mysqli, $query);

        mysqli_close($mysqli);
    }
    $query = "INSERT INTO `history` (`string`,`action`) VALUES ('".$str."','crack_failed')";
    mysqli_query($mysqli, $query);
}
