<?php include 'src/session.start.php'; ?>
<?php include 'db_connection_sadia.php'; ?>
<?php include 'employee_actions_logics.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Employee - <?php echo $title; ?></title>        
        <link rel="stylesheet" href="css/styleH.css"/>

    </head>
    <body>
        <?php include 'menu.php'; ?>
        
        <?php
        
        if ($action == 'edit') {
            $empEdit = edit($empId);
            include 'emp-edit-form.php';
        } else if ($action == 'delete') {
            include 'emp-delete-logic.php';
            header("Location:employee.php");
        } else {
            $empRow = details($empId);
            include 'emp-details.php';
        }
        
        ?>

    </body>
</html>
