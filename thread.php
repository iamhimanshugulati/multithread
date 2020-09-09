<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Multithread: Discussion Forum</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>


    <?php include 'partials/_header.php';?>

    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE `thread_id`=$id";
    $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['thread_title'];
            $description = $row['thread_desc'];
            $thre_time = $row['timestamp'];
            $three_time = date('d M, Y h:i A', strtotime($thre_time));
            $thre_user_id = $row['thread_user_id'];

            $sql3 = "SELECT `full_name` FROM `userss` WHERE `sno`='$thre_user_id'";
                    $result3 = mysqli_query($conn, $sql3);
                    $row3 = mysqli_fetch_assoc($result3);
                    $user_name = $row3['full_name'];
        }

    ?>

<?php
    $showAlert = false;

    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        // Insert Thread into db
        $th_comment = $_POST['comment'];
        $th_comment = str_replace("<", "&lt;", $th_comment);
        $th_comment = str_replace(">", "&gt;", $th_comment);
        $sno = $_POST['sno'];

        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$th_comment', '$id', '$sno', current_timestamp());;";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;

        if ($showAlert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!!</strong> Your comment has been added in thread - <strong>"' . $title . '"</strong>. Thank you for your precious time.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    }
    ?>

    <div class="container my-3">
    <div class="alert alert-secondary" role="alert">
  <h4 class="alert-heading"><?php echo $title;?></h4>
  <p><?php echo $description;?></p>
  <p class="text-right">Asked by: <span class="font-weight-bolder"><?php echo $user_name . '</span><span>✔ - ' .  $three_time;?> </span></p>
  <hr>
  <pre class="mb-0">
  Multithread Forum Rules:
  1. No Spam / Advertising / Self-promote in the forums.
  2. Do not post copyright-infringing material.
  3. Do not post “offensive” posts, links.
  4. Remain respectful of other members at all times.
  </pre>
</div>


    <div class="container">
        <div class="row">


        <?php 
            
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '

                        <div class="col-md-4">

                            <h1>Post a comment</h1>

                            <form class="my-2" action="' . $_SERVER["REQUEST_URI"] . ' "method="POST">
                            <div class="form-group">
                            <label for="comment">Type your comment</label>
                            <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
                            <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark">Post Comment</button>
                        </form>
                    </div>';}
            
                    else {
                        echo '<div class="col-md-4">

                        <h1>Post a comment</h1>
                        <div class="alert alert-info" role="alert">
                            Before posting a comment <a role="button" class="alert-link text-decoration-none" data-toggle="modal" data-target="#loginModal">Login</a> first.
                            </div>

                        <form class="my-2">
                        <fieldset disabled>
                        <div class="form-group">
                        <label for="comment">Type your comment</label>
                        <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark">Post Comment</button>
                    </fieldset>
                    </form>
                </div>';
                    }


        ?>

            <div class="col-md-7">

                <h1 class="mb-3">Discussion</h1>

                <?php
                        $id = $_GET['threadid'];
                        $sql = "SELECT * FROM `comments` WHERE `thread_id`=$id";
                        $result = mysqli_query($conn, $sql);
                        $noResult = true;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $noResult = false;
                            $id = $row['comment_id'];
                            $content = $row['comment_content'];
                            $comment_time = $row['comment_time'];
                            $commente_time = date('d M, Y h:i A', strtotime($comment_time));
                            $comm_user_id = $row['comment_by'];

                            $sql2 = "SELECT `full_name` FROM `userss` WHERE `sno`='$comm_user_id'";
                            $result2 = mysqli_query($conn, $sql2);
                            $row2 = mysqli_fetch_assoc($result2);
                            $comment_user_name = $row2['full_name'];

                        echo '<div class="media py-2 my-3 px-2 py-2 bg-light container-fluid">
                                <img src="img/userdef.png" class="mr-3 bg-light" alt="user_logo" width="40px">
                                <div class="media-body">' . $content . '<p class="text-right my-0">Commented by: <span class="font-weight-bolder">' . $comment_user_name . '✔</span><span> - ' . $commente_time . '</span></p></div>
                            </div>';

                        }

                        if ($noResult) {
                            echo '<div class="alert alert-info" role="alert">
                            <h4 class="alert-heading">No Discussion!!</h4>
                            <p>No Discussion found for this thread.</p>
                            <hr>
                            <p class="mb-0">Be the first to solve a query.</p>
                          </div>';
                        }
                    ?>
            </div>
        </div>
    </div>


    <?php include 'partials/_footer.php';?>


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
</body>

</html>