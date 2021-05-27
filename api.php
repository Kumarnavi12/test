<?php
header('Content-Type:application/json');
$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => 'http://localhost/kumar/CreateTestApis/TestApi.php/12',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_CUSTOMREQUEST => 'DELETE',
CURLOPT_HTTPHEADER => array(
'api-key: abcdef1234567',
'Content-Type: application/json',
'Authorization: Basic a3VtYXI6MTIzNDU2'
),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>