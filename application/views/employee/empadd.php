<div class="container mt-4">
	<div class="row d-flex ml-2">
		<h3>Register Employee</h3>
	</div>
	<?php if ($this->session->flashdata("empinsert")) { ?>
	<div class="row d-flex mt-4 ml-2 alert alert-success">
		<?php echo $this->session->flashdata("empinsert"); ?>
	</div>
	<?php } ?>
	<?php if ($this->session->flashdata("empinsertnot")) { ?>
	<div class="row d-flex mt-4 ml-2 alert alert-danger">
		<?php echo $this->session->flashdata("empinsertnot"); ?>
	</div>
	<?php } ?>
	<?php if (validation_errors()) { ?>
	<div class="row d-flex mt-4 ml-2 alert alert-danger">
		<?php echo validation_errors(); ?>
	</div>
	<?php } ?>
	<div class="row d-flex mt-4 ml-2">
		<?php echo form_open_multipart("employee/empinsert"); ?>
		<div class="form-group">
			<input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo set_value('name'); ?>">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo set_value('address'); ?>">
		</div>
		<div class="form-group">
			<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
		</div>
		<div class="form-group">
			<input type="number" class="form-control" name="mobile" placeholder="mobile" value="<?php echo set_value('mobile'); ?>">
		</div>
		<div class="form-group">
			<input type="date" class="form-control float-left" name="dob" placeholder="DOB::DD.MM.YYYY" value="<?php echo set_value('dob'); ?>"><label>Date of Birth</label>
		</div>
		<div class="form-group">
			<input type="date" class="form-control" name="doj" placeholder="DOB::DD.MM.YYYY" value="<?php echo set_value('doj'); ?>"><span>Date of Joining</span>
		</div>
		<div class="custom-control custom-checkbox mb-3">
			<input type="checkbox" class="custom-control-input" id="customCheck" name="status" value="1" checked>
			<label class="custom-control-label" for="customCheck">Active</label>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Submit</button>
			<a href="dashboard" class="btn btn-danger">Back</a>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
