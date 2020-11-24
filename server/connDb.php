<?php
    $conn = new mysqli("localhost","root","","my-notes");
    if($conn->connect_error){
        die("connection failed!!".$conn->connect_error);
    }

    $result = array('error'=>false);
    $action = '';

    if(isset($_GET['acton'])){
        $action = $_GET['action'];
    }

    if($action == 'read'){
        $sql = $conn->query("SELECT * FROM user");
        $user = array();
        while($row = $sql->fetch_assoc()){
            array_push($user, $row);
        }
        $result['user'] = $user;
    }

    echo json_encode($result);
?>