<section>
	<div class="page-header">
		<h1><i class="md md-security"></i> User Administration </h1>

		<p class="lead">
			Manage access to administration panel here.
		</p>
	</div>


	<div class="row">
		<div class="col-md-8">

			<div>
				<div class="table-responsive well no-padding white no-margin">

					<table class="table table-full m-b-60" id="table-area-1" fsm-big-data="data of data take 30">
						<thead>
						<tr fsm-sticky-header="" scroll-body="'#table-area-1'" scroll-stop="64">
							<th fsm-sort="firstname">Name&nbsp;</th>
							<th fsm-sort="lastname">Last&nbsp;</th>
							<th>Email</th>
							<th class="text-right">Actions</th>
						</tr>
						</thead>
						<tbody>

						<?php for ($i = 0;
						$i < 25;
						$i ++) : ?>
						<tr>
							<td>Test</td>
							<td>Admin</td>
							<td>test<?php echo $i; ?>@uk.loccitane.com</a></td>
							<td class="text-right">

								<div class="dropdown pull-right">
									<button aria-expanded="false"
									        class="dropdown-toggle pointer btn btn-round-sm btn-link withoutripple"
									        data-template="assets/tpl/partials/dropdown-navbar.html" data-toggle="dropdown">
										<i class="md md-delete f20"></i>
									</button>
									<div class="dropdown-menu dropdown-menu-right" role="menu"
									     aria-labelledby="dropdownListExample">
										<div class="p-10">
											<div class="w300">
												Please confirm if you want to delete
											</div>

											<div class="form-group">
												<button type="submit" class="btn btn-primary" onclick="alert('Done'); return false;">Confirm</button>
												<a href="#" class="btn btn-link">Cancel</a>
											</div>
										</div>
									</div>
								</div>
				</div>

				</td>
				</tr>
				<?php endfor; ?>

				</tbody>
				</table>


			</div>
			<div class="footer-buttons">
				<a href="users-add.php" class="btn btn-primary btn-round btn-lg" data-title="New Item" data-toggle="tooltip">
					<i class="md md-add white-text"></i>
				</a>
			</div>


			</div>
		</div>
	</div>
</section>


