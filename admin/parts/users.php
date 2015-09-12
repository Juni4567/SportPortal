<section>
	<div class="page-header">
		<h1><i class="md md-security"></i> Admins</h1>

		<p class="lead">
			The following Admins already exists in the database
		</p>
	</div>


	<div class="row">
		<div class="col-md-8">

			<div>
				<div class="table-responsive well no-padding white no-margin">

					<table class="table table-full m-b-60" id="table-area-1" fsm-big-data="data of data take 30">
						<thead>
						<tr fsm-sticky-header="" scroll-body="'#table-area-1'" scroll-stop="64">
							<th fsm-sort="firstname">Name</th>
							<th fsm-sort="lastname">role</th>
							<th>Email</th>
							<th class="text-right">Actions</th>
						</tr>
						</thead>
						<tbody>

						<?php for ($i = 0;
						$i < 10;
						$i ++) : ?>
						<tr>
							<td>Junaid Anwar</td>
							<td>Admin</td>
							<td>Junaid<?php echo $i; ?>@gmail.com</a></td>
							<td class="text-right">

								<div class="dropdown pull-right">
									<button aria-expanded="false"
									        class="dropdown-toggle pointer btn btn-round-sm btn-link withoutripple"
									        data-template="assets/tpl/partials/dropdown-navbar.html" data-toggle="dropdown">
										<i class="md md-delete f20"></i>
									</button>
									<div class="dropdown-menu dropdown-menu-right" role="menu">
										<div class="p-10">
											<div class="w300">
												Please confirm if you want to delete this user
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


			</div>
		</div>
	</div>
</section>


