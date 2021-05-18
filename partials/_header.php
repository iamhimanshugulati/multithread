<?php
echo '
<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <a class="navbar-brand" href="/multithread">MultiThread</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
    <a class="nav-link" href="/multithread">Home</a>
  </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';

          // To fetch categories in categories form 
          $sql = "SELECT `category_name`, `category_id` FROM `categories` LIMIT 4";
          $result = mysqli_query($conn,  $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $category_name = $row['category_name'];
            $category_id = $row['category_id'];
            echo '<a class="dropdown-item" href="/multithread/threadlist.php?catid=' . $category_id . '">' . $category_name . '</a>';
          }
          
        
        echo '<div class="dropdown-divider"></div>
        <a class="dropdown-item" href="/multithread/new-forum-request.php">Add New Forum</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-dark warning my-2 my-sm-0" type="submit" method="GET">Search</button>
    </form>
      ';
    // setting condition when user loggedin or not
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true) {
      echo '
      &nbsp&nbsp
      <div class="btn-group" role="group">
      <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi, 
      ' . $_SESSION['full_name'] . ' !!
      </button>
      <div class="dropdown-menu " aria-labelledby="btnGroupDrop1">
      <a class="dropdown-item" href="/multithread/profile.php">Profile</a>
      <a class="dropdown-item" href="/multithread/to-do-list.php">Notes App</a>
      <a class="dropdown-item" href="/multithread/chat-room.php">Chat Room</a>
      <a class="dropdown-item" href="/multithread/partials/_logout.php">Logout</a>
      </div>
      </div>

      </div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      </nav>';
    }

    else {
      echo '&nbsp&nbsp
      <button class="btn btn-outline-dark my-2 my-sm-0" data-toggle="modal" data-target="#loginModal" type="submit">LogIn</button>
      &nbsp&nbsp
      <button class="btn btn-outline-dark my-2 my-sm-0" data-toggle="modal" data-target="#signupModal" type="submit">SignUp</button>
    </div>
  </nav>';
    }
    

include 'partials/_loginmodal.php';
include 'partials/_signupmodal.php';


if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
          <strong>Success!</strong> You can Login now by <a class="text-decoration-none alert-link" data-toggle="modal" data-target="#loginModal" role="button">clicking here</a>.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false" && $_GET['error'] == "Email_is_already_in_use") {
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> Email already exists, reset your password by <a href="forgot-password.php" class="text-decoration-none alert-link">clicking here</a>.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false" && $_GET['error'] == "Password_do_not_match") {
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> Password mismatch, please try again by <a class="text-decoration-none alert-link" data-toggle="modal" data-target="#signupModal">clicking here</a>.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

if (isset($_GET['login']) && $_GET['login'] == "false" && $_GET['error'] == "Password_do_not_match") {
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> Password mismatch, you can reset your password by <a class="text-decoration-none alert-link" href="forgot-password.php">clicking here</a>.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

if (isset($_GET['login']) && $_GET['login'] == "false" && $_GET['error'] == "Email_address_not_registered_with_us") {
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> Your Email address is not registered with us, kindly signup by <a class="text-decoration-none alert-link" data-toggle="modal" data-target="#signupModal">clicking here</a>.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

if (isset($_GET['login']) && $_GET['login'] == "true") {
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Welcome ' . $_SESSION['full_name'] . ' !! </strong> You are logged in successfully, check out our <a class="text-decoration-none alert-link" href="to-do-list.php">Notes Application</a>, <a class="text-decoration-none alert-link" href="chat-room.php">Chat Room Aplication</a><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

if (isset($_GET['logout']) && $_GET['logout'] == "true") {
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You are logged out successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

if (isset($_GET['password']) && $_GET['password'] == "false" && $_GET['error'] == "password_is_not_between_4-10_characters") {
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> You must enter a password that must be 4-10 characters long, retry by <a class="text-decoration-none alert-link" data-toggle="modal" data-target="#signupModal" role="button">clicking here</a>.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

if (isset($_GET['password']) && $_GET['password'] == "false" && $_GET['error'] == "password_is_not_aplhanumeric") {
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> You must enter a alphanumeric password, retry by <a class="text-decoration-none alert-link" data-toggle="modal" data-target="#signupModal" role="button">clicking here</a>.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

?>