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
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE `category_id`=$id";
    $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $catename = $row['category_name'];
            $catedesc = $row['category_description'];
        }

    ?>

    <?php
    $showAlert = false;

    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        // Insert Thread into db
        $th_title = $_POST['thread_titlels'];
        $th_title = str_replace("<", "&lt;", $th_title);
        $th_title = str_replace(">", "&gt;", $th_title);
        $th_desc = $_POST['thread_descls'];
        $th_desc = str_replace("<", "&lt;", $th_desc);
        $th_desc = str_replace(">", "&gt;", $th_desc);
        $sno = $_POST['sno'];
        
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$sno', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;

        if ($showAlert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!!</strong> Your thread has been added, please wait while community to respond. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    }
    ?>

    <div class="container my-3">
    <div class="alert alert-secondary" role="alert">
  <h4 class="alert-heading">Welcome to <?php echo $catename;?> Forum!</h4>
  <p><?php echo $catedesc;?></p>
  <hr>
  <pre class="mb-0">
  Multithread Forum Rules:
  1. No Spam / Advertising / Self-promote in the forums.
  2. Do not post copyright-infringing material.
  3. Do not post “offensive” posts, links.
  4. Remain respectful of other members at all times.
  </pre>
</div>

    </div>

    <div class="container">
        <div class="row">

            <?php 
            
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '

                        <div class="col-md-4">

                            <h1>Start a Discussion</h1>

                            <form class="my-2" action="' . $_SERVER["REQUEST_URI"] . ' "method="POST">
                        <div class="form-group">
                            <label for="ProblemTitle">Problem Title</label>
                            <input type="text" class="form-control" id="ProblemTitle" aria-describedby="note" name="thread_titlels" placeholder="Enter your Problem title" required>
                            <small id="note" class="form-text text-muted">Keep your Title Short and Crisp.</small>
                        </div>
                        <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
                        <div class="form-group">
                            <label for="textarea">Elaborate Your Concern</label>
                            <textarea class="form-control" name="thread_descls" id="textarea" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark">Submit</button>
                        </form>
                    </div>';}
            
                    else {
                        echo '<div class="col-md-4">

                        <h1>Start a Discussion</h1>
                        <div class="alert alert-info" role="alert">
                            Before start a discussion <a role="button" class="text-decoration-none alert-link" data-toggle="modal" data-target="#loginModal">Login</a> first.
                            </div>

                        <form class="my-2">
                        <fieldset disabled>
                    <div class="form-group">
                        <label for="ProblemTitle">Problem Title</label>
                        <input type="text" class="form-control" id="ProblemTitle" aria-describedby="note" name="thread_titlels">
                        <small id="note" class="form-text text-muted">Keep your Title Short and Crisp.</small>
                    </div>
                    <div class="form-group">
                        <label for="textarea">Elaborate Your Concern</label>
                        <textarea class="form-control" name="thread_descls" id="textarea" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                    </fieldset>
                    </form>
                </div>';
                    }


        ?>

            <div class="col-md-8">

                <h1 class="mb-3">Browser Questions</h1>

                <?php
                $id = $_GET['catid'];
                $sql = "SELECT * FROM `threads` WHERE `thread_cat_id`=$id";
                $result = mysqli_query($conn, $sql);
                $noResult = true;
                while ($row = mysqli_fetch_assoc($result)) {
                    $noResult = false;
                    $id = $row['thread_id'];
                    $title = $row['thread_title'];
                    $desc = $row['thread_desc'];
                    $thre_time = $row['timestamp'];
                    $three_time = date('d M, Y h:i A', strtotime($thre_time));
                    $thre_user_id = $row['thread_user_id'];
                    
                    $sql2 = "SELECT `full_name` FROM `userss` WHERE `sno`='$thre_user_id'";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $user_name = $row2['full_name'];

                    echo '<div class="media py-2 my-3 px-2 py-2 bg-light container-fluid">
                            <img src="img/userdef.png" class="mr-3 bg-light" alt="user_logo" width="40px">
                            <div class="media-body"><h5 class="mt-0 font-weight-bold"><a class="text-info alert-link" href="thread.php?threadid=' . $id . '"> ' . $title . '</a></h5><span class="my-0 text-right">' . $desc . '</span></div><div>Asked by: <span class="font-weight-bold">' . $user_name . ' ✔</span> - ' . $three_time . '</div>
                        </div>';

                }
                if ($noResult) {
                    echo '<div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">No Thread found!!</h4>
                    <p>No threads found for this category.</p>
                    <hr>
                    <p class="mb-0">Be the first to ask a question.</p>
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