<?php
// membuka file JSON
$file = file_get_contents('http://localhost/10122089/json_konversi.php');
$json = json_decode($file, true);

foreach ($json as $key) {
if (is_array($key)) {
foreach ($key as $key => $value) {
echo $key . ' : ' . $value . '<br />';
}
}
echo "<br>";
}

?>