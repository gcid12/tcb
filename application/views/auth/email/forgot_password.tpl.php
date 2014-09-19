<html>
<body>

	<h3><?php echo sprintf("Reset TCB password for", $identity);?></h3>
	<p><?php echo sprintf(lang('email_forgot_password_subheading'), anchor('auth/reset_password/'. $forgotten_password_code, lang('email_forgot_password_link')));?></p>
</body>
</html>


