
<div class="row">
  <div class="col-xs-12 ">
  
  <br/><br/><br/>
  </div>
    

</div>

<!-- r2 -->

<div class="row basetxt">

  <div class="col-xs-1 col-md-1">
  </div>
  
  <div class="col-xs-1 col-md-1 text-center basetxt">
  	<img class="img-responsive" src="<?php echo base_url('assets/img/tcb/846766.gif') ?>?" alt="846766" width="100px"/>
  </div>
  <div class="col-xs-9 col-md-9 text-left">
  
		<span class="txttitle">Edit your info</span>
		<br/>
	  <div class="fhr"></div>		
		
  	<div class="row">
  		<div class=" col-sm-5 text-left basetxt txtsmall graytxt1">

            <span class=""><?php echo lang('edit_user_subheading');?></span><br/><br/>
				
            <div id="infoMessage" class="inmessage"><?php echo $message;?></div>
				
				      <?php echo form_open(uri_string());?>
			      
			      <div><?php echo lang('edit_user_fname_label', 'first_name');?></div> 
			      <!-- <div><?php //echo  form_input($first_name);?></div> -->
            <div><input type="text" class="form-control" name="first_name" value="Gerardo" id="first_name"></div>
			      
			      <div><?php echo lang('edit_user_lname_label', 'last_name');?></div>
			      <!-- <div><?php //echo form_input($last_name);?></div> -->
            <input type="text" class="form-control" name="last_name" value="Cid" id="last_name">
			      
			      <div>Twitter<br /></div>
			      <!-- <div><?php //echo form_input($tw);?></div> -->
			      <input type="text" class="form-control" name="tw" value="jerrycid" id="tw">

			      
			      <div><?php if ($this->ion_auth->is_admin()): ?>
			
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
            </div>    
			        
			        
      </div><!-- close s5 -->

      <!-- SECOND COLUMN -->

      <div class=" col-sm-7 text-left basetxt txtsmall graytxt1">
          
          <br/><br/><br/>
                <!-- ACCORDION -->
        <div class="panel-group" id="accordion">
          <div class="panel panel-default">
            <div class="panel-tcb">
              
             <!-- panel1  -->
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                <h4 class="panel-title">
                  <span class="basetxt2">1. About you </span>
                  <span class="fa-stack fa-sm text-ok pull-right" style="color:green;">
                     <i class="fa fa-circle fa-stack-2x"></i>
                     <i class="fa fa-check fa-stack-1x fa-inverse"></i>
                  </span>
                </h4>  
              </a>
              
            </div>
            <div id="collapseOne" class="panel-collapse collapse"> <!-- in -->
              <div class="panel-body">
                
                
                <div><?php echo lang('edit_user_company_label', 'company');?> </div>
                <div><?php echo form_input($company);?></div>
                
                <?php //print_r($tcbuser); ?>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-tcb">
              <!-- panel2  -->
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                <h4 class="panel-title">
                  <span class="basetxt2">2. Skills</span>
                  <span class="fa-stack fa-sm text-ok pull-right" style="color:green;">
                     <i class="fa fa-circle fa-stack-2x"></i>
                     <i class="fa fa-check fa-stack-1x fa-inverse"></i>
                  </span>
                </h4>  
              </a>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
              <div class="panel-body">

                  <a class="btn btn-default" href="/auth/invite_user">Invite to TCB</a>

              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-tcb">
              <!-- panel1  -->
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                <h4 class="panel-title">
                  <span class="basetxt2">3. Social </span>
                  <span class="fa-stack fa-sm text-ok pull-right" style="color:green;">
                     <i class="fa fa-circle fa-stack-2x"></i>
                     <i class="fa fa-check fa-stack-1x fa-inverse"></i>
                  </span>
                </h4>  
              </a>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
              <div class="panel-body">

                You don't have any transaction yet

              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-tcb">
              <!-- panel1  -->
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                <h4 class="panel-title">
                  <span class="basetxt2">4. Password </span>
                  <span class="fa-stack fa-sm text-ok pull-right" style="color:green;">
                     <i class="fa fa-circle fa-stack-2x"></i>
                     <i class="fa fa-check fa-stack-1x fa-inverse"></i>
                  </span>
                </h4>  
              </a>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
              <div class="panel-body">

                  <div><?php echo lang('edit_user_password_label', 'password');?> </div>
                  <div><?php echo form_input($password);?></div>
                  <div><?php echo lang('edit_user_password_confirm_label', 'password_confirm');?></div>
                  <div><?php echo form_input($password_confirm);?></div>
                

              </div>
            </div>
          </div>
        </div> <!--  CLOSE ACCORDION -->
        
      </div> <!-- close 5 -->
      <div class=" col-sm-7 text-left basetxt graytxt1">

            <?php echo form_hidden('id', $user->id);?>
              <?php echo form_hidden($csrf); ?>
              <br/>
              <p><?php echo form_submit('submit', lang('edit_user_submit_btn'));?></p>
            <?php echo form_close();?>
      </div>
	  </div> <!-- close row -->

	</div><!--  close xs9 -->

</div> <!-- close row -->		



