<?php
    $conn = new mysqli("localhost","root","","my_notes");
    if($conn->connect_error){
        die("connection failed!!".$conn->connect_error);
    }

    $result = array('error'=>false);
    $action = '';

    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }

    if($action == 'read'){
        $email = $_POST['email'];
        $sql = $conn->query("SELECT * FROM users WHERE email='$email'");
        $users = array();
        while($row = $sql->fetch_assoc()){
            array_push($users, $row);
        }
        $result['users'] = $users;
    }

    if($action == 'create'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = $conn->query("INSERT INTO users (name,email,password) VALUES('$name','$email','$password')");
        
        if($sql){
            $result['message'] = "sucessfully Registered";
        }
        else{
            $result['error'] = true;
            $result['message'] = "User already exist";
        }
    }

    if($action == 'update'){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = $conn->query("UPDATE users SET name='$name' ,email='$email' ,password='$password' WHERE id='$id'");
        
        if($sql){
            $result['message'] = "User updated sucessfully!";
        }
        else{
            $result['error'] = true;
            $result['message'] = "Failed to update user!";
        }
    }

    if($action == 'delete'){
        $id = $_POST['id'];
        $sql = $conn->query("DELETE FROM users WHERE id='$id'");
        
        if($sql){
            $result['message'] = "User deleted sucessfully!";
        }
        else{
            $result['error'] = true;
            $result['message'] = "Failed to delete user!";
        }
    }
    $conn->close();
    echo json_encode($result);
?>