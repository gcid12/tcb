



<div class="row">
  <div class="col-xs-12 ">
  <br/><br/><br/>
  </div>
</div>

<!-- r2 -->

<div class="row basetxt">
  <div class="col-xs-1 col-md-1 text-center basetxt">
  </div>
  <div class="col-xs-1 col-md-1 text-center basetxt">
    <img class="img-responsive" src="<?php echo base_url('assets/img/tcb/846766.gif')."?=".rand(1,100); ?>" alt="846766"/>
  </div>
  <div class="col-xs-8 col-md-8 text-left">
      <h1 class="lead" style="font-size:3em;">Forgot your password?</h1>
      <h2 class="lead text-white" style="font-size:2em;">Hey, it happens to everyone</h2>
      <br/>

    
		<p class="text-gray">just let us know what email address you use to login and we'll send it to your email.</p>

		<br/>
		<div id="infoMessage" class="inmessage"><?php echo $message;?></div>

		<?php echo form_open("auth/forgot_password");?>

		      <p>
		      	<label for="email"><?php echo sprintf(lang('forgot_password_email_label'), $identity_label);?></label> <br />
		      	<?php echo form_input($email);?>
		      </p>

		      <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'));?></p>

		<?php echo form_close();?>
	</div>
</div>	