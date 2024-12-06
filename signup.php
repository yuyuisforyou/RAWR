
<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register Your Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
            <form action="/Forum/assets/signuphandle.php" method="post">
            <div class="form-group">
                      <label for="">Name</label>
                      <input type="text"
                        class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email"
                        class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password"
                        class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="">Confirm Password</label>
                      <input type="password"
                        class="form-control" name="cpassword" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <button type="submit" class="btn btn-info">Register</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>