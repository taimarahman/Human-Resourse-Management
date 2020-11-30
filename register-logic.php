<?php

session_start();
$message = "";
if (count($_POST) > 0) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        include 'db_connection_sadia.php';
        $conn = OpenCon();
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        
        $sql = "INSERT INTO login(username,password) VALUES('$username','$password');";
        $conn->query($sql);
        
        $sql = "SELECT username, password from login where username='" . $_POST['username'] . "' and password='" . $_POST['password'] . "' limit 1";
        $result = $conn->query($sql);
       
            if ($result->num_rows > 0) {
                
            $single = $result->fetch_assoc();
            $_SESSION['id'] = $single['username'];
            header("Location:welcome.php");
        }
         
         else {
        header("Location:index.php");
    }
        
    }
}

?>