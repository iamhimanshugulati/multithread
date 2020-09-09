<!-- Modal -->
<div class="modal fade bg-dark" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm">
        <div class="modal-content bg-light">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Multithread: Account Signup</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="/multithread/partials/_handlesignup.php" method="POST">

                    <div class="form-group">
                        <label for="fullname">Full Name:</label>
                        <input type="text" class="form-control" id="fullname" aria-describedby="emailHelp"
                            name="full_name" placeholder="Enter your full name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email Address:</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="email_id" placeholder="Enter your email address" required>
                    </div>

                    <div class="form-group">
                        <label for="Contact_Number">Contact Number:</label>
                        <input type="number" class="form-control" id="contact" aria-describedby="contact"
                            name="contact_no" placeholder="Enter your contact number" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword2">Confirm Password:</label>
                        <input type="password" class="form-control" id="password1" name="cpassword" placeholder="Renter your above password">
                    </div>

                    <button type="submit" class="btn btn-dark">Signup</button>
                    <input class="btn btn-dark" type="reset" value="Reset">
                </form>
                <div class="mt-2">
                <a class="text-decoration-none text-info" data-toggle="modal" data-target="#loginModal" role="button">Already have an account?</a></div>

            </div>
        </div>
    </div>
</div>