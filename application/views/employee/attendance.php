<div class="container mt-4">
	<div class="row d-flex">
		<h3>Employee Attendance</h3>
	</div>
	<div class="row table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Name</th>
					<th scope="col">Email</th>
					<th scope="col">Mobile</th>
					<th scope="col">Attendance</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$count = 0;
					foreach ($employees as $emp) { 
				?>
				<tr>
					<th scope="row"><?php echo ++$count; ?></th>
					<td><?php echo $emp->name; ?></td>
					<td><?php echo $emp->email; ?></td>
					<td><?php echo $emp->mobile; ?></td>
					<td><a href="<?php echo base_url(); ?>employee/empattadd/<?php echo $emp->id; ?>">Attendance</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>