<section class="forms-validation ng-scope" ng-controller="FormsController">
	<div class="page-header">
		<h1>
			<i class="md md-input"></i>
			New Administrator
		</h1>
	</div>

	<div class="row  m-b-40">
		<div class="col-md-8">
			<div class="well white" id="forms-validation-container">
				<form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()">
					<fieldset>

						<div class="form-group">
							<label class="control-label">First Name</label>
							<input class="form-control ng-invalid ng-invalid-required" ng-model="model.name" required="" type="text">
						</div>

						<div class="form-group">
							<label class="control-label">Last Name</label>
							<input class="form-control ng-invalid ng-invalid-required" ng-model="model.name" required="" type="text">
						</div>

						<div class="form-group">
							<label class="control-label">Email</label>
							<input class="form-control ng-invalid ng-valid-email ng-invalid-required" ng-model="model.email" required="" type="email">
						</div>

						<div class="form-group">
							<p class="help-block hint-block">Leave blank if you do not want to change password</p>
							<label class="control-label">Password</label>
							<input class="form-control ng-invalid ng-invalid-required" ng-model="model.password" required="" type="password">
						</div>

						<div class="form-group">
							<label class="control-label">Confirm Password</label>
							<input class="form-control ng-invalid ng-invalid-required" ng-model="model.password" required="" type="password">
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="index.php" class="btn btn-link">Cancel</a>
						</div>

					</fieldset>
				</form>
			</div>
		</div>
	</div>

</section>