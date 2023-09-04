<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Upload files</title>
</head>

<body>
	<div class="container mt-3">
	<h2>Upload Your PDF Files and extract emails and names found </h2><hr>

	<?= form_open_multipart('upload/uploadFiles'); ?>

	<div class="row mb-3">
			<div class="col-md-6">
			<input type="file" name="usr_files[]" multiple="multiple" />
			<span class="text-danger"><?php if (isset($error)) { echo $error; } ?></span>
			</div>
		</div>

		<input type="submit" class="btn btn-primary" name="fileSubmit" value="extract Emails & names"/>

	<?php echo form_close(); ?>
	<?php if (isset($success_msg)) { echo $success_msg; } ?>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
