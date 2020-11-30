<!DOCTYPE HTML>
<html>

<head>
    <title>Employee Registration Form</title>
    <style type="text/css">
            body{
                color:azure;
                 text-align: center;
                 background-image: url(css/img/d.jpg);
                background-size: cover;
                background-attachment: fixed;
            }
            .button{
                    background-color: #ECF0F1;
                    border: none;
                    color: black;
                    padding: 15px 32px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    
                  }
            .button:hover {
                background-color: #B3B6B7;
                box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
                padding: 18px 35px;
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
        margin-top: 50px;
      border: 1px solid #ddd;
      text-align: left;
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
    

    <?php
    include 'db_connection_sadia.php';
    $conn = OpenCon();

    $firstnameErr = $lastnameErr = $emailErr = $genderErr = $ageErr = $departmentErr = $addressErr = $phoneErr = $salaryErr = $bloodgroupErr = "";
    $firstname = $lastname =  $email = $gender = $age = $address = $phone = $salary = $bloodgroup = $department = "";
    $flag = 1;
    $flag2 = 1;
	$errors = 1;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["firstname"])) {
            $firstnameErr = "Name is required";
            $flag = 0;
        } else {
            $firstname = test_input($_POST["firstname"]);
            $flag2 = 1;
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
                $firstnameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["lastname"])) {
            $lastnameErr = "Name is required";
            $flag = 0;
        } else {
            $lastname = test_input($_POST["lastname"]);
            $flag2 = 1;
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
                $lastnameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["age"])) {
            $ageErr = "Age is required";
            $flag = 0;
        } else {
            $age = test_input($_POST["age"]);
            $flag2 = 1;
            // check if age only contains numbers
            if (preg_match("/^[a-zA-Z ]*$/", $age)) {
                $ageErr = "Only numbers allowed";
            }
        }

        if (empty($_POST["phone"])) {
            $phoneErr = "Mobile No. is required";
            $flag = 0;
        } else {
            $phone = test_input($_POST["phone"]);
            $flag2 = 1;
            // check if mobile only contains numbers
            if (preg_match("/^[a-zA-Z ]*$/", $phone)) {
                $phoneErr = "Only numbers allowed";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
            $flag = 0;
            $errors = 0;
        } else {
            $email = test_input($_POST["email"]);
            $flag2 = 1;
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
            $flag = 0;
        } else {
            $gender = test_input($_POST["gender"]);
            $flag2 = 1;
        }

        if (empty($_POST["department"])) {
            $departmentErr = "Department is required";
            $flag = 0;
        } else {
            $department = test_input($_POST["department"]);
            $flag2 = 1;
        }

        if (empty($_POST["address"])) {
            $addressErr = "address is required";
            $flag = 0;
        } else {
            $address = test_input($_POST["address"]);
            $flag2 = 1;
        }

        if (empty($_POST["salary"])) {
            $salaryErr = "Salary is required";
            $flag = 0;
        } else {
            $salary = test_input($_POST["salary"]);
            $flag2 = 1;
            // check if age only contains numbers
            if (preg_match("/^[a-zA-Z ]*$/", $salary)) {
                $salaryErr = "Only numbers allowed";
            }
        }

        if (empty($_POST["bgroup"])) {
            $bloodgroupErr = "Blood Group is required";
            $flag = 0;
        } else {
            $bloodgroup = test_input($_POST["bgroup"]);
            $flag2 = 1;
        }        
    }
	
	
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>Employee Data</h2>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        First Name: <input type="text" name="firstname" value="<?php echo $firstname; ?>">
        <span class="error">* <?php echo $firstnameErr; ?></span>
        <br><br>
        Last Name: <input type="text" name="lastname" value="<?php echo $lastname; ?>">
        <span class="error">* <?php echo $lastnameErr; ?></span>
        <br><br>
        E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error">* <?php echo $emailErr; ?></span>
        <br><br>
        Phone No.: <input type="number" name="phone" value="<?php echo $phone; ?>">
        <span class="error">* <?php echo $phoneErr; ?></span>
        <br><br>
        Address: <input type="text-box" name="address" value="<?php echo $address; ?>">
        <span class="error">* <?php echo $addressErr; ?></span>
        <br><br>
        Age: <input type="number" name="age" value="<?php echo $age; ?>">
        <span class="error">* <?php echo $ageErr; ?></span>
        <br><br>
        Gender:
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other">Other
        <span class="error">* <?php echo $genderErr; ?></span>
        <br><br>
        
        Department:
        <select name="department">
            <option value="1">Finance</option>
            <option value="2">Marketing</option>
            <option value="3">Sales</option>
            <option value="4">Management</option>
            <option value="5">IT</option>
        </select>
        <span class="error">* <?php echo $departmentErr; ?></span>
        <br><br>

        Salary:
        <input type="number" name="salary" min="5000" value="<?php echo $salary; ?>">
        <span class="error">* <?php echo $salaryErr; ?></span>
        <br/>
        Blood Group:
            <select name="bgroup">
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
            </select> <span class="error">* <?php echo $bloodgroupErr; ?></span>
        <br><br><br/>


        <input type="submit" name="submit" value="Submit">
        <input type="reset">
        <br/><br/>
        

    </form>
    <p align="center"><a href="welcome.php" class="button">Back</a></p>


    <?php

    if ($flag == 1 && $flag2 == 1 && $errors == 1) {
        $sql = "INSERT INTO employee (firstname, lastname, email, phone_no, address, age, gender, department_id) VALUES('$firstname', '$lastname', '$email', '$phone', '$address', '$age', '$gender', '$department')";
        $conn->query($sql);
    }

    $sql = "SELECT id from employee where employee.firstname='$firstname' and employee.lastname='$lastname'";
    $result = mysqli_query($conn, $sql);
    $id = mysqli_fetch_assoc($result);
    $id2= $id["id"];
   // echo "$id2";
    if ($flag == 1 && $flag2 == 1 && $errors == 1) {
        $sql = "INSERT INTO salary (employee_id, salary, status) VALUES('$id2', '$salary', 'UNPAID')";
        $conn->query($sql);
    }

    if ($flag == 1 && $flag2 == 1 && $errors == 1) {
        $sql = "INSERT INTO medical (employee_id, bgroup, donor) VALUES('$id2', '$bloodgroup', 'NO')";
        $conn->query($sql);
        
    }
    
    ?>



</body>

</html>