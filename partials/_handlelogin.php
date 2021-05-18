<?php
$showError = "true";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include '_dbconnect.php';
        $email_id = $_POST["email_id"];
        $email_id = str_replace("<", "&lt;", $email_id);
        $email_id = str_replace(">", "&gt;", $email_id);

        $password = $_POST["password"];
        $password = str_replace("<", "&lt;", $password);
        $password = str_replace(">", "&gt;", $password);
        // && `password` = '$password'
        $sql = "SELECT * FROM `userss` WHERE `email_id` = '$email_id'";
        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);

        if ($numRows == 1) {
            $row = mysqli_fetch_assoc($result);
                if(password_verify($password, $row['password'])){
                        session_start();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['email_id'] = $email_id;
                        $_SESSION['sno'] = $row['sno'];
                        $_SESSION['full_name'] = $row['full_name'];

                        // header("location: " . $_SERVER["HTTP_REFERER"] . "");
                        header("location: /multithread/index.php?login=true");
                
                }
                else {
                        header("location: /multithread/index.php?login=false&error=Password_do_not_match");
                }             
        }
        else {
                header("location: /multithread/index.php?login=false&error=Email_address_not_registered_with_us");
        }        
}



?>