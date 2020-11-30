<?php include 'src/session.start.php'; ?>
<?php include 'db_connection_sadia.php'; ?>
<?php
    

if (count($_POST) > 0) {
    $id = $_POST['id'];
    $medical = $_POST['bgroup'];
    $donor = $_POST['donor'];
    $conn = OpenCon();
   
    //$sql = "UPDATE employee SET firstname = '$firstname', lastname = '$lastname', email = '$email', phone_no = '$phone', address = '$address', age = '$age', gender = '$gender' WHERE id = '$emp_id'";
    $sql = "UPDATE medical SET donor='".$donor."' WHERE employee_id=".$id;
    
    if($conn->query($sql)) {
        
        header("Location:medical.php");
    }
}
?>

