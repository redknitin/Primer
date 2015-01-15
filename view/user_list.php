<?php include 'view/header.php'; ?>

<a href="?action=edit">New</a>

<table border="1">
<thead>
<tr>
	<th>Display Name</th>
	<th>Username</th>
	<th>Email</th>
	<th>Phone</th>
	<th></th>
</tr>
</thead>

<tbody>
<?php foreach($data['users'] as $user): ?>
<tr>
	<td><?= $user->display_name ?></td>
	<td><?= $user->username ?></td>
	<td><?= $user->email ?></td>
	<td><?= $user->phone ?></td>
	<td>
		<a href="?action=edit&username=<?= $user->username ?>">Edit</a>
		<form method="post" action="?action=delete"><input type="hidden" name="username" value="<?= $user->username ?>"><input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete');"></form>
	</td>
</tr>
<?php endforeach; ?>
</tbody>

</table>
<?php include 'view/footer.php'; ?>