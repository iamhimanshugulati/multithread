<?php

$room = $_POST['room'];
$room = str_replace("<", "&lt;", $room);
$room = str_replace(">", "&gt;", $room);

if (strlen($room) > 20 or strlen($room) < 2){
    header("location: /multithread/chat-room.php?charc=false&error=chatroom_name_is_not_between_2-20_charcters");
}

elseif (ctype_alnum($room)) {
    header("location: /multithread/chat-room.php?charc=false&error=select_alphanumeric_name");
}

else {
    // Connect to db
    include '_dbconnect.php';

    $sql = "SELECT * FROM `rooms` WHERE `roomname` = '$room'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            header("location: /multithread/chat-room.php?room=false&error=room_name_already_claimed");
                        }
        else {
            $sql = "INSERT INTO `rooms` (`roomname`) VALUES ('$room')";
            $result = mysqli_query($conn, $sql);
                if ($result) {
                    header("location: /multithread/dedicated-room.php?roomname=$room&created=true");
                }


        }
    }

    else {
        header("location: /multithread/chat-room.php?' . mysqli_error($conn) . '");
    }

}

?>