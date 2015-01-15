<?php
include 'config.php';
include 'model/user.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

@mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db($db_name);

if ($action==='index') {
	$rset = mysql_query('select * from user');

	$user_arr = [];
	while($iter_obj = mysql_fetch_object($rset, 'User')) {
		$user_arr[] = $iter_obj;
	}

	//$usr = new User();
	$data = [
		'users' => $user_arr
	];

	include 'view/user_list.php';
} elseif ($action==='save') {
	//$usr = (User) $_POST;
	$usr = new User;
	foreach($_POST as $key=>$val) $usr->$key=$val;
	
	if (isset($_GET['username'])) {
		$sql = "update user set display_name='$usr->display_name', email='$usr->email', phone='$usr->phone'".($usr->password?", password=$usr->password":'')." where username='$usr->username'";
	} else {
		$sql = "insert into user(display_name, username, password, email, phone) values('$usr->display_name', '$usr->username', '$usr->password', '$usr->email', '$usr->phone')";
	}
	
	mysql_query($sql);
	
	header('Location: user_controller.php');
} else if ($action=='delete') {
	$username = $_POST['username'];

	$rset = mysql_query("delete from user where username='$username'");
	
	header('Location: user_controller.php');
} else if ($action=='edit') {
	if (isset($_GET['username'])) {
		$username = $_GET['username'];
		
		$rset = mysql_query("select display_name, username, email, phone from user where username='$username'");
		$usr = mysql_fetch_object($rset, 'User');
	}
	
	include 'view/user_edit.php';
}

mysql_close();