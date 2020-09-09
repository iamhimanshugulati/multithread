<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Chat Room: Multithread</title>
</head>

<body class="bg-dark">
    <?php include 'partials/_dbconnect.php';?>

    <?php include 'partials/_header.php';?>

<?php

if (isset($_GET['charc']) && $_GET['charc'] == "false" && $_GET['error'] == "chatroom_name_is_not_between_2-20_charcters") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Error!</strong> The room name you try entered is not between 2-20 charcters.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}


if (isset($_GET['charc']) && $_GET['charc'] == "false" && $_GET['error'] == "select_alphanumeric_name") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Error!</strong> The room name you try entered is not alphanumeric, kindly try with alphanumeric name.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

if (isset($_GET['room']) && $_GET['room'] == "false" && $_GET['error'] == "room_name_already_claimed") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Error!</strong> The room name you try entered is already claimed, kindly try with another name.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
  ?>
    
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo '
    <div class="alert alert-secondary container my-5" role="alert">
        <h4 class="alert-heading text-center">Welcome to Chat Room, a part of MultiThread Forum</h4>
        <p>Enter a unique chatroom name, share a link to your friends and enjoy realtime chat!!</p>
        <div class="my-3"><small id="emailHelp" class="form-text text-muted">Each participants must be logged in first.</small></div>
        <form action="partials/_chat_claim.php" method="POST">
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <label for="text">http://www.drinkingcode.tech/multithread/dedicated-room.php?roomname</label>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="inlineFormInputGroup">Enter your chatroom name</label>

                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">=</div>
                        </div>
                        <input type="text" class="form-control" id="chatroom" placeholder="Enter Chatroom name"
                            name="room">
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-dark mb-2">Claim Room</button>
                </div>
            </div>
        </form>

        <hr>
        <pre class="mb-0">
  Multithread Forum Rules:
  1. No Spam / Advertising / Self-promote in the forums.
  2. Do not post copyright-infringing material.
  3. Do not post “offensive” posts, links.
  4. Remain respectful of other members at all times.
  </pre>
    </div>';
                    }

    else {
      echo '<div class="alert alert-secondary container my-5" role="alert">
      <h4 class="alert-heading text-center">Welcome to Chat Room, a part of MultiThread Forum</h4>
      <p>Enter a unique chatroom name, share a link to your friends and enjoy realtime chat!!</p>
      <div class="mb-3"><small id="emailHelp" class="form-text text-muted">Each participants must be logged in first.</small></div>

      <div class="alert alert-info" role="alert my-2">
                            Before starting a chat, you must <a role="button" class="alert-link text-decoration-none" data-toggle="modal" data-target="#loginModal">Login</a> first.
                            </div>

      <form action="partials/_chat_claim.php" method="POST">
      <fieldset disabled>
          <div class="form-row align-items-center">
              <div class="col-auto">
                  <label for="text">http://www.drinkingcode.tech/multithread</label>
              </div>
              <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Enter your chatroom name</label>

                  <div class="input-group mb-2">
                      <div class="input-group-prepend">
                          <div class="input-group-text">/</div>
                      </div>
                      <input type="text" class="form-control" id="chatroom" placeholder="Enter Chatroom name"
                          name="room">
                  </div>
              </div>
              <div class="col-auto">
                  <button type="submit" class="btn btn-dark mb-2">Claim Room</button>
              </div>
          </div>
          </fieldset>
      </form>

      <hr>
      <pre class="mb-0">
Multithread Forum Rules:
1. No Spam / Advertising / Self-promote in the forums.
2. Do not post copyright-infringing material.
3. Do not post “offensive” posts, links.
4. Remain respectful of other members at all times.
</pre>
  </div>';
    }

?>

    <div class="fixed-bottom"><?php include 'partials/_footer.php';?></div>

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
    <script>
    $('#chatroom').tooltip({
        'trigger': 'focus',
        'title': 'Please enter a name between 2-20 charcters and must be alphanumeric.'
    });
    </script>
</body>

</html>