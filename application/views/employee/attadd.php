<div class="container mt-4">
	<div class="row justify-content-start">
		<h4 class="pr-2"><?php echo $employee->name; ?>'s attendance for </h4>
		<?php echo form_open("employee/attendance/1"); ?>
			<div class="form-row">
				<div class="col">
					<input type="text" name="year" class="form-control" placeholder="YYYY" size="10" value="<?php echo $year != '' ? $year : date('Y'); ?>">
				</div>
				<div class="col">
					<input type="text" name="month" class="form-control" placeholder="MM" size="10" value="<?php echo $month != '' ? $month : date('m'); ?>">
				</div>
				<div class="col">
					<input type="hidden" name="empid" value="<?php echo $employee->id; ?>">
					<button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?php echo base_url(); ?>employee/attendance" class="btn btn-danger">Back</a>
				</div>
			</div>
		<?php echo form_close(); ?>
	</div>
	<div class="row table-responsive mt-4 mb-4">
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">Date</th>
					<th scope="col">Weekday</th>
					<th scope="col">Status</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php echo form_open("employee/attupdate"); ?>
				<?php 
					$days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
					$arrIndex = 0;
					for ($i = 1; $i <= $days; $i++) {
						$weekday = date("l", strtotime(date($year . "-" . $month . "-" . $i)));
						$date_current = $year . "-" . $month . "-" . ( strlen($i) == 1 ? "0" . $i : $i );
				?>
				<tr <?php echo $weekday == "Sunday" ? "class='text-danger'" : ""; ?>>
					<th scope="row"><?php echo $i; ?></th>
					<td><?php echo $weekday; ?></td>
					<td>
						<?php if (strcmp($date_current, @$attendances[$arrIndex]->attdate) == 0) { ?>
							<select name="attstatus[]" class="custom-select <?php echo $weekday == 'Sunday' ? 'text-danger' : ''; ?>" id="inlineFormCustomSelectPref">
								<option value="">Select</option>
								<option value="P" <?php if (@$attendances[$arrIndex]->attstatus == "P") echo "selected"; ?>>Present</option>
								<option value="A" <?php if (@$attendances[$arrIndex]->attstatus == "A") echo "selected"; ?>>Absent</option>
								<option value="H" <?php if (@$attendances[$arrIndex]->attstatus == "H") echo "selected"; ?>>Holiday</option>
							</select>
						<?php 
							$arrIndex++;
							} else { 
						?>
							<select name="attstatus[]" class="custom-select <?php echo $weekday == 'Sunday' ? 'text-danger' : ''; ?>" id="inlineFormCustomSelectPref">
								<option value="">Select</option>
								<option value="P">Present</option>
								<option value="A">Absent</option>
								<option value="H" <?php echo $weekday == "Sunday" ? "selected" : ""; ?>>Holiday</option>
							</select>
						<?php } ?>
					</td>
					<td>
						<button type="submit" name="save[]" value="<?php echo strlen($i) == 1 ? "0" . $i : $i; ?>" class="btn btn-primary">Save</button>
					</td>
				</tr>
				<?php } ?>
				<input type="hidden" name="empid" value="<?php echo $employee->id; ?>">
				<input type="hidden" name="year" value="<?php echo $year; ?>">
				<input type="hidden" name="month" value="<?php echo $month; ?>">
				<?php echo form_close(); ?>
			</tbody>
		</table>
	</div>
</div>