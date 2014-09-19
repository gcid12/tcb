
<html>
<body>
	<h1>Hello, you were invited to TCB.io</h1>
	<h2><?php echo sprintf(lang('email_activate_subheading'), anchor('auth/activate/'. $id .'/'. $activation, lang('email_activate_link')));?></h2>


	<br/>
	
	<h4>About TCB.io </h4>
		<p>
			TCB it's a network of startup experts: Coders, Designers and Data experts
		</p>

	<hr/>
	<p><small><?php echo sprintf("Invitation sent to", $identity);?>. If you want to decline this invitation please forward this mail to: hello@tcb.io</small></p>
</body>
</html>