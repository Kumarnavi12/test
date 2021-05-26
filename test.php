<?php
/*// Account details
$apiKey = urlencode('YzU0ZDFjM2VjZGMzNTczMGI5ZDcxYWU2ZWM0Mzg3MDE=');

// Message details
$numbers = array(917795533858);
$sender = urlencode('KUMARN');
$message = rawurlencode('This is your message');

$numbers = implode(',', $numbers);

// Prepare data for POST request
$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

// Send the POST request with cURL
$ch = curl_init('https://api.textlocal.in/send/');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Process your response here
echo $response;
*/
/*$conn=mysqli_connect("localhost","root","","mysql");
$sql="SELECT brand_name FROM carbrands";
$result=mysqli_query($conn,$sql);
foreach($result as $data){
    echo $data['brand_name'];
}

$str="";
echo strlen($str);

header("Expires: Sun, 25 Jul 1997 06:02:34 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
foreach(headers_list() as $header) {
    echo $header."<br>";
}
*/
$url="http://mailjoe.com/Honda/test.php";
$curl=curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL=>$url,
    CURLOPT_RETURNTRANSFER=>true,
    CURLOPT_CUSTOMREQUEST=>'GET'
));
$response=curl_exec($curl);
curl_close($curl);

$data = new SimpleXMLElement($response);
foreach ($data->children() as $records) {
    if(property_exists($records,"Photo1")) {
        foreach($records as $childkey=>$childvalue){
            if(stripos($childkey,"Photo")!==false){
                if($childkey==="Photo1"){
                    $photos=$childvalue;
                }else{
                    $photos="<NextPhoto>".$childvalue;
                }
            }
        }
    }
    echo $photos."<br>";
}
/*
$url="https://images10.gaadicdn.com/usedcar_image/original/replace_img_6092277ec0607_1620191102.png<NextPhoto>https://images10.gaadicdn.com/usedcar_image/original/img_409433889.jpg<NextPhoto>https://images10.gaadicdn.com/usedcar_image/original/img_822690766.jpg<NextPhoto>https://images10.gaadicdn.com/usedcar_image/original/img_334191858.jpg<NextPhoto>https://images10.gaadicdn.com/usedcar_image/original/img_235993195.jpg<NextPhoto>https://images10.gaadicdn.com/usedcar_image/original/img_695728474.jpg<NextPhoto>https://images10.gaadicdn.com/usedcar_image/original/img_938579941.jpg<NextPhoto>https://images10.gaadicdn.com/usedcar_image/original/img_401";
echo $url;
*/
?>