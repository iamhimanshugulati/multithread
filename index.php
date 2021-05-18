<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Welcome to Multithread!!</title>
</head>

<body class="bg-light">

    <?php include 'partials/_dbconnect.php';?>

    <?php include 'partials/_header.php';?>

    <?php include 'partials/_carousel.php';?>


    <!-- categories container start here -->
    <div class="container">
        <h2 class="text-center my-3">Multithread Forum - Categories</h2>

        <div class="row">

            <!-- use for loop for fetch all categories -->
            <?php 
          $sql = "SELECT * FROM `categories`";
          $result = mysqli_query($conn, $sql);

          // fetching data

          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['category_id'];
            $catename = $row['category_name'];
            $catedesc = substr($row['category_description'], 0, 100);
              // substr() function is used for slicing character 3 parameter required 1st varable, 2nd start, 3rd last character
              
            echo '
            <div class="col-md-4 my-3">

                <div class="card" style="width: 18rem;">
                    <img width="40" height="210" src="/multithread/img/'. $catename .'.png" class="card-img-top" alt="unsplash">
                    <div class="card-body">
                        <h5 class="card-title"><a class="text-decoration-none text-dark" href="threadlist.php?catid=' . $id . '">' . $catename . '</a></h5>
                        <p class="card-text">' . $catedesc . '.....</p>
                        <a href="threadlist.php?catid=' . $id . '" class="btn btn-dark">View Thread</a>
                    </div>
                </div>
            </div>
            ';
          }
          
          ?>



        </div>

    </div>
    <!-- categories container end here -->

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
    <script>$('#password').tooltip({'trigger':'focus', 'title': 'Password must be 4-10 characters long & alphanumeric.'});</script>

    <script>$('#password1').tooltip({'trigger':'focus', 'title': 'Renter above password, it must be 4-10 characters long & alphanumeric.'});</script>

    <script>$('#contact').tooltip({'trigger':'focus', 'title': 'Enter your 10 digit mobile number.'});</script>
</body>

</html>