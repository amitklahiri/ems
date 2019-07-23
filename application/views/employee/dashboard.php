<div class="container mt-4">
	<div class="row d-flex ml-2">
		<h3>Employee Dashboard</h3>
	</div>
	<div class="row float-right text-success font-weight-bold">
		<a href="<?php echo base_url(); ?>employee/empadd">Add</a>
	</div>
	<div class="row table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Name</th>
					<th scope="col">Email</th>
					<th scope="col">Mobile</th>
					<th scope="col">Edit</th>
					<th scope="col">Delete</th>
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
					<td><a href="empedit/<?php echo $emp->id; ?>">Edit</a></td>
					<td><a href="empdelete/<?php echo $emp->id; ?>">Delete</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>