<div class="container">
	<div class="col-lg-4 mt-3" style="background-color:#f4f6f7;">
		<br><br>
		<h4>Login Form</h4>
		<hr style="border:1px solid #d3d3d3; width:100%;" />
		<form method="POST" action="<?= BASEURL; ?>/login/proses" enctype="multipart/form-data">

			<div class="form-group">
				<label class="control-label">Username:</label>
				<input name="username" type="text" class="form-control" id="username" />
			</div>
			<div class="form-group">
				<label class="control-label">Password:</label>
				<input name="password" type="password" class="form-control" id="password" />
			</div><br>
			<div class="form-group">
				<input type="submit" name="submit" value="Login" class="btn btn-primary btn-block">
				<br>
			</div>
		</form>
	</div><!-- /  class="col-sm" -->


</div><!-- / class="container" -->