<?php
$room = $_POST['room'];

include '_dbconnect.php';

session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true) {

$sql = "SELECT msg, stime FROM msgs WHERE room = '$room'";

$res = "";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $msg_time = $row['stime'];
            $msgg_time = date('d M, Y h:i A', strtotime($msg_time));
        $res = $res . '<div class="chatcontain"><span class="font-weight-bold">' . $_SESSION['full_name'] . '</span><span> says - </span><p>';
        $res = $res . $row['msg'];
        $res = $res . '</p><span class="time-right">' . $msgg_time . '</span></div>';
    }
}
echo $res;
    }
?>