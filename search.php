<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Search: Discussion Forum</title>
</head>

<body>

    <!-- ALTER TABLE `threads` ADD FULLTEXT (`thread_title`, `thread_desc`); -->
    <!-- SELECT * FROM `threads` WHERE MATCH (`thread_title`, `thread_desc`) AGAINST ('not able') -->

    <?php include 'partials/_dbconnect.php';?>

    <?php include 'partials/_header.php';?>

    <div class="container my-4">
        <h1>Search result for <em>"<?php echo $_GET['search'];?>"</em></h1>
        
        <?php
        $query = $_GET['search'];
        $sql = "SELECT * FROM `threads` WHERE MATCH(`thread_title`, `thread_desc`) AGAINST('$query')";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
            while ($row = mysqli_fetch_assoc($result)) {
                $noResult = false;
                $title = $row['thread_title'];
                $description = $row['thread_desc'];
                $thread_id  = $row['thread_id'];
                $url = "thread.php?threadid=" . $thread_id;

            echo '<div class="result my-2">
            <h3><a class="alert-link" href="' . $url . '" rel="noopener noreferrer">' . $title . '</a></h3>
            <p>' . $description . '</p>

              </div>';

            }

            if ($noResult) {
                echo "No Result Found, according to your search";
            }
        ?>
        

    </div>


    <div class="fixed-bottom bg-dark"><?php include 'partials/_footer.php';?></div>

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