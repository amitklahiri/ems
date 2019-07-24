<div class="container mt-4">
	<div class="row d-flex ml-2">
		<h3>Delete Employee</h3>
	</div>
	<?php if ($this->session->flashdata("empdelete")) { ?>
	<div class="row d-flex mt-4 ml-2 alert alert-success">
		<?php echo $this->session->flashdata("empdelete"); ?>
	</div>
	<?php } ?>
	<?php if ($this->session->flashdata("empdeletenot")) { ?>
	<div class="row d-flex mt-4 ml-2 alert alert-danger">
		<?php echo $this->session->flashdata("empdeletenot"); ?>
	</div>
	<?php } ?>
	<div class="row d-flex mt-4 ml-2">
		<?php echo form_open_multipart("employee/empremove"); ?>
		<div class="form-group">
			<b>Name:</b>&nbsp;&nbsp;<?php echo $employee->name; ?>
		</div>
		<div class="form-group">
			<b>Address:</b>&nbsp;&nbsp;<?php echo $employee->address; ?>
		</div>
		<div class="form-group">
			<b>Email:</b>&nbsp;&nbsp;<?php echo $employee->email; ?>
		</div>
		<div class="form-group">
			<b>Mobile:</b>&nbsp;&nbsp;<?php echo $employee->mobile; ?>
		</div>
		<div class="form-group">
			<b>Date of Birth:</b>&nbsp;&nbsp;<?php echo $employee->dob; ?>
		</div>
		<div class="form-group">
			<b>Date of Joining:</b>&nbsp;&nbsp;<?php echo $employee->doj; ?>
		</div>
		<div class="form-group">
			<b>Status:</b>&nbsp;&nbsp;<?php echo $employee->status == '1' ? 'Active' : 'Not Active'; ?>
		</div>
		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $employee->id; ?>">
			<button type="submit" class="btn btn-primary">Submit</button>
			<a href="<?php echo base_url(); ?>employee/dashboard" class="btn btn-danger">Back</a>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
