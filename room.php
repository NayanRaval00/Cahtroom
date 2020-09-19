<?php
    $roomname = $_GET['roomname'];
    include '_dbcon.php';
    #echo $roomname;
    $sql = "SELECT * FROM `rooms` WHERE username ='$roomname'";
    $run = mysqli_query($conn,$sql);
   
    if ($run) {
        if (mysqli_num_rows($run)==0)
        { 
        echo '<script>alert("username does not exists trying creating new room.");</script>';
        #echo '<SCRIPT>window.location="http:/Chatroom";</SCRIPT>'; 
        }
    }
    else{
        echo "Error: ". mysqli_error($conn);
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>chat1-chat2</title>

    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <style>
    body {
        margin: 0 auto;
        max-width: 800px;
        padding: 0 20px;

    }

    .container {
        border: 2px solid #dedede;
        background-color: #f1f1f1;
        border-radius: 5px;
        padding: 10px;
        margin: 10px 0;
    }

    .darker {
        border-color: #ccc;
        background-color: #ddd;
    }

    .container::after {
        content: "";
        clear: both;
        display: table;
    }

    .container img {
        float: left;
        max-width: 60px;
        width: 100%;
        margin-right: 20px;
        border-radius: 50%;
    }

    .container img.right {
        float: right;
        margin-left: 20px;
        margin-right: 0;
    }

    .time-right {
        float: right;
        color: #aaa;
    }

    .time-left {
        float: left;
        color: #999;
    }

    .mainc {
        height: 350px;
        overflow-y: scroll;
    }
    </style>
</head>
<?php 
    $sql = "se"
?>

<body>
    <h2 style="color: aqua;">Chat Messages <?php echo $roomname;?></h2>
    <div class="container">
        <div class="mainc">
    </div> 
    </div>

    <input type="text" class="form-control my-4" name="message" id="message" placeholder="enter your text" required>
    <button name="send" class="btn btn-secondary" id="msg">Send</button>


    <!-- jquery javascript-bootstrap cdn -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

    <!-- jquery cdn -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
         -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    // check for new messages every 1 second
    setInterval(runFunction, 1000);
    function runFunction() {
        $.post("htcon.php", {
                room: '<?php echo $roomname;?>'
            },
            function(data, status) {
                document.getElementsByClassName('mainc')[0].innerHTML = data;

            });
    }


    $(document).ready(function() {
        $("button").click(function() {
            var clientmsg = $('#message').val();
            $.post("postmsg.php", {
                    name: clientmsg,
                    room: "<?php echo $roomname;?>",
                    ip: '<?php echo $_SERVER['REMOTE_ADDR']?>'
                },
                function(data, status) {
                    document.getElementsByClassName('mainc')[0].innerHTML = data;
                    $('#message').val("");
                    return false;
                });
        });
    });
    </script>

</body>

</html>