<?php

include("connDb.php");
$result = array('error'=>false);
$action = '';

if(isset($_GET['action'])){
    $action = $_GET['action'];
}

if($action == 'create'){
    $email = $_POST['email'];
    // $password = $_POST['password'];
    $sql = $conn->query("SELECT * FROM users WHERE email='$email'");
    $users = array();
    while($row = $sql->fetch_assoc()){
        array_push($users, $row);
    }
    // if($password == $users['password']){
        $result['users'] = $users;
    // }
    // else{
    //     $result['error'] = true;
    //     $result['message'] = "Wrong password";
    // }
    
}
$conn->close();
echo json_encode($result);

?>