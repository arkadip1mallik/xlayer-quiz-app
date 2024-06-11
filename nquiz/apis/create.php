<?php

include("../connect.php");

header("Content-Type: application/json");
$request_method = $_SERVER["REQUEST_METHOD"];

if ($request_method == "POST") {
    $json_data = file_get_contents("php://input");
    $data = json_decode($json_data, true);

    $name = isset($data["name"]) ? $data["name"] : "";
    $email = isset($data["email"]) ? $data["email"] : "";
    $password = isset($data["password"]) ? $data["password"] : "";
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    $address = "xLayer Technologies";
    $teacherId = uniqid('TCH-');

    $doesPasswordMatch = password_verify($password, $encrypted_password);


    if (empty(trim($name)) || empty(trim($email)) || empty(trim($password))) {
        http_response_code(500);

        

        echo json_encode(array(
            'status' => false,
            'message' => 'Please fill all the data to continue',
        ), JSON_PRETTY_PRINT);
    } else {
        $sql = "INSERT INTO teacher (`id`,`Name`, `Email`, `Password`, `Phone Number`, `Address`)
             VALUES ('$teacherId','$name','$email','$encrypted_password','03812384444', '$address')";

        $result = mysqli_query($conn, $sql);

        http_response_code(201);
        echo json_encode(array(
            'status' => true,
            'message' => 'Account Created Successfully',
            'data' => [
                'name' => $name,
                'email' => $email,
                'password' => $encrypted_password,
                'hashMatch' => $doesPasswordMatch
            ]
        ), JSON_PRETTY_PRINT);
    }
} else {
    http_response_code(405);
    echo json_encode(array(
        'status' => false,
        'message' => 'Method not Allowed',
    ), JSON_PRETTY_PRINT);
}
