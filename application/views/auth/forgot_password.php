
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
      <h1 class="lead" style="font-size:3em;">Password Reset</h1>
      <br/>

    

		<br/>
		<div id="infoMessage" class="inmessage"><?php echo $message;?></div>

		<?php echo form_open("auth/forgot_password");?>

		      <p>
		      	<label for="email">Your email:</label> <br />
		      	<?php echo form_input($email);?>
		      </p>

		      <p><?php echo form_submit('submit', "Send me my password");?></p>

		<?php echo form_close();?>
	</div>
</div>	