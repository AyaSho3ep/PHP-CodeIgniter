<?php include("includes/header.php"); ?>
<div class="container mt-5">
	<?= form_open("ContactController/updateContact/{$contactData->id}", ['class' => 'form-horizontal']); ?>

	<h3>Edit Contact</h3>
	<hr>
		<div class="row mb-3">
			<div class="col-md-2">
			<label class="form-label">First name</label>
			</div>
			<div class="col-md-6">
				<?= form_input(['name' => 'f_name', 'class' => 'form-control', 'placeholder' => 'First name', 'value' => set_value('f_name', $contactData->f_name)]); ?>
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
				<?= form_input(['name' => 'l_name', 'class' => 'form-control', 'placeholder' => 'Last name', 'value' => set_value('l_name', $contactData->l_name)]); ?>
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
				<?= form_input(['name' => 'email', 'class' => 'form-control', 'placeholder' => 'Email', 'value' => set_value('email', $contactData->email)]); ?>
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
				<?= form_input(['name' => 'phone', 'class' => 'form-control', 'placeholder' => 'phone', 'value' => set_value('phone', $contactData->phone)]); ?>
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
				<?= form_input(['name' => 'remarks', 'class' => 'form-control', 'placeholder' => 'remarks', 'value' => set_value('remarks', $contactData->remarks)]); ?>
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
				<option selected><?= $contactData->status == '1'? 'Active' : 'Not Active'?></option>
				<option value="<?= $contactData->status == '1'? '0' : '1'?>"><?= $contactData->status == '1'? 'Not Active' : 'Active'?></option>
			</select>
		</div>
		</div>
		<div class="col-md-6 mb-3">
			<?= form_error('status', '<div class="text-danger text-center">', '</div>'); ?>
		</div>
		
		<button type="submit" class="btn btn-primary mt-3 p-2">Update Contact</button>
		<?= anchor("contacts", "Back", ['class'=>'btn btn-primary mt-3 py-2 px-4']); ?>
	<?= form_close(); ?>
</div>
<?php include("includes/footer.php"); ?>
