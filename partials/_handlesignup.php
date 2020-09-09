<?php

$showError = "false";
$showAlert = false;
$password = $_POST['password'];

if (strlen($password) > 10 || strlen($password) < 4 ){
    header("location: /multithread/index.php?password=false&error=password_is_not_between_4-10_characters");
}

elseif (ctype_alnum($password)) {
    header("location: /multithread/index.php?password=false&error=password_is_not_aplhanumeric");
}

else {
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include '_dbconnect.php';
        $fullname = $_POST['full_name'];
        $fullname = str_replace("<", "&lt;", $fullname);
        $fullname = str_replace(">", "&gt;", $fullname);

        $emailid = $_POST['email_id'];
        $emailid = str_replace("<", "&lt;", $emailid);
        $emailid = str_replace(">", "&gt;", $emailid);
        
        $contactno = $_POST['contact_no'];
        $contactno = str_replace("<", "&lt;", $contactno);
        $contactno = str_replace(">", "&gt;", $contactno);

        $password = $_POST['password'];
        $password = str_replace("<", "&lt;", $password);
        $password = str_replace(">", "&gt;", $password);

        $cpassword = $_POST['cpassword'];
        $cpassword = str_replace("<", "&lt;", $cpassword);
        $cpassword = str_replace(">", "&gt;", $cpassword);

        // check whether this email exists or not
        $exitsql = "SELECT * FROM `userss` WHERE email_id = '$emailid'";
        $result = mysqli_query($conn, $exitsql);
        $numRows = mysqli_num_rows($result);
        if ($numRows > 0) {
            // $showError = true;    
            $showError = "Email_is_already_in_use";
            header("location: /multithread/index.php?signupsuccess=false&error=$showError");
                
            }
        else {
                if ($password == $cpassword) {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO `userss` (`full_name`, `email_id`, `contact_no`, `password`, `timestamp`) VALUES ('$fullname', '$emailid', '$contactno', '$hash', current_timestamp())";
                    $result = mysqli_query($conn, $sql);
                        if ($result) {
                            $showAlert = true;
                            header("location: /multithread/index.php?signupsuccess=true");
                            exit();
                        }
    
                }
                else {
                    // $showError = true;
                    $showError = "Password_do_not_match";
                    
                    header("location: /multithread/index.php?signupsuccess=false&error=$showError");
                }
            }
    }
    
}

?>