<div class="container mt-4">
	<div class="row d-flex">
		<div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 text-left">
			<h3>Employee Dashboard</h3>
		</div>
		<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-right">
			<a href="<?php echo base_url(); ?>employee/empadd"><h3><i class="fas fa-plus-square"></i></h3></a>
		</div>
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
					<td><a href="<?php echo base_url(); ?>employee/empedit/<?php echo $emp->id; ?>"><i class="fas fa-edit"></i></a></td>
					<td><a href="<?php echo base_url(); ?>employee/empdelete/<?php echo $emp->id; ?>"><i class="fas fa-trash-alt"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>