<?php
if(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER["PHP_AUTH_PW"])){
    $_SERVER['PHP_AUTH_USER']=0;
    $_SERVER['PHP_AUTH_PW']=0;
}

$api_key="abcdef1234567";
$headers=apache_request_headers();
if(empty($headers['api-key'])) {
    $headers['api-key'] = 0;
}
if(empty($headers['Content-Type'])) {
    $headers['Content-Type'] = 0;
}
if(($_SERVER['PHP_AUTH_USER']=='kumar') && ($_SERVER['PHP_AUTH_PW']=='123456') && $headers['api-key']===$api_key && $headers['Content-Type']==='application/json') {
    require('db.php');
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        http_response_code(200);
        header('Content-Type:application/json');
        $sql = "SELECT * FROM `postdata`";
        $result = mysqli_query($conn, $sql);

        $json_data = array();
        foreach ($result as $rec) {
            $json_array['id'] = $rec['id'];
            $json_array['name'] = $rec['name'];
            $json_array['phno'] = $rec['phno'];
            $json_array['city'] = $rec['city'];
            $json_array['pincode'] = $rec['pincode'];
            $json_array['date'] = $rec['date'];
            array_push($json_data, $json_array);
        }
        echo json_encode($json_data, JSON_PRETTY_PRINT);
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);
        require('validate.php');
        if (($nameErr == true) && ($phnoErr == true) && ($cityErr == true) && ($pincodeErr == true)) {
            $checkExistingData = "SELECT * FROM `postdata` WHERE phno='$phno' OR name='$name'";
            $resultcheckExistingData = mysqli_query($conn, $checkExistingData);
            $countExistingData = mysqli_num_rows($resultcheckExistingData);

            if ($countExistingData != 0) {
                header(http_response_code(409));
                echo json_encode(array('created' => '409', 'message' => 'Leads are already exists'));
            } else {
                date_default_timezone_set('Asia/Kolkata');
                $date = date('y-m-d H:i:s');

                $sql = "INSERT INTO `postdata`(name, phno, city, pincode,date)VALUES
		        ('" . $name . "','" . $phno . "' ,'" . $city . "','" . $pincode . "','" . $date . "')";

                $output = mysqli_query($conn, $sql);

                if (!empty($output)) {
                    header(http_response_code(201));
                    echo json_encode(array('created' => '201', 'message' => 'Data successfully inserted'));
                } else {
                    header(http_response_code(404));
                    echo json_encode(array('error' => '404', 'message' => 'Data is not successfully inserted'));
                }
            }
        } else {
            header(http_response_code(422));
            echo json_encode(array('error' => '422', 'message' => 'Invalid data'));
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        $data = json_decode(file_get_contents("php://input"), true);
        $data1 = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        if (empty($data1[4])) {
            $id = 0;
            //echo "okay";
        } else {
            $id = $data1[4];
            //echo "not ok";
        }
        //echo $id;
        //echo $data[4];
        require('validate.php');
        if (($nameErr == true) && ($phnoErr == true) && ($cityErr == true) && ($pincodeErr == true) && ($id != 0)) {
            $checkExistingData = "SELECT * FROM `postdata` WHERE phno='$phno' AND name='$name'";
            $resultcheckExistingData = mysqli_query($conn, $checkExistingData);
            $countExistingData = mysqli_num_rows($resultcheckExistingData);

            if ($countExistingData != 0) {
                header(http_response_code(409));
                echo json_encode(array('created' => '409', 'message' => 'Leads are already exists'));
            } else {
                date_default_timezone_set('Asia/Kolkata');
                $date = date('y-m-d H:i:s');

                $sql = "UPDATE `postdata` SET `name`='" . $name . "',`phno`='" . $phno . "',`city`='" . $city . "',`pincode`='" . $pincode . "',`date`='" . $date . "' WHERE id=$id";
                $output = mysqli_query($conn, $sql);
                if ($output) {
                    header(http_response_code(200));
                    echo json_encode(array('created' => '200', 'message' => 'Data successfully Updated'));
                } else {
                    header(http_response_code(404));
                    echo $conn->error . "<br>";
                    echo json_encode(array('error' => '404', 'message' => 'Data is not successfully Updated'));
                }
            }
        } else if ($id == 0) {
            header(http_response_code(400));
            echo json_encode(array('error' => '400', 'message' => 'Please enter valid ID in URL'));
        } else {
            header(http_response_code(422));
            echo json_encode(array('error' => '422', 'message' => 'Invalid data'));
        }
    } else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        $data1 = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        if (empty($data1[4])) {
            $id = 0;
            // echo $id;
        } else {
            $id = $data1[4];
            // echo $id;
        }
        $sql = "DELETE FROM `postdata` WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header(http_response_code(200));
            echo json_encode(array('created' => '200', 'message' => 'Data successfully Deleted'));
        } else {
            header(http_response_code(400));
            echo json_encode(array('error' => '400', 'message' => 'Data successfully not Deleted'));
        }
    }
} else {
    header(http_response_code(404));
    echo json_encode(array('error' => '404', 'message' => 'Unauthorized'));
}
?>