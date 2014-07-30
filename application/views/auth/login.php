
<div class="row">
  <div class="col-xs-12 ">
  <br/><br/><br/>
  </div>
    

</div>

<!-- r2 -->

<div class="row basetxt">

  <div class="col-xs-1 col-md-1">
  </div>
  
  <div class="col-xs-2 col-md-2 text-center basetxt">
  	<img class="img-responsive" src="<?php echo base_url('assets/img/tcb/846766.gif') ?>?" alt="846766" width="100px"/>
  </div>
  <div class="col-xs-7 col-md-7 text-left">
  
		<span class="txttitle"><?php echo lang('login_heading');?>123456</span>
		
		<br/>
				
		  
		<div class="fhr"></div>		
			
	  	<div class="row">
	  		<div class=" col-sm-10 text-left basetxt txtsmall graytxt1">
				
					<p><?php echo lang('login_subheading');?></p><br/>
					
					<div id="infoMessage" class="inmessage"><?php echo $message;?></div>
					
					<?php echo form_open("auth/login");?>
 
					<?php echo lang('login_identity_label', 'identity');?><br/>
					<?php echo form_input($identity);?><br/>
					
					<?php echo lang('login_password_label', 'password');?><br/>
					<?php echo form_input($password);?>
					
					<br/><br/>
					
					<?php echo lang('login_remember_label', 'remember');?>
					<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?><br/>
					
					<p><?php echo form_submit('submit', lang('login_submit_btn'));?></p><br/>
					<?php echo form_close();?>
					
					<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p> 
					

				
			</div>


		</div> <!-- close row -->
	</div><!--  close xs7 -->
	<div class="col-xs-2">
  	</div>
</div> <!-- close row -->		



 
