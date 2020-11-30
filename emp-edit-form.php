<html>
    <head>
        <title>Login to HRM-App</title>
        <style type="text/css">
            body{
                
                 color: azure;
                margin-top:50px;
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
    </head>
    <body>
        <form name="emp-edit" method="post" action="emp-edit-form-logic.php" align="center">
            <h3 align="center">Employee <?php echo $empEdit['id']; ?> Edit</h3>
            <br>
           
            First Name :<input type="text" name="firstname" value="<?php echo $empEdit['first_name']; ?>"><br/><br/>
            Last Name :<input type="text" name="lastname" value="<?php echo $empEdit['last_name']; ?>"><br/><br/>
            E-mail: <input type="text" name="email" value="<?php echo $empEdit['email']; ?>"><br/><br/>
            Phone No.: <input type="number" name="phone" value="<?php echo $empEdit['phone_no']; ?>"><br/><br/>
            Address: <input type="text-box" name="address" value="<?php echo $empEdit['address']; ?>"><br/><br/>
            Age: <input type="number" name="age" value="<?php echo $empEdit['age']; ?>"><br/><br/>
            Gender:
            <input type="radio" name="gender" <?php if($empEdit['gender']=='FEMALE'){echo 'checked';};?> value='FEMALE'>FEMALE<br/>
            <input type="radio" name="gender" <?php if($empEdit['gender']=='MALE'){echo 'checked';};?> value='MALE'>MALE<br/>
            <input type="radio" name="gender" <?php if($empEdit['gender']=='OTHER'){echo 'checked';};?> value='OTHER'>OTHER<br/>
            <br/>
            Department:
            <select name="department_id" id="department_id">
                <option <?php if($empEdit['department_id']==1){ echo 'selected';}; ?> value='1'>Finance</option>
                <option <?php if($empEdit['department_id']==2){ echo 'selected';}; ?> value='2'>Marketing</option>
                <option <?php if($empEdit['department_id']==3){ echo 'selected';}; ?> value='3'>Sales</option>
                <option <?php if($empEdit['department_id']==4){ echo 'selected';}; ?> value='4'>Management</option>
                <option <?php if($empEdit['department_id']==5){ echo 'selected';}; ?> value='5'>IT</option>
            </select>
            <br/><br/>
            
            <br/><br/>
            
            
            <input type="hidden" name="id" value="<?php echo $empEdit['id']; ?>">
            <input type="submit" name="submit" value="Update">
            <input type="reset">
        </form>
    </body>
</html>

