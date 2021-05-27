<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        global $nameErr, $phnoErr, $cityErr, $pincodeErr;
        $nameErr = $phnoErr = $cityErr = $pincodeErr = true;

        if (empty($data["name"])) {
            $nameErr = false;
        } else {
            if (strlen($data["name"]) < '3') {
                $nameErr = false;
            } elseif (!preg_match("#[A-Za-z]+#", $data['name'])) {
                $nameErr = false;
            } else {
                $name = $data["name"];
            }
        }
        if (empty($data["phno"])) {
            $phnoErr = false;
        } else {
            if (strlen($data["phno"]) != '10') {
                $phnoErr = false;
            } elseif (!preg_match("#[6789][0-9]{9}+#", $data['phno'])) {
                $phnoErr = false;
            } else {
                $phno = $data["phno"];
            }
        }
        if (empty($data["city"])) {
            $cityErr = "city is required";
        } else {
            if (!preg_match("#[A-Za-z]+#", $data['city'])) {
                $phnoErr = false;
            } else {
                $city = $data["city"];
            }
        }
        if (empty($data["pincode"])) {
            $pincodeErr = false;
        } else {
            if (!preg_match("#[0-9]+#", $data['pincode'])) {
                $pincodeErr = false;
            } else {
                $pincode = $data["pincode"];
            }
        }
    } else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        global $nameErr, $phnoErr, $cityErr, $pincodeErr;
        $nameErr = $phnoErr = $cityErr = $pincodeErr = true;
        if (isset($data['name'])) {
            if (strlen($data["name"]) < '3') {
                $nameErr = false;
            } elseif (!preg_match("#[A-Za-z]+#", $data['name'])) {
                $nameErr = false;
            } else {
                $name = $data["name"];
            }
        } else {
            $sql = "SELECT * FROM `postdata` WHERE id=$id";
            $output = mysqli_query($conn, $sql);
            foreach ($output as $record) {
                $name = $record['name'];
                //echo $name."<br>";
            }
        }
        if (isset($data['phno'])) {
            if (strlen($data["phno"]) != '10') {
                $phnoErr = false;
            } elseif (!preg_match("#[6789][0-9]{9}+#", $data['phno'])) {
                $phnoErr = false;
            } else {
                $phno = $data["phno"];
            }
        } else {
            $sql = "SELECT * FROM `postdata` WHERE id=$id";
            $output = mysqli_query($conn, $sql);
            foreach ($output as $record) {
                $phno = $record['phno'];
                //echo $phno."<br>";
            }
        }
        if (isset($data['city'])) {
            if (!preg_match("#[A-Za-z]+#", $data['city'])) {
                $phnoErr = false;
            } else {
                $city = $data["city"];
            }
        } else {
            $sql = "SELECT * FROM `postdata` WHERE id=$id";
            $output = mysqli_query($conn, $sql);
            foreach ($output as $record) {
                $city = $record['city'];
                //echo $city."<br>";
            }
        }
        if (isset($data['pincode'])) {
            if (!preg_match("#[0-9]+#", $data['pincode'])) {
                $pincodeErr = false;
            } else {
                $pincode = $data["pincode"];
            }
        } else {
            $sql = "SELECT * FROM `postdata` WHERE id=$id";
            $output = mysqli_query($conn, $sql);
            foreach ($output as $record) {
                $pincode = $record['pincode'];
                // echo $pincode."<br>";
            }
        }
    }

?>