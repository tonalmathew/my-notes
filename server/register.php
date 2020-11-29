<?php

    include("connDb.php");
    $result = array('error'=>false);
    $action = '';

    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }

    if($action == 'create'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = $conn->query("INSERT INTO users (name,email,password) VALUES('$name','$email','$password')");
        
        if($sql){
            $result['message'] = "sucessfully Registered";
            $sql = $conn->query("SELECT * FROM users WHERE email='$email'");
            $users = array();
            while($row = $sql->fetch_assoc()){
                array_push($users, $row);
            }
            $result['users'] = $users;
        }
        else{
            $result['error'] = true;
            $result['message'] = "User already exist";
        }
    }

    $conn->close();
    echo json_encode($result);

?>