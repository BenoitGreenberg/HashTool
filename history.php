<?php

include('function.php');
$lang = get_language();
$mysqli = mysqli_connect($host,$login,$pass,$db);

$query = "SELECT `string`,`action`,`create_datetime`
FROM `history`
ORDER BY `create_datetime` DESC
LIMIT 100";

$result = mysqli_query($mysqli,$query);


echo '<p>
'.get_text('msg history',$lang).'
</p>

<table>
<tr> <td>'.get_text('value',$lang).'</td> <td>&nbsp;&nbsp;&nbsp;</td> <td>'.get_text('action',$lang).'</td> <td>&nbsp;&nbsp;&nbsp;</td> <td>'.get_text('date',$lang).'</td> </tr>';

while ($line = mysqli_fetch_assoc($result)) {

echo '<tr> <td>'.$line['string'].'</td> <td>&nbsp;&nbsp;&nbsp;</td> <td>'.get_text($line['action'],$lang).'</td> <td>&nbsp;&nbsp;&nbsp;</td> <td>'.$line['create_datetime'].'</td>';
}

echo '</table>';

mysqli_close($mysqli);

?>