<style type="text/css">
            body{
                color: azure;
                margin-top: 40px;
                 background-image: url(css/img/d.jpg);
                background-size: cover;
                background-attachment: fixed;
            }
            .content{
                background: white;
                width: 50%;
                padding: 40px;
                margin: 100px auto;
            }
        </style>
<?php include 'src/session.start.php'; ?>
<?php include 'db_connection_sadia.php'; ?>

<?php

$title = 'Edit';
$salaryId = 0;

if (count($_GET) > 0) {
    if (isset($_GET['action']) && isset($_GET['id'])) {
        $salaryId = (int)$_GET['id'];
        $salary = getSalary($salaryId);
    } else {
        header("Location:salary.php");
    }
}

function getSalary($salaryId) {
    $conn = OpenCon();
    $sql = "SELECT * FROM salary WHERE employee_id=" . $salaryId . " LIMIT 1";
    $result = mysqli_query($conn, $sql);
    CloseCon($conn);
    $salary = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    
    return $salary;
}
?>
<html>
    <head>
        <title>Salary - <?php echo $title; ?></title>
        
    </head>
    <body>
        <form name="emp-edit" method="post" action="salary-edit-form-logic.php" align="center" >
            <h2 align="center">Salary <?php echo $salary['employee_id']; ?> Edit</h2>
            <br>
           
            Salary :<input type="text" name="salary" value="<?php echo $salary['salary']; ?>"><br/><br/>
            
            Salary Status:<br/><br/>
            <input type="radio" name="status" <?php if($salary['status']=='PAID'){echo 'checked';};?> value="PAID">PAID<br>
            <input type="radio" name="status" <?php if($salary['status']=='UNPAID'){echo 'checked';};?> value="UNPAID">UNPAID<br>
            <br/><br/>
            <input type="hidden" name="id" value="<?php echo $salary['employee_id']; ?>">
            <input type="submit" name="submit" value="Update">
            <input type="reset">
        </form>
    </body>
</html>