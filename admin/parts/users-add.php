<section class="">
	<div class="page-header">
		<h1>
			<i class="md md-input"></i>
			New Administrator
		</h1>
	</div>

	<div class="row  m-b-40">
		<div class="col-md-8">
			<div class="well white" id="forms-validation-container">
				<form class="form-floating" action="<?php $_SERVER['PHP_SELF']?>">
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
<!--							<p class="help-block hint-block">Leave blank if you do not want to change password</p>-->
							<label class="control-label">Password</label>
							<input class="form-control" required="" type="password" name="password1">
						</div>

						<div class="form-group">
							<label class="control-label">Confirm Password</label>
							<input class="form-control" required="" type="password" name="password2">
						</div>

						<div class="form-group">
							<button name="btn-signup" type="submit" class="btn btn-primary">Submit</button>
							<a href="index.php" class="btn btn-link">Cancel</a>
						</div>

					</fieldset>
				</form>
			</div>
		</div>
	</div>

</section>