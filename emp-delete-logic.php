
<?php

if ($empId > 0) {
    $conn = OpenCon();
    echo $empId;
    $sql = "DELETE FROM employee WHERE id=" . $empId;
    if ($conn->query($sql)) {
        header("Location:employee.php");
    }
}
?>