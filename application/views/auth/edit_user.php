
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
  	<img class="img-responsive" src="<?php echo base_url('assets/img/tcb/846766.gif')."?=".rand(1,100); ?>" alt="846766" width="100px"/>
  </div>
  <div class="col-xs-9 col-md-9 text-left">
  
		<span class="txttitle"><!-- Edit your info --></span>
		<br/>
	  <div class="fhr"></div>		
		
  	<div class="row">
  		<div class=" col-sm-5 text-left basetxt txtsmall graytxt1">

            <span class=""><?php echo lang('edit_user_subheading');?></span><br/><br/>
				
            <div id="infoMessage" class="inmessage"><?php echo $message;?></div>
				
				      <?php echo form_open(uri_string());?>
			      
			      <div><?php echo lang('edit_user_fname_label', 'first_name');?></div> 
			      <div><?php echo  form_input($first_name);?></div>
			      
			      <div><?php echo lang('edit_user_lname_label', 'last_name');?></div>
			      <div><?php echo form_input($last_name);?></div>
			      
			      <div>Twitter<br /></div>
			      <div><?php echo form_input($s01);?></div>

			      
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
            <div id="collapseOne" class="panel-collapse collapse in"> <!-- in -->
              <div class="panel-body">
                
                <!-- 1.About you -->
                1 line Pitch <div><?php echo form_input($pitch);?></div>
                About you:<div><?php echo form_input($about);?></div>
                I want:<div><?php echo form_input($iwant);?></div>
                City<div><?php echo form_input($city);?></div>
                Country<div><?php echo form_input($country);?></div>

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

                <!--   2. Skills  -->
                Developer Skills<div><?php echo form_input($skillsdev);?></div>
                Design Skills<div><?php echo form_input($skillsdes);?></div>
                Media Skills<div><?php echo form_input($skillsmed);?></div>
                Data Skills<div><?php echo form_input($skillsdat);?></div>  

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
            <div id="collapseThree" class="panel-collapse collapse">  <!-- in -->
              <div class="panel-body">

                <?php function social_select($select,$value,$pre){ 

                if(!isset($select) || $select==""){$select=$pre;} ?>
                    <select class="form-control" style="background-color:#ccc;">
                      <option value="" >:::Choose one:::</option> 
                      
                      <option value="gh" <?php echo ($select =='gh' ? "selected" : "" ); ?> >Github</option> 
                      <option value="hn" <?php echo ($select =='hn' ? "selected" : "" ); ?> >HackerNews</option> 
                      <option value="so" <?php echo ($select =='so' ? "selected" : "" ); ?> >StackOverFlow</option>
                      <option value="an" <?php echo ($select =='an' ? "selected" : "" ); ?> >AngelList</option>
                      <option value="cb" <?php echo ($select =='so' ? "selected" : "" ); ?> >CrunchBase</option> 
                      <option value="qr" <?php echo ($select =='qr' ? "selected" : "" ); ?> >Quora</option> 
                      <option value="fb" <?php echo ($select =='fb' ? "selected" : "" ); ?> >Facebook</option>
                      <option value="tb" <?php echo ($select =='tb' ? "selected" : "" ); ?> >Tumblr</option>  
                      <option value="dr" <?php echo ($select =='dr' ? "selected" : "" ); ?> >Dribble</option> 
                      <option value="bh" <?php echo ($select =='bh' ? "selected" : "" ); ?> >Behance</option> 
                      <option value="in" <?php echo ($select =='in' ? "selected" : "" ); ?> >Linkedin</option> 
                    </select> 

                <?php $select="bh";}

                ?>

                <!-- 3. Social --> 
                <br/>   

                Twitter
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-twitter"></i></div>
                  <div class="input-group-addon">@</div>
                  <?php echo form_input($s01);?>
                </div>

                <br/> 
                Social 2<div><?php echo form_input($s02);?></div>  
                

                  <?php social_select("","",""); ?>

                <br/> 
                Social 3<div><?php echo form_input($s03);?></div>  
                    <?php social_select("","",""); ?>

                <br/> 
                Social 4<div><?php echo form_input($s04);?></div>  
                    <?php social_select("","",""); ?>  
                <br/> 
                Social 5<div><?php echo form_input($s05);?></div>  
                    <?php social_select("","",""); ?>
                <br/> 

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



