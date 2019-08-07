<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="UTF-8">
	<title>EMS Application</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/all.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="<?php echo base_url(); ?>">EMS</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav mr-auto">
				<?php if ($this->session->has_userdata("username")) { ?>
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo base_url(); ?>employee/dashboard">Employees</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>employee/attendance">Attendance</a>
				</li>
				<?php } ?>
			</ul>
			<ul class="navbar-nav align-content-center">
				<?php if ($this->session->has_userdata("username")) { ?>
				<li class="nav-item">					
					<a href="<?php echo base_url(); ?>user/adminImage" class="nav-link">
						<img src="<?php echo base_url(); ?>assets/image/user.png" width="35" class="rounded-circle mr-2" alt="" style="background-color: #ffffff;">
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>user/adminSettings" class="nav-link"><?php echo $this->session->userdata("username"); ?></a>
				</li>
				<?php } ?>
				<li class="nav-item">
					<?php if (!$this->session->has_userdata("username")) { ?>
					<a class="nav-link" href="<?php echo base_url(); ?>user/login">Login</a>
					<?php } else { ?>
					<a class="nav-link" href="<?php echo base_url(); ?>user/logout">Logout</a>		
					<?php } ?>
				</li>
			</ul>
		</div>
	</nav>
