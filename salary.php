<?php include 'src/session.start.php'; ?>
<html>
<head>
  <title>Employee's Salary Information</title>
  <link rel="stylesheet" href="css/styleH.css"/>
  <style type="text/css">
            body{
                
                margin-top: 50px;
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
    
 // echo "hi";
  //$sql = "SELECT * FROM employee";
 // $result = mysqli_query($conn, $sql);
  $sql= "SELECT  salary.employee_id,employee.firstname, employee.lastname,salary.salary, salary.status
  from employee, salary
  where employee.id=salary.employee_id";
 //$result = mysqli_query($conn, $sql);
  $result5 = mysqli_query($conn, $sql);
  //$sql = "SHOW COLUMNS FROM $result5";
  //$result2 = mysqli_query($conn, $sql);

  ?>
      <table>
          <caption>Employees' Salary Info</caption>
        <tr>
            <td>ID</td>
            <td>First name</td>
            <td>Last name</td>
            <td>Salary</td>
            <td>Status</td>
            <td>Action</td>
        </tr>
        <?php
    while (($row1 = mysqli_fetch_assoc($result5))) {
      ?>
        <tr>
          <td><?php echo $row1["employee_id"]."<br>"; ?></td>
          <td><?php echo $row1["firstname"]."<br>"; ?></td>
          <td><?php echo $row1["lastname"]."<br>"; ?></td>
          <td><?php echo $row1["salary"]."<br>"; ?></td>
          <td><?php echo $row1["status"]."<br>"; ?></td>
          <td>
              <a href="salary-edit-form.php?action=edit&id=<?php echo $row1['employee_id']; ?>">Edit</a>
          </td>
        </tr>
    <?php
    } echo $row1['employee_id'];
    ?>
  </table>
</body>