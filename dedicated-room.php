<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
    .chatcontain {
        border: 2px solid #dedede;
        background-color: #f1f1f1;
        border-radius: 5px;
        padding: 1px;
        margin: 5px 0;
    }

    .darker {
        border-color: #ccc;
        background-color: #ddd;
    }

    .chatcontain::after {
        content: "";
        clear: both;
        display: table;
    }

    .time-right {
        float: right;
        color: #aaa;
    }

    .time-left {
        float: left;
        color: #999;
    }

    .anyClass {
        height: 350px;
        overflow-y: scroll;
    }
    </style>
</head>

<body class="bg-dark">
    <?php 
    include 'partials/_dbconnect.php';
    include 'partials/_header.php';

    
// Get Parameter
$roomname = $_GET['roomname'];



// execute sql to check whether room exists or not
$sql = "SELECT * FROM `rooms` WHERE `roomname` = '$roomname'";

$result = mysqli_query($conn, $sql);

if ($result) {
        if (mysqli_num_rows($result) == 0) {
            header("location: /multithread/chat-room.php?room=false&error=room_doesnt_exit");
        }
}

else {
    echo "Error:" . mysqli_error($conn);
    header("location: /multithread/chat-room.php?' . mysqli_error($conn) . '");
}
?>

<!-- <?php 

// if (isset($_GET['roomname']) && $_GET['created'] == "true") {
//     echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
//     <strong>Success!</strong> Your room has been created, share link to your friends & enjoy realtime chat.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
//       <span aria-hidden="true">&times;</span>
//     </button>
//   </div>';
// }


?> -->

    <div class="alert alert-secondary container my-5 py-5" role="alert">
        <h4 class="alert-heading">Welcome to dedicated chat page, your chatroom name is <?php echo $roomname; ?>.</h4>
        <p>Experience reatime chat, by sharing this page link to your friends. Each participants must be logged in
            first.</p>
        <div class="my-2">Copy this link - <small id="emailHelp"
                class="form-text text-muted">http://www.drinkingcode.tech/multithread/dedicated-room.php?roomname=<?php echo $roomname; ?></small>
        </div>
        <hr>



        <div class="container my-4">
            <div class="chatcontain anyClass">
                <div class="anyclass">
                </div>
            </div>
            <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '
            <div class="form-inline form-group float-right">
                <input type="text" class="form-control" id="usermsg" class="usermsg" placeholder="Type a message"
                    required>&nbsp;&nbsp;
                <button type="submit" class="btn btn-dark" id="submitmsg" name="submitmsg">Send</button>
            </div>';}

            else {
                echo '
                <div class="alert alert-info" role="alert my-2">
                Before starting a chat, you must <a role="button" class="alert-link text-decoration-none" data-toggle="modal" data-target="#loginModal">Login</a> first.
                </div>

                <fieldset disabled>
                <div class="form-inline form-group float-right">
                <input type="text" class="form-control" id="usermsg" class="usermsg" placeholder="Type a message"
                    required>&nbsp;&nbsp;
                <button type="submit" class="btn btn-dark" id="submitmsg" name="submitmsg">Send</button>
            </div>
            </fieldset>';
            }
            ?>
        </div>

        <pre class="mb-0">
  Multithread Forum Rules:
  1. No Spam / Advertising / Self-promote in the forums.
  2. Do not post copyright-infringing material.
  3. Do not post “offensive” posts, links.
  4. Remain respectful of other members at all times.
  </pre>
    </div>

    <div class="mt-5 pt-5"><?php include 'partials/_footer.php';?></div>

    <!-- ip: '<?php echo $_SERVER['REMOTE_ADDR ']; ?>' -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script type="text/javascript">
    // check for new msg every 1 sec
    setInterval(runFunction, 1000);

    function runFunction() {
        $.post("partials/_htcont.php", {
                room: '<?php echo $roomname ?>'
            },
            function(data, status) {
                document.getElementsByClassName('anyClass')[0].innerHTML = data;
            }

        )
    }


    // Get the input field
    var input = document.getElementById("usermsg");

    // Execute a function when the user releases a key on the keyboard
    input.addEventListener("keyup", function(event) {
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("submitmsg").click();
        }
    });


    $("#submitmsg").click(function() {
        var clientmsg = $("#usermsg").val();
        $.post("partials/_chat_postmsg.php", {
                text: clientmsg,
                room: '<?php echo $roomname; ?>',
            },
            function(data, status) {
                document.getElementsByClassName('anyclass')[0].innerHTML = data;

            });
        $("#usermsg").val("");
        return false;
    });
    </script>

</body>

</html>