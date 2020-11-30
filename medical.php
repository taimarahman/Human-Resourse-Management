<?php include 'src/session.start.php'; ?>
<html>
<head>
  <title>Employee's Medical Information</title>
  <link rel="stylesheet" href="css/styleH.css"/>
  <style type="text/css">
            body{
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
  $sql= " SELECT medical.employee_id,employee.firstname, employee.lastname,medical.bgroup, medical.donor from employee, medical where employee.id=medical.employee_id";
 //$result = mysqli_query($conn, $sql);
  $result5 = mysqli_query($conn, $sql);
  //$sql = "SHOW COLUMNS FROM $result5";
  //$result2 = mysqli_query($conn, $sql);

  ?>
      <table>
          <caption>Employees' Medical Info</caption>
        <tr>
            <td>ID</td>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Blood Group</td>
            <td>Donor</td>
            <td>Action</td>
        </tr>
        <?php
    while (($row1 = mysqli_fetch_assoc($result5))) {
      ?>
        <tr>
          <td><?php echo $row1["employee_id"]."<br>"; ?></td>
          <td><?php echo $row1["firstname"]."<br>"; ?></td>
          <td><?php echo $row1["lastname"]."<br>"; ?></td>
          <td><?php echo $row1["bgroup"]."<br>"; ?></td>
          <td><?php echo $row1["donor"]."<br>"; ?></td>
          <td>
              <a href="medical-edit-form.php?action=edit&id=<?php echo $row1['employee_id']; ?>">Edit</a>
          </td>
        </tr>
    <?php
    }
    ?>
  </table>
</body>