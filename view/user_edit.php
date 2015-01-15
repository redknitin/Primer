<?php include 'view/header.php'; ?>

<?php if (!isset($usr)) $usr=new User; //this is so a create new and edit can use the same form ?>

<script>
function check_confirm_pass() {
	var pass = document.getElementsByName('password')[0].value;
	var confirm = document.getElementsByName('confirm')[0].value;
	if (pass!=confirm) {
		alert('Password and confirmation do not match');
		var self=this;

		//this prevents us from even changing the password or going to another window
		//setTimeout(function() { self.focus(); }, 10);
		//setTimeout(function() { document.getElementsByName('confirm')[0].focus(); }, 10);

		//returning false doesnt do anything for onblur
		return false;
	}
	return true;
}
</script>

<form method="post" action="?action=save<?php if ($usr->username) echo '&username='.$usr->username; ?>">
<input type="text" name="display_name" placeholder="Display Name" value="<?= $usr->display_name ?>" />
<input type="text" name="username" placeholder="Username" value="<?= $usr->username ?>" />
<input type="password" name="password" placeholder="Password" value="<?= $usr->password ?>" />
<input type="password" name="confirm" placeholder="Confirm Password" value="<?= $usr->confirm ?>" onblur="return check_confirm_pass();" />
<input type="email" name="email" placeholder="Email" value="<?= $usr->email ?>" />
<input type="tel" name="phone" placeholder="Phone" value="<?= $usr->phone ?>" />
<input type="submit" value="Save" />
</form>

<?php include 'view/footer.php'; ?>