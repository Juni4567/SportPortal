<section class="">

    <!-- Modal -->
    <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="modal-header">
                        <h1><i class="md md-input"></i>New Administrator</h1>
                    </div>

                            <div class="white" id="forms-validation-container">
                                <form class="form-floating" action="<?php $_SERVER['PHP_SELF']?>" method="post">
                                    <fieldset>

                                        <div class="form-group">
                                            <label class="control-label">User Name</label>
                                            <input class="form-control" required="" type="text" name="username">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Full Name</label>
                                            <input class="form-control" required="" type="text" name="fullname">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <input class="form-control" required="" type="email" name="email">
                                        </div>

                                        <div class="form-group">
                                            <!--				<p class="help-block hint-block">Leave blank if you do not want to change password</p>-->
                                            <label class="control-label">Password</label>
                                            <input class="form-control" required="" type="password" name="password1">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Confirm Password</label>
                                            <input class="form-control" required="" type="password" name="password2">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Age</label>
                                            <input class="form-control" required="" type="integer" name="age">
                                        </div>

                                        <div class="form-group modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button name="adminsignup" type="submit" class="btn btn-primary">Submit</button>
                                        </div>

                                    </fieldset>
                                </form>
                            </div>
                </div>
            </div>
        </div>
    </div>

</section>

<div class="footer-buttons">
    <button class="btn btn-primary btn-round btn-lg" data-title="New User" data-toggle="modal" data-target="#new" title="">
        <i class="md md-add white-text"></i>
    </button>
</div>