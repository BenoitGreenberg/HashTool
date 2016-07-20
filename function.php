<?php

/*

// ONLINE

$host = 'mysql';
$login = 'unrealnetwork';
$pass = 'msdnmsdn';
$db = '_hashtool';

*/


// LOCAL

$host = 'mysql51-56.bdb';
$login = 'innovabishash';
$pass = 'sscmsb200';
$db = 'innovabishash';


function get_language()
{
    function check_language($l)
    {
        $array_lang = ['en', 'fr'];
        for ($i = 0; $i < count($array_lang); $i++) {
            if ($l == $array_lang[$i]) {
                return 1;
            }
        }

        return 0;
    }

    if (check_language($_GET['lang'])) {
        setcookie('language', $_GET['lang'], time() + 2592000);

        return $_GET['lang'];
    }

    if (check_language($_COOKIE['language'])) {
        return $_COOKIE['language'];
    } else {
        $lang = strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
        if (check_language($lang)) {
            return $lang;
        }
    }
}


function get_text($id_text, $lang)
{
    $host = 'mysql51-56.bdb';
    $login = 'innovabishash';
    $pass = 'sscmsb200';
    $db = 'innovabishash';

    $explode = explode('/', $_SERVER['PHP_SELF']);

    $mysqli_text = mysqli_connect($host, $login, $pass, $db);

    $query = 'SELECT `'.$lang."`
FROM `text`
WHERE `id_text`='".$id_text."' AND `file`='".$explode[2]."'
LIMIT 1";

    $result = mysqli_query($mysqli_text, $query);

    $line = mysqli_fetch_assoc($result);
    mysqli_close($mysqli_text);

    return $line[$lang];
}
