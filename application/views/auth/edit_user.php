
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
  	<img class="img-responsive" src="<?php echo base_url('assets/img/tcb/846766.gif') ?>" alt="846766" width="100px"/>
  </div>
  <div class="col-xs-7 col-md-7 text-left">
  
		<span class="txttitle">Your info</span>
		
		
		<br/>
				
		  
		<div class="fhr"></div>		
			
	  	<div class="row">
	  		<div class=" col-sm-10 text-left basetxt txtsmall graytxt1">
				
				
					<span class=""><?php echo lang('edit_user_subheading');?></span><br/><br/>
					
					<div id="infoMessage" class="inmessage"><?php echo $message;?></div>
					
					
					<?php echo form_open(uri_string());?>
				
				      <p>
				            <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
				            <?php echo form_input($first_name);?>
				      </p>
				
				      <p>
				            <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
				            <?php echo form_input($last_name);?>
				      </p>
				
				      <p>
				            <?php echo lang('edit_user_company_label', 'company');?> <br />
				            <?php echo form_input($company);?>
				      </p>
				
				      <p>
				            <?php echo lang('edit_user_phone_label', 'phone');?> <br />
				            <?php echo form_input($phone);?>
				      </p>
				      
				      <p>
				             Twitter<br />
				            <?php echo form_input($tw);?>
				      </p>
				
				      <p>
				            <?php echo lang('edit_user_password_label', 'password');?> <br />
				            <?php echo form_input($password);?>
				      </p>
				
				      <p>
				            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
				            <?php echo form_input($password_confirm);?>
				      </p>
				
				      <?php if ($this->ion_auth->is_admin()): ?>
				
				          <h3><?php echo lang('edit_user_groups_heading');?></h3>
				          <?php foreach ($groups as $group):?>
				              <label class="checkbox">
				              <?php
				                  $gID=$group['id'];
				                  $checked = null;
				                  $item = null;
				                  foreach($currentGroups as $grp) {
				                      if ($gID == $grp->id) {
				                          $checked= ' checked="checked"';
				                      break;
				                      }
				                  }
				              ?>
				              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
				              <?php echo $group['name'];?>
				              </label>
				          <?php endforeach?>
				
				      <?php endif ?>
				
				      <?php echo form_hidden('id', $user->id);?>
				      <?php echo form_hidden($csrf); ?>
				
						<br/>
				      <p><?php echo form_submit('submit', lang('edit_user_submit_btn'));?></p>
				
				<?php echo form_close();?>
				
			</div>


		</div> <!-- close row -->
	</div><!--  close xs7 -->
	<div class="col-xs-2">
  	</div>
</div> <!-- close row -->		



