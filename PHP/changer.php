<?php
echo '¡Hola ' . htmlspecialchars($_GET["nombre"]) . '!';

$jsonString = file_get_contents('ejem.json');
$data = json_decode($jsonString, true);

//$data[0]['activity_name'] = $_GET["nombre"];
// or if you want to change all entries with activity_code "1"
foreach ($data as $key => $entry) {
	if ($entry['activity_code'] == '1') {
		$data[$key]['activity_name'] = $_GET["nombre"];
	}
}
$newJsonString = json_encode($data);
file_put_contents('ejem.json', $newJsonString);

echo $newJsonString;

?>