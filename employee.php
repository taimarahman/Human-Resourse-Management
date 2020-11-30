<?php include 'src/session.start.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Employee - List</title>
        <link rel="stylesheet" href="css/styleH.css"/>
        <style type="text/css">
            body{
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
  <style>
    table,
    td,
    th {
        margin-top: 30px;
      border: 1px solid #ddd;
      text-align: left;
    }
    table caption{
        color: azure;
        font-size: 50px;
        margin-bottom: 10px;
    }
    table {
        margin-left: 150px;
        background-color: #D0D3D4;
      border-collapse: collapse;
      width: 80%;
    }

    th,
    td {
      padding: 15px;
    }
  </style>
    </head>
    <body>
        <?php include 'menu.php'; ?>
        <?php
        include 'db_connection_sadia.php';
        $conn = OpenCon();

        $sql = "SELECT employee.*, department.name,salary.salary, salary.status,medical.bgroup,medical.donor
from employee, medical,salary,department
where employee.department_id=department.id && employee.id=salary.employee_id && employee.id=medical.employee_id";
        $result = mysqli_query($conn, $sql);
     //   $sql = "SHOW COLUMNS FROM employee";
       // $result2 = mysqli_query($conn, $sql);
        CloseCon($conn);
        ?>
        <table>
            <caption>Employees' Info</caption>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Department Name</th>
                <th>
                    Actions
                </th>
            </tr>
            <?php
            while (($row1 = mysqli_fetch_assoc($result))) {
                ?>
                <tr>
                    <td><?php echo $row1["id"] . "<br>"; ?></td>
                    <td><?php echo $row1["firstname"] . "<br>"; ?></td>
                    <td><?php echo $row1["lastname"] . "<br>"; ?></td>
                    <td><?php echo $row1["email"] . "<br>"; ?></td>
                    <td><?php echo $row1["name"] . "<br>"; ?></td>
                    <td>
                        <a href="employee_actions.php?action=details&id=<?php echo $row1['id']; ?>">Details</a>
                        <a href="employee_actions.php?action=edit&id=<?php echo $row1['id']; ?>">Edit</a>
                        <a onclick="return confirm('Are you sure you want to delete this item?');" href="employee_actions.php?action=delete&id=<?php echo $row1['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
