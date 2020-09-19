<?php 
    include '_dbcon.php';
    $uname = $_POST['room'];   
    $sql =  "SELECT msg,stime,ip FROM messages WHERE username = '$uname'";
    $show = "";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0) 
    {
        while ($row = mysqli_fetch_assoc($result)) {
        
            $show = $show . '<div class="container">';
            $show = $show . "IP=".$row['ip'];
            $show = $show . "<p>".$row['msg'];
            $show = $show . '</p><span class="time-right">'.$row["stime"].'</span></div>';
        }
    }
    echo $show;
    
    
    
?>