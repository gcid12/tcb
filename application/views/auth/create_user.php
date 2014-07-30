
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
  	<img class="img-responsive" src="<?php //echo base_url('assets/img/tcb/846766.gif') ?>?" alt="846766" width="100px"/>
  </div>
  <div class="col-xs-7 col-md-7 text-left">
  
		<span class="txttitle">Invite a New Member</span>
		
		
		<br/>
				
		  
		<div class="fhr"></div>		
			
	  	<div class="row">
	  		<div class=" col-sm-10 text-left basetxt txtsmall graytxt1">
				

				
					<span class=""><?php echo lang('create_user_subheading');?></span><br/><br/>
					
					<div id="infoMessage" class="inmessage"><?php echo $message;?></div>
					
					
					<?php echo form_open("auth/invite_user");?>
					
					      <p>
					            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
					            <?php echo form_input($first_name);?>
					      </p>
					
					      <p>
					            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
					            <?php echo form_input($last_name);?>
					      </p>
					      <p>
					            <?php echo lang('create_user_email_label', 'email');?> <br />
					            <?php echo form_input($email);?>
					      </p>
					
					      
						 <p>
					            WEB<br/>
					            <div class="label label-vader graytxt2">
					    			 URL that best describe her/him (Blog, Twitter, github, Linkedin..)
					    		</div><br/>
					    	
					            <?php echo form_input($company);?>
					      </p>

						<br/><br/>
					      
					
					      <!--
<p>
					            <?php //echo lang('create_user_phone_label', 'phone');?> <br />
					            <?php //echo form_input($phone);?>
					      </p>
-->
			
							
							<?php		
					if ($this->ion_auth->is_admin()){ ?>
							<div class="well" style="background-color:#333;">
						
							Password<br/>		
							<div class="label label-vader graytxt2">
					    	 Create a password for her/him
					    	</div>
					    	 <br/> 
					            <?php echo form_input($password);?>
					     
					     <p> 
					            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br /> 
					            <?php echo form_input($password_confirm);?> 
					     </p>
					    </div> 
					<?php } ?>	
								
					    
					           
					    
					    
					    
					    <div class="label label-warning"> Endorsed by:
							<?php 
							$endorser= $tcbuser->first_name." ".$tcbuser->last_name;
							
							  echo $endorser;
							$endorserid= $tcbuser->id;
						   echo form_hidden('endorser', $endorserid); //endorser ?>
						</div>
						
					    	
							
						
					      <?php //echo form_submit('submit', "INVITE");?>
					      <br/><br/><br/>
					      <input class="form-control btn btn-danger" type="submit" name="submit" value="SEND" />
					
					<?php echo form_close();?>
				
				<br/><br/><br/><br/>
			</div>


		</div> <!-- close row -->
	</div><!--  close xs7 -->
	<div class="col-xs-2">
  	</div>
</div> <!-- close row -->		


