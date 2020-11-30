<?php include 'src/session.start.php'; ?>
<?php include 'db_connection_sadia.php'; ?>


<?php

if (count($_POST) > 0) {
    $id = $_POST['id'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $departmentId = $_POST['department_id'];
    $conn = OpenCon();
   
    $sql = "UPDATE employee SET firstname ='".$firstName."', lastname ='".$lastName."', email ='".$email."',phone_no='".$phone."', address ='".$address."', age =".$age.", gender ='".$gender."', department_id=".$departmentId." WHERE id=".$id;
   // $sql = "UPDATE employee SET firstname='".$firstName."', department_id=".$departmentId." WHERE id=".$id;
    if($conn->query($sql)) {
        header("Location:employee.php");
    }
}
?>