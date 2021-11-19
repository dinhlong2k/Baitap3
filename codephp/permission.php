<?php
if (isset($_SESSION['login']) ==false) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	header('Location: home.php');
	exit();
}
?>