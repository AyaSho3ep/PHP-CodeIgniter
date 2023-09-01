<?php include("includes/header.php"); ?>
<div class="container">
	<?= form_open("ContactController/createStudent", ['class' => 'form-horizontal']); ?>

	<h3>Add New Contact</h3>
	<hr>
		<div class="row mb-3">
			<div class="col-md-2">
			<label class="form-label">First name</label>
			</div>
			<div class="col-md-6">
				<?= form_input(['name' => 'f_name', 'class' => 'form-control', 'placeholder' => 'First name', 'value' => set_value('f_name')]); ?>
			</div>
		</div>
		<div class="col-md-6 mb-3">
			<?= form_error('f_name', '<div class="text-danger text-center">', '</div>'); ?>
		</div>


		<div class="row mb-3">
		<div class="col-md-2">
			<label class="form-label">Last name</label>
			</div>
			<div class="col-md-6">
				<?= form_input(['name' => 'l_name', 'class' => 'form-control', 'placeholder' => 'Last name', 'value' => set_value('l_name')]); ?>
			</div>
		</div>
		<div class="col-md-6 mb-3">
			<?= form_error('l_name', '<div class="text-danger text-center">', '</div>'); ?>
		</div>

		
		<div class="row mb-3">
		<div class="col-md-2">
			<label class="form-label">Email</label>
			</div>
			<div class="col-md-6">
				<?= form_input(['name' => 'email', 'class' => 'form-control', 'placeholder' => 'Email', 'value' => set_value('email')]); ?>
			</div>
		</div>
		<div class="col-md-6 mb-3">
			<?= form_error('email', '<div class="text-danger text-center">', '</div>'); ?>
		</div>
		
		
		<div class="row mb-3">
		<div class="col-md-2">
			<label class="form-label">Phone</label>
			</div>
			<div class="col-md-6">
				<?= form_input(['name' => 'phone', 'class' => 'form-control', 'placeholder' => 'phone', 'value' => set_value('phone')]); ?>
			</div>
		</div>
		<div class="col-md-6 mb-3">
			<?= form_error('phone', '<div class="text-danger text-center">', '</div>'); ?>
		</div>

		<div class="row mb-3">
		<div class="col-md-2">
			<label class="form-label">remarks</label>
			</div>
			<div class="col-md-6">
				<?= form_input(['name' => 'remarks', 'class' => 'form-control', 'placeholder' => 'remarks', 'value' => set_value('remarks')]); ?>
			</div>
		</div>
		<div class="col-md-6 mb-3">
			<?= form_error('remarks', '<div class="text-danger text-center">', '</div>'); ?>
		</div>


		<div class="row mb-3">
		<div class="col-md-2">
			<label class="form-label">Status</label>
			</div>
		<div class="col-md-6">
			<select class="form-select" name="status">
				<option value="">Status</option>
				<option value="0">Not Active</option>
				<option value="1">Active</option>
			</select>
		</div>
		</div>
		<div class="col-md-6 mb-3">
			<?= form_error('status', '<div class="text-danger text-center">', '</div>'); ?>
		</div>
		
		<button type="submit" class="btn btn-primary mt-3 p-2">Add Contact</button>
		<?= anchor("contacts", "Back", ['class'=>'btn btn-primary mt-3 py-2 px-4']); ?>
	<?= form_close(); ?>
</div>
<?php include("includes/footer.php"); ?>
