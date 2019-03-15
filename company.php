<?php include('header.php'); 
 include('session.php');?>
<body>
	<header class="header">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Cypress Demo</a>
				</div>
				<ul class="nav navbar-nav pull-right">
					<?php if(isset($_SESSION['username'])) {?>
					<li><a herf="javascript:void(0);">Welcome <?php echo ucfirst($_SESSION['username']); ?></a></li>
					<li><a href="logout.php">Logout</a></li>
					<?php }else{ ?>
					<li><a href="#">Login</a></li>
					<?php } ?>
				</ul>
			</div>	
		</nav>
	</header>
	<div class="container">
		<div class="row form-style">
			<div class="main-content">		
				<form methid="post" >
					<h3>General Information</h3>
					<hr>
					<div class="col-md-6">
						<div class="form-group">
							<label for="name">Company Name:</label>
							<input type="text" class="form-control" id="company" name="company">
						</div>
						
						<div class="form-group">
							<label>Company Location:</label>
							<select name="country" class="form-control">
								<option value="">Select</option>
								<option value="India">India</option>
								<option value="USA">USA</option>
								<option value="Canada">Canada</option>
								<option value="Other">Other</option>
							</select>
						</div> 
						<div class="form-group">
							<label for="email">Email address:</label>
							<input type="email" class="form-control" id="email" name="company_email">
						</div>
						<div class="form-group">
							<label>Security code:</label>
							<input type="text" name="security_code" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Company Type:</label><br>
							<input type="radio" name="company_type" value="public" checked> Public<br>
							<input type="radio" name="company_type" value="private"> Private<br>
						</div> 
						<div class="form-group">
							<label>Any Employee Benefits provide?</label><br>
							<input type="radio" name="employee_benefits" value="yes" > Yes<br>
							<input type="radio" name="employee_benefits" value="no" checked> No<br>
						</div> 
						<div class="form-group" id="employee_benifits">
							<label>List Employee Benefits:</label>
							<textarea name="benefits" class="form-control"></textarea>
						</div>  
					</div>
					<button type="submit" class="btn btn-primary btn-lg">Save</button>
				</form>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$("#employee_benifits").hide();
	$('input[name="employee_benefits"]').on('change',function(e) { 
		 var val = $(this).val();
		 if(val == 'yes'){
		 	$("#employee_benifits").show();
		 }else{
		 	$("#employee_benifits").hide();
		 }
	})
</script>
