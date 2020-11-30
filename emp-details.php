<style type="text/css">
    body{
        color: white;
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
<?php foreach ($empRow as $key => $value) { ?>
    <div style="background-color: gray; width: 100%; text-align: center; text-wrap: normal;">
        <div style="width: 50%; float: left; border-bottom: 1px solid gray; font-size: 25px"><?php echo humanize($key); ?></div>
        <div style="width: 40%; float: left; border-bottom: 1px solid gray;font-size: 25px"><?php echo $value; ?></div>
    </div>
    <br/>
<?php } ?>