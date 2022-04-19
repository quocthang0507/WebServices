<?php

$userEmail = isset($_POST["email"]) ? $_POST["email"] : die();
$userPassword = isset($_POST["password"]) ? $_POST["password"] : die();

function authentication($user_email, $user_password)
{
    $users = array(
        "a@dlu.edu.vn" => array("email" => "a@dlu.edu.vn", "password" => "a", "fullname" => "Nguyễn Văn A", "score" => 7.5),
        "b@dlu.edu.vn" => array("email" => "b@dlu.edu.vn", "password" => "b", "fullname" => "Trần An Bình", "score" => 10)
    ); //Mảng kết hợp

    foreach ($users as $email => $info) {
        if ($email == $user_email && $info["password"] == $user_password) {
            return $info;
        }
    }
    return null;
}

$result = authentication($userEmail, $userPassword);
if ($result != null) {
    http_response_code(200);
    $user_arr = array(
        "authen" => true,
        "data" => array(
            "email" => $result["email"],
            "fullname" => $result["fullname"],
            "score" => $result["score"]
        ),
        "message" => "Successfully login"
    );
    print_r(json_encode($user_arr));
} else {
    http_response_code(401);
    $user_arr = array(
        "authen" => false,
        "data" => "",
        "message" => "Unsuccessfully login"
    );
    print_r(json_encode($user_arr));
}
