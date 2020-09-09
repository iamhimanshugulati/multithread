<?php

$insertr = false;
$update = false;
$delete = false;



    if(isset($_GET['delete'])){
      $sno = $_GET['delete'];
      $delete = true;
      $deletesql = "DELETE FROM `crud` WHERE `sno` = '$sno'";
      $result = mysqli_query($conn, $deletesql);
    }

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (isset($_POST['snoEdit'])) {
      
      // Update the record
      $sno = $_POST["snoEdit"];
      $title = $_POST["titleEdit"];
      $description = $_POST["descriptionEdit"];

      /// Sql query to be executed
      $updatesql = "UPDATE `crud` SET `title` = '$title' , `description` = '$description' WHERE `crud`.`sno` = $sno";
      $result = mysqli_query($conn, $updatesql);
    
      if($result){
        $update = true;
        }
      else{
      echo "We could not update the record successfully";
      }
    }
    else {
      
    // Post User Inputs
    $title = $_POST['title'];
    $description = $_POST['description'];

    // SQL query to be executed
    $insertsql = "INSERT INTO `crud` (`title`, `description`) VALUES ('$title', '$description')";
    
    // Displaying msg
    $insertresult = mysqli_query($conn, $insertsql);

    if ($insertresult) {
        $insertr = true;
    }
    else {
        echo "Sorry we're unable to add notes due to error >>>>" . mysqli_error($conn);
    }
  }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Notes Application: Multithread</title>
</head>

<body>



    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="/himanshu/hgphpdev/CRUD/index.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="form-group">
                            <label for="title">Note Title</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="desc">Note Description</label>
                            <textarea class="form-control" id="descriptionEdit" name="descriptionEdit"
                                rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="submit" class="btn btn-info">Save Changes</button>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include 'partials/_header.php';?>

    <?php
    if ($insertr) {
        echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
        <strong>Success!!</strong> Your Note has been saved. 
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
    }
    
    if ($update) {
      echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
      <strong>Success!!</strong> Your Note has been updated. 
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </div>";
    }

    if($delete){
      echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> Your Note has been deleted.<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>×</span>
      </button>
    </div>";
    }

    ?>
    <?php 
            
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '
    <div class="container my-4">
        <h2>Add Your notes Here</h2>

        <form action="/himanshu/hgphpdev/CRUD/index.php" method="POST">
            <div class="form-group">
                <label for="formGroupExampleInput">Note Title</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter your Note Title"
                    name="title" required>
            </div>

            <div class="form-group">
                <label for="textarea">Note Description</label>
                <textarea type="text" class="form-control" id="textarea" rows="3" name="description"
                    placeholder="Enter your Note Description"></textarea>
            </div>
            <button type="submit" class="btn btn-info">Add Note</button>
        </form>
    </div>


    <div class="container my-5">

        <table id="myTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';}

            else {
              echo '<p>login First</p>';}
              ?>

    <?php

                $sno = 1;

                $fetchdata = "SELECT * FROM `crud`";

                $fetchresult = mysqli_query($conn, $fetchdata);

                while ($fetchrow = mysqli_fetch_assoc($fetchresult)) {
                        echo "<tr>
                        <td>" . $sno . ".</td>
                        <td>" . $fetchrow['title'] . "</td>
                        <td>" . $fetchrow['description'] . "</td>
                        <td><button type='button' class='edit btn btn-sm btn-warning' data-toggle='modal' data-target='#editModal' id=" . $fetchrow['sno'] . ">Edit</button>&nbsp&nbsp<button type='button' class='delete btn btn-sm btn-danger' data-toggle='modal' data-target='#deleteModal' id=d" . $fetchrow['sno'] . ">Delete</button></td>
                        </tr>";
    
                        // echo " " . $sno . ". " . $row['title'] . " " . $row['description'] . " " . $row['dt'] . " <br>";
                        
                        $sno++;

                        }
                ?>

    </tbody>
    <tfoot>
        <tr>
            <th>S.No.</th>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </tfoot>
    </table>
    </div>




    <div class="fixed-bottom"><?php include 'partials/_footer.php';?></div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();

    });
    </script>
    <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ");
            tr = e.target.parentNode.parentNode;
            title = tr.getElementsByTagName("td")[1].innerText;
            description = tr.getElementsByTagName("td")[2].innerText;
            console.log(title, description);
            titleEdit.value = title;
            descriptionEdit.value = description;
            snoEdit.value = e.target.id;
            console.log(e.target.id)
            $('#editModal').modal('toggle');
        })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ");
            sno = e.target.id.substr(1);

            if (confirm("Are you sure you want to delete this note!")) {
                console.log("yes");
                window.location = `/himanshu/hgphpdev/CRUD/index.php?delete=${sno}`;
                // TODO: Create a form and use post request to submit a form
            } else {
                console.log("no");
            }
        })
    })
    </script>
</body>

</html>