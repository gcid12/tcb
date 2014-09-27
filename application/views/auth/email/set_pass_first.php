<html>
<body>
	<h4><?php echo sprintf(lang('Hello'), $identity);?>, Welcome to TCB.</h4>
	<p><?php echo sprintf("Click", anchor('auth/reset_password/'. $forgotten_password_code, "here"));?>
	to set your password.
	</p>
</body>
</html>


