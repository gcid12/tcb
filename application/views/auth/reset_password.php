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

      <h1 class="lead" style="font-size:3em;"><?php echo lang('reset_password_heading');?></h1>
      <h2 class="lead text-white" style="font-size:2em;">Please type your new password</h2>
      <br/>


		<br/>
		<div id="infoMessage" class="inmessage"><?php echo $message;?></div>

		<div id="infoMessage" class="inmessage"><?php echo $message;?></div>
		<?php echo form_open('auth/reset_password/' . $code);?>

			<p>
				<label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
				<?php echo form_input($new_password);?>
			</p>

			<p>
				<?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
				<?php echo form_input($new_password_confirm);?>
			</p>

			<?php echo form_input($user_id);?>
			<?php echo form_hidden($csrf); ?>

			<p><?php echo form_submit('submit', lang('reset_password_submit_btn'));?></p>

		<?php echo form_close();?>
	</div>
</div>	