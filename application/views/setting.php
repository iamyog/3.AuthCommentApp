<?php include('partials/header.php'); ?>

<div>
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Upload Avatar</a></li>
		<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Change Password</a></li>    
		
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane fade in active" id="home">

			<div class="jumbotron jumbot">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						
						<form> 
							<div class="form-group">
								<label for="exampleInputFile">Choose file for upload Avatar..</label>
								<input type="file" id="exampleInputFile">			   
							</div>			  
							<button type="submit" class="btn btn-danger">Upload</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div role="tabpanel" class="tab-pane fade" id="profile">
			<div class="jumbotron jumbot">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">			   		
						<form autocomplete="false">
							<div class="form-group">
								<label for="exampleInputEmail1">Email address</label>
								<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Enter old Password</label>
								<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
							</div>		   
							<button type="submit" class="btn btn-danger">Get Password</button>
						</form>
					</div>
				</div>
			</div>
		</div> 	      	
	</div>
	
	<?php include('partials/footer.php'); ?>