<!-- Modal -->
<div class="modal fade bg-dark" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content bg-light">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Multithread: Account login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="/multithread/partials/_handlelogin.php" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail">Email Address:</label>
                        <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="email_id" placeholder="Enter your email address">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password:</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter your password">
                    </div>
                    <div class="mb-3"><a href="/multithread/forgot-password.php" class="text-decoration-none text-info">Forgot your password?</a></div>
                    <button type="submit" class="btn btn-dark">Login</button>
                    <input class="btn btn-dark" type="reset" value="Reset">
                </form>
                <div class="mt-2">
                <span>New to Multithread? <a class="text-decoration-none text-info" data-toggle="modal" data-target="#signupModal" role="button">Create an account</a></span>
                </div>

            </div>
        </div>
    </div>
</div>