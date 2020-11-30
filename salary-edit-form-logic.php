<?php include 'src/session.start.php'; ?>
<?php include 'db_connection_sadia.php'; ?>
<?php
    

if (count($_POST) > 0) {
    $id = $_POST['id'];
    $salary = $_POST['salary'];
    $status = $_POST['status'];
    $conn = OpenCon();
   
    //$sql = "UPDATE employee SET firstname = '$firstname', lastname = '$lastname', email = '$email', phone_no = '$phone', address = '$address', age = '$age', gender = '$gender' WHERE id = '$emp_id'";
    $sql = "UPDATE salary SET salary=".$salary.", status='".$status."' WHERE employee_id=".$id;
    
    if($conn->query($sql)) {
        
        header("Location:salary.php");
    }
}
?>

