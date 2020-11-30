<style type="text/css">
            body{
                color: azure;
                margin-top:200px;
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
$medicalId = 0;

if (count($_GET) > 0) {
    if (isset($_GET['action']) && isset($_GET['id'])) {
        $medicalId = (int)$_GET['id'];
        $medical = getMedical($medicalId);
    } else {
        header("Location:medical.php");
    }
}

function getMedical($medicalId) {
    $conn = OpenCon();
    $sql = "SELECT * FROM medical WHERE employee_id=".$medicalId." LIMIT 1";
    $result = mysqli_query($conn, $sql);
    CloseCon($conn);
    $medical = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    
    return $medical;
}
?>
<html>
    <head>
        <title>Medical - <?php echo $title; ?></title>
    </head>
    <body>
        <form name="medical-edit" method="post" action="medical-edit-form-logic.php" align="center">
            <h2 align="center">Medical <?php echo $medical['employee_id']; ?> Edit</h2>
            <br>
           
            Blood Group : <?php echo $medical['bgroup']; ?><br/>
            <br/>
            Donor:<br/>
            <input type="radio" name="donor"<?php if($medical['donor']=='YES'){echo 'checked';};?> value="YES">YES<br>
            <input type="radio" name="donor"<?php if($medical['donor']=='NO'){echo 'checked';};?> value="NO">NO<br>
            <br/>
            <input type="hidden" name="id" value="<?php echo $medical['employee_id']; ?>">
            <input type="submit" name="submit" value="Update">
            <input type="reset">
        </form>
    </body>
</html>