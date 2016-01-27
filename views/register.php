			<div class="row">
				<div class="col-sm-12">
					<h1 class="main-heading">User Registration</h1>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<form method="post" action="/register" class="form-horizontal">
						<div class="form-group">
							<label for="email" class="col-sm-4 control-label">Email</label>
							<div class="col-sm-8">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-sm-4 control-label">Password</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
							</div>
						</div>
						<div class="form-group">
							<label for="password_confirm" class="col-sm-4 control-label">Confirm password</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm password" required>
							</div>
						</div>
						<hr>
						<div class="form-group">
							<label for="name" class="col-sm-4 control-label">Name</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
							</div>
						</div>
						<div class="form-group">
							<label for="dob" class="col-sm-4 control-label">Date of birth</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="dob" name="dob" placeholder="dd/mm/yyyy" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary pull-right">Register</button>
							</div>
						</div>
					</form>
				</div>
				
				<div class="col-sm-6">
					<div class="well">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In nec iaculis orci. Aenean ut blandit nibh. 
						Proin lobortis pretium magna, vel congue felis malesuada eget. Vestibulum eget erat eget justo 
						sollicitudin suscipit non sit amet nisl. Phasellus posuere leo ac efficitur feugiat. Fusce turpis 
						tortor, egestas id malesuada vel, elementum eu turpis. Mauris sit amet luctus magna, a viverra ex. 
						Proin pretium tortor eu risus finibus venenatis.</p>

					<p>Donec vestibulum elit orci, vel sodales quam tempor a. Nunc vitae varius mauris. Donec rutrum 
						malesuada metus ut scelerisque. Curabitur vel magna ante. Phasellus id metus mauris. Lorem ipsum
						dolor sit amet, consectetur adipiscing elit.Nulla leo arcu, feugiat vitae pellentesque in, tristique vel
						diam. Donec imperdiet leo sed leo convallis ullamcorper. Aenean et nisi feugiat, interdum nisl id,
						rutrum tellus.</p>
					</div>
				</div>
				
			</div>
			<script src="js/validate.js"></script>