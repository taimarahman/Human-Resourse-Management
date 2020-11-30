<?php

session_start();
$message = "";
if (count($_POST) > 0) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        include 'src/db.conn.php';
        $dbConn = openDbConn();
        $sql = "SELECT username, password from login where username='" . $_POST['username'] . "' and password='" . $_POST['password'] . "' limit 1";
        $result = $dbConn->query($sql);
        
        if ($result->num_rows > 0) {
            
            $single = $result->fetch_assoc();
            $_SESSION['id'] = $single['username'];
            header("Location:welcome.php");
        } else {
        header("Location:login.php");
    }
    }
}

?>