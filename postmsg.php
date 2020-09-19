<?php 
    include '_dbcon.php';
    $room = $_POST['room'];
    $msg = $_POST['name'];
    $ip = $_POST['ip'];
    
    echo $msg;
    $sql  = "INSERT INTO `messages` (`username`, `msg`, `stime`,`ip`)
             VALUES ('$room', '$msg', current_timestamp(), '$ip')";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        #echo 'data inserted successfully';
    }else{
        echo 'not inserted';
    }
    mysqli_close($conn);
?>