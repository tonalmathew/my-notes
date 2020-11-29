<?php

    $conn = new mysqli("localhost","root","","my_notes");
    if($conn->connect_error){
        die("connection failed!!".$conn->connect_error);
    }

?>