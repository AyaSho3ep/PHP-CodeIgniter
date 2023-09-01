<?php include("includes/header.php"); ?>

<div class="container">
	<h1 class="fw-bold mt-5">Contacts info!</h1>
	<?= anchor("ContactController/add", "Add Contact", ['class'=>'btn btn-primary my-3']); ?>


	<table class="table table-hover mt-5 text-center">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Remarks</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
	<?php if(count($contacts)):?>
		<?php foreach($contacts as $contact): ?>
    <tr>
      <th scope="row"><?= $contact->id; ?></th>
      <td><?= $contact->f_name; ?></td>
      <td><?= $contact->l_name; ?></td>
      <td><?= $contact->email; ?></td>
      <td><?= $contact->phone; ?></td>
      <td><?= $contact->remarks; ?></td>
      <td><?= $contact->status == '1'? 'Active' : 'Not Active'; ?></td>
	  <td>
		<?= anchor("ContactController/editContact/{$contact->id}", "Edit", ['class'=>'btn btn-outline-warning']); ?>
		<?= anchor("ContactController/deleteContact/{$contact->id}", "Delete", ['class'=>'btn btn-outline-danger']); ?>
	  </td>
    </tr>
	<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td>No Data Found!!</td>
		</tr>
	<?php endif; ?>
  </tbody>
</table>
</div>
<?php include("includes/header.php"); ?>
