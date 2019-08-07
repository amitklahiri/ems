<div class="container mt-4">
	<div class="row d-flex mb-2">
		<div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
			<h3>Employee Attendance</h3>
		</div>
		<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
			<?php echo form_open("employee/attendance"); ?>
			<div class="form-row">
				<div class="col">
					<input type="text" name="year" class="form-control" placeholder="YYYY" value="<?php echo $year != '' ? $year : date('Y'); ?>">
				</div>
				<div class="col">
					<input type="text" name="month" class="form-control" placeholder="MM" value="<?php echo $month != '' ? $month : date('m'); ?>">
				</div>
				<div class="col">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
	<div class="row table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Name</th>
					<th scope="col">Present</th>
					<th scope="col">Absent</th>
					<th scope="col">Holiday</th>
					<th scope="col">Attendance</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$count = 0;
					for ($i = 0; $i < count($data[0]); $i++) {
				?>
				<tr>
					<th scope="row"><?php echo ++$count; ?></th>
					<td><?php echo $data[1][$i]; ?></td>
					<td><?php echo $data[2][$i]; ?></td>
					<td><?php echo $data[3][$i]; ?></td>
					<td><?php echo $data[4][$i]; ?></td>
					<td><a href="<?php echo base_url(); ?>employee/attadd/<?php echo $data[0][$i]; ?>/<?php echo $year; ?>/<?php echo $month; ?>"><i class="fas fa-edit"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>