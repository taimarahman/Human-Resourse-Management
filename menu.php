<style>
    h1{
        color: azure;
    }
    
</style>


<h1 align="center" color=#909497>HUMAN RESOURCE MANAGEMENT</h1>
<ul id = "menu">
    <li><a href="welcome.php">Home</a></li>
    <li><a href="#">List</a>
        <ul>
            <li><a href="employee.php">Employee</a></li>
            <li><a href="salary.php">Salary</a></li>
            <li><a href="medical.php">Medical</a></li>
        </ul>
    </li>
    <li>
        <a href="#">Insert</a>
        <ul>
            <li><a href="insert_employee.php">Employee Data</a></li>
        </ul>
    </li>
<!--    <li>
        <a href="#">Update</a>
        <ul>
            <li><a href="#">Employee info</a></li>
            <li><a href="#">Attendance</a></li>
            <li><a href="#"></a></li>
        </ul>
    </li>
--> 
    <li>
        <a href="#">Hello <?php echo $_SESSION['id']; ?></a>
    </li>
    <li>
        <a href="logout.php" align="right">Logout</a>
    </li>
</ul>
<?php

function humanize($str) {
    $target = '';
    $str = trim(strtolower($str));
    $str = explode('_', $str);
    $str = array_map('ucwords', $str);
    foreach($str as $item){
        $target .= ' '. $item;
    }
    return trim($target);
}
?>