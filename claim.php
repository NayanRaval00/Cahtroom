<?php
    $name = $_POST['room'];
    if (isset($_POST['submit'])) {
        if (strlen($name)<2 or strlen($name)>20) {
            echo '<SCRIPT>alert("please enter the name in maximum 20 or minimum 2 characters");</SCRIPT>';
            echo '<SCRIPT>window.location="http://localhost/Chatroom";</SCRIPT>';
            #header('location:index.php');
        }   
        else if (!ctype_alnum($name)) {
            echo '<SCRIPT>alert("please enter alphanumeric charactrs");</SCRIPT>';
            #header('location:index.php');
            echo '<SCRIPT>window.location="http://localhost/Chatroom";</SCRIPT>';
        }
        else{
        include '_dbcon.php';
        }
        
        #check records in the datbase table.
        $sql = "SELECT * FROM `rooms` WHERE username = '$name'";
        $run = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($run);
        if ($run) {
                if ($row>0) { 
                echo '<script>alert("username alrady exsits in the databse please choose anther username.");</script>';
                echo '<SCRIPT>window.location="http://localhost/Chatroom";</SCRIPT>';
                }else{
                    #insert data into database..
                    $sql = "INSERT INTO `rooms` (`username`, `romm_time`)
                           VALUES ('$name', current_timestamp());";
                    $result = mysqli_query($conn,$sql);
                
                    if ($result) {
                        echo '<script>alert("your room is rady and you can chat now!");</script>';
                        echo '<SCRIPT>window.location="http://localhost/Chatroom/room.php?roomname='. $name .'";</SCRIPT>';
                    }
                }
        }
        else{
            $er = "error". mysqli_error($coon);
        } 
        
    }
?>