<?php

set_time_limit(0);
include 'function.php';
$lang = get_language();
$str = $_POST['string'];
$array_hash = hash_algos();
$nb_result = 0;

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
    echo '<p>
'.get_text('crack of', $lang).' <span id="red">'.$str.'</span> &nbsp; (';

    for ($i = 0; $i < count($array_hash); $i++) {
        if ($_POST[$array_hash[$i]] == 1) {
            echo ' '.$array_hash[$i].' ';
        }
    }

    echo ')
</p>
<table>
<tr> <th>'.get_text('string', $lang).'</th> <td>&nbsp;&nbsp;&nbsp;&nbsp;</td> <th>'.get_text('hash type', $lang).'</th> </tr>
<tr> <td></td> <td></td> <td></td> </tr>';

    for ($i = 1; $i < count($result_crack) + 1; $i++) {
        echo '<tr> <td>'.$result_crack[$i]->str.'</td> <td>&nbsp;&nbsp;&nbsp;</td> <td>'.$result_crack[$i]->hash_type.'</td> </tr>';
    }
    echo '</table>';

    $query = "INSERT INTO `history` (`string`,`action`) VALUES ('".$str."','crack_succeed')";
    mysqli_query($mysqli, $query);
} else {
    echo '<p>
'.get_text('crack of', $lang).' <span id="red">'.$str.'</span> &nbsp; (';

    for ($i = 0; $i < count($array_hash); $i++) {
        if ($_POST[$array_hash[$i]] == 1) {
            echo ' '.$array_hash[$i].' ';
        }
    }

    echo ')
<br /><br />
'.get_text('no solution', $lang).'

<br /><br />

'.get_text('msg email', $lang).'
<br />
<input type="hidden" id="zone_crack_email_hash" value="'.$str.'"/>
email: <input type="text" id="zone_crack_email" size="40" maxlength="128" onkeyup="behavior_zone_crack_email();"/>
&nbsp;&nbsp;
<input type="button" id="zone_crack_btn_email" value="OK" disabled="disabled" onclick="behavior_zone_crack_btn_email();" />
</p>';


    $query = "INSERT INTO `history` (`string`,`action`) VALUES ('".$str."','crack_failed')";
    mysqli_query($mysqli, $query);
}

mysqli_close($mysqli);
