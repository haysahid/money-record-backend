<?php
include '../connection.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";

$result = $connect->query($sql);

header("Content-Type: application/json");

if ($result->num_rows > 0) {
    $user = array();
    while ($row = $result->fetch_assoc()) {
        $user[] = $row;
    }
    echo json_encode(array(
        "success" => true,
        "data" => $user[0]
    ));
} else {
    echo json_encode(array(
        "success" => false
    ));
}
