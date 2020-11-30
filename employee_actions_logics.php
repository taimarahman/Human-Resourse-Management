<?php

$action = '';
$title = '';
$empId = 0;
// $ed =  (object) array('id'=>0);
if (count($_GET) > 0) {
    if (isset($_GET['action']) && isset($_GET['id'])) {
        $title = getTitle($_GET['action']);
        $action = trim($_GET['action']);
        $empId = (int)$_GET['id'];
        if ($action == 'edit') {
            $empRow = edit($empId);
            return $empRow;
        } else if ($action == 'delete') {
            return delete($empId);
        } else {
            $empRow = details($empId);
            return $empRow;
        }
    } else {
        header("Location:employee.php");
    }
}

function details($empId) {
    $conn = OpenCon();
   // $sql = "SELECT * FROM employee WHERE ID=" . $_GET['id'] . " LIMIT 1";
    $sql = "SELECT employee.id,
	   employee.firstname as first_name,
       employee.lastname as last_name,
       employee.email,
       employee.phone_no,
       employee.address,
       employee.age,
       employee.gender,
       department.name as department_name, 
       department.id as department_id,
       salary.salary, 
       salary.status, 
       medical.bgroup as blood_group,
       medical.donor 
FROM   employee, 
       medical, 
       salary, 
       department 
WHERE  employee.department_id=department.id && employee.id=salary.employee_id && employee.id=medical.employee_id && employee.id=".$empId; 
    $result = mysqli_query($conn, $sql);
    CloseCon($conn);
    $empRow = mysqli_fetch_array($result, MYSQLI_ASSOC);

/*    
SELECT employee.*, department.name,salary.salary, salary.status,medical.bgroup,medical.donor
from employee, medical,salary,department
where employye.id=".$_GET['id']" && employee.department_id=department.id &&". $_GET['id']."=salary.employee_id && ". $_GET['id']."=medical.employee_id
  */  
    
    return $empRow;
}

function edit($empId) {
    return details($empId);
}
function delete($empId) {
    return details($empId);
}

function getTitle($action) {
    if ($action == 'details') {
        return 'Details';
    } else if ($action == 'edit') {
        return 'Edit';
    } else if ($action == 'delete') {
        return 'Delete';
    }
    return 'Title Not Found';
}

?>