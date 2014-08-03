<?php function social_select($select,$value,$pre){ 

if(!isset($select) || $select==""){$select=$pre;} ?>
    <select class="form-control" style="background-color:#ccc;">
      <option value="" >Choose </option> 
      
      <option value="gh" <?php echo ($select =='gh' ? "selected" : "" ); ?> >Github</option> 
      
      <option value="so" <?php echo ($select =='so' ? "selected" : "" ); ?> >StackOverFlow</option>
      <option value="an" <?php echo ($select =='an' ? "selected" : "" ); ?> >AngelList</option>
      <option value="cb" <?php echo ($select =='so' ? "selected" : "" ); ?> >CrunchBase</option> 
      <option value="qr" <?php echo ($select =='qr' ? "selected" : "" ); ?> >Quora</option> 
      <option value="fb" <?php echo ($select =='fb' ? "selected" : "" ); ?> >Facebook</option>
      <option value="tb" <?php echo ($select =='tb' ? "selected" : "" ); ?> >Tumblr</option>  
      <option value="dr" <?php echo ($select =='dr' ? "selected" : "" ); ?> >Dribble</option> 
      <option value="bh" <?php echo ($select =='bh' ? "selected" : "" ); ?> >Behance</option> 
      <option value="in" <?php echo ($select =='in' ? "selected" : "" ); ?> >Linkedin</option> 
      <option value="hn" <?php echo ($select =='hn' ? "selected" : "" ); ?> >HackerNews</option> 
    </select> 



<?php $select="";} ?>


<?php function payment_select($select,$value,$pre){ 

if(!isset($select) || $select==""){$select=$pre;} ?>
 <select class="form-control" style="background-color:#ccc;">
 <option value="" >:::Choose one:::</option> 

 <option value="pb" <?php echo ($select =='pb' ? "selected" : "" ); ?> >Probono</option> 
  <option value="ch" <?php echo ($select =='ch' ? "selected" : "" ); ?> >Check</option> 
  <option value="tr" <?php echo ($select =='tr' ? "selected" : "" ); ?> >Transfer</option>


</select> 

<?php $select="";} ?>





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

    <?php $persona = $tcbuser->first_name; ?>
    <?php $personafull = $tcbuser->first_name." ".$tcbuser->last_name; ?>

    <span class="txttitle" title="UX Designer"><?php echo $personafull; ?></span>
		
  	<div class="row">
  		<div class=" col-sm-6 text-left basetxt txtsmall graytxt1">

                 <span class="">Please complete your information</span><br/><br/>
				
                <div id="infoMessage" class="inmessage"><?php echo $message;?></div>
				
            

				      <?php echo form_open(uri_string());?>
			      

            <!-- 1.About you -->
                <div class="row">
                  <div class="col-sm-12">
                    You in 1 line<div><?php echo form_input($pitch);?></div>

                  </div>
                </div>
                <div class="row">  
                  <div class="col-sm-6">
                  <br/>
                  About you <div><?php echo form_textarea($about);?></div>
                  </div>
                  <div class="col-sm-6">
                  <br/>
                   What I'm looking for:<div><?php echo form_textarea($iwant);?></div>
                  </div>
                </div>
                <div class="row">  
                  <div class="col-sm-12">
                    <br/>

         
          <?php function skillfilter($groups,$currentGroups,$filter){ ?>     
                <?php foreach ($groups as $group):?>

                  <?php if($group['description']==$filter){  //Skill filter?>

                        <!-- create checkbox -->
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
                   
                   <?php }else{} ?>     
                <?php endforeach?>
              
                

          <?php }  //close function ?>
          

                               

                    Skills
                    <div class="well" style="background-color:black;">

                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist" style="color:red;">
                        <li class="active"><a href="#dev" role="tab" data-toggle="tab"><i class="fa fa-code"></i></a></li>
                        <li><a href="#dat" role="tab" data-toggle="tab"><i class="fa fa-database"></i></a></li>
                        <li><a href="#des" role="tab" data-toggle="tab"><i class="fa fa-pencil"></i></a></li>
                        <li><a href="#pro" role="tab" data-toggle="tab"><i class="fa fa-cube"></i></a></li>
                        <li><a href="#fin" role="tab" data-toggle="tab"><i class="fa fa-money"></i></a></li>
                      </ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div class="tab-pane active" id="dev">
                            
                            <div class="lead">Programming Skills </div>
                            <div class="row">
                              <div class="col-sm-6">

                              
                                  <?php  skillfilter($groups, $currentGroups ,"dev"); ?>
                              </div>
                              <div class="col-sm-6">
                                
                                 Other Dev skills<div><?php echo form_textarea($skillsdev);?></div>
                              </div>
                              
                            </div>
                        </div>
                        <div class="tab-pane" id="des">
                            <div class="lead">Design Skills </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <?php  skillfilter($groups, $currentGroups ,"des"); ?>
                                
                              </div>
                              <div class="col-sm-6">
                                
                                 Other Design skills<div><?php echo form_textarea($skillsdes);?></div>
                              </div>
                              
                            </div>
                        </div>

                        <div class="tab-pane" id="pro">
                            <div class="lead">Product Skills</div>
                            <div class="row">
                              <div class="col-sm-6">
                                <?php  skillfilter($groups, $currentGroups ,"pro"); ?>
                                
                              </div>
                              <div class="col-sm-6">
                                
                                 Other Product skills<div><?php echo form_textarea($skillspro);?></div>
                              </div>

                              
                            </div>
                        </div>

                        <div class="tab-pane" id="dat">
                            <div class="lead">Data Skills </div>
                            <div class="row">
                              <div class="col-xs-6">
                                  <?php  skillfilter($groups, $currentGroups ,"dat"); ?>
                              </div>
                              <div class="col-xs-6">
                                
                                 Other Data skills<div><?php echo form_textarea($skillsdat);?></div>
                              </div>
                              
                            </div>
                        </div>
                        <div class="tab-pane" id="fin">
                            <div class="lead">Finance Skills </div>
                            <div class="row">
                              <div class="col-xs-6">
                                  <?php  skillfilter($groups, $currentGroups ,"fin"); ?>
                              </div>
                              <div class="col-sm-6">
                                
                                 Other Finance skills<div><?php echo form_textarea($skillsfin);?></div>
                              </div>
                              
                            </div>
                        </div>
                      </div>
                    </div> <!-- close well -->

                      <?php 
                          if ($this->ion_auth->is_admin()): 
                            echo "<div class='well'>";
                              skillfilter($groups, $currentGroups ,"aa"); 
                            echo "</div>";  
                          endif 
                      ?>

                  </div>


           </div> 
      
      </div><!-- close s5 -->

      <!-- SECOND COLUMN -->

      <div class=" col-sm-6 text-left basetxt txtsmall graytxt1">
          
          <br/><br/><br/>
                <!-- ACCORDION -->
        <div class="panel-group" id="accordion">

          <div class="panel panel-default">
            <div class="panel-tcb">
              <!-- personal info -->
              <a data-toggle="collapse" data-parent="#accordion" href="#c1">
                <h4 class="panel-title">
                  <span class="basetxt2">A. Personal Info </span>
                  <span class="fa-stack fa-sm text-ok pull-right" style="color:green;">
                     <i class="fa fa-circle fa-stack-2x"></i>
                     <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                  </span>
                </h4>  
              </a>
            </div>
            <div id="c1" class="panel-collapse collapse">
              <div class="panel-body">
                  <div class="row">  
                  <div class="col-sm-6">
                    First<div><?php echo form_input($first_name);?></div>  
                  </div>  
                  <div class="col-sm-6">
                    Last<div><?php echo form_input($last_name);?></div>  
                  </div>
                </div>
                <div class="row">  
                  <div class="col-sm-6">
                    Email: <br/>
                    <strong><span style="color:#000;"><?php echo $tcbuser->email; ?></span></strong>
                    <div class="pull-right">
                    <a data-toggle="collapse" data-parent="#accordion" href="#c4">(Edit)</a>
                    </div>

                    
                  </div>  
                  <div class="col-sm-3">
                  City<div><?php echo form_input($city);?></div>
                  </div>
                  <div class="col-sm-3">
                  Country<div><?php echo form_input($country);?></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    Show email  
                      
                      <?php $showemail= $tcbuser->showemail; ?>
                      

                      <input type="checkbox" name="showemail" value="1"  <?php echo ($showemail ==1 ? "checked" : ""); ?> > 
                        <?php echo "(".$showemail.")"; ?>

                  </div>

                  <div class="col-sm-3">
                    Tshirt Size
                    
                    <?php
                    $options = array(
                  'sm'  => 'Small',
                  'md'    => 'Medium',
                  'lg'   => 'Large',
                  'xl' => 'Extra Large',
                      );

                    $currentshirt= $tcbuser->tshirt;

                echo form_dropdown('tshirt', $options, $currentshirt);

                    ?>

                    
                  </div>
                  <div class="col-sm-3">
                    <br/>
                    
                    <?php
                    $options = array(
                  'm'  => 'Male',
                  'f'    => 'Female',
                      );

                    $currentgender= $tcbuser->gender;

                echo form_dropdown('gender', $options, $currentgender);

                    ?>


                  </div>
                </div>
                <div class="row">  
                  <div class="col-sm-12">
                    Personal Web (Blog, Portfolio,etc..)<div><?php echo form_input($pw);?></div>
                  </div>
                </div>  

              </div> <!-- close panel body -->
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-tcb">
              <!-- panel1  -->
              <a data-toggle="collapse" data-parent="#accordion" href="#c2">
                <h4 class="panel-title">
                  <span class="basetxt2">B. Social Media </span>
                  <span class="fa-stack fa-sm text-ok pull-right" style="color:green;">
                     <i class="fa fa-circle fa-stack-2x"></i>
                     <i class="fa fa-heart fa-stack-1x fa-inverse"></i>
                  </span>
                </h4>  
              </a>
            </div>
            <div id="c2" class="panel-collapse collapse in">  <!-- in -->
              <div class="panel-body">
                    
                <!-- Social --> 

                Twitter
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-twitter"></i></div>
                  <div class="input-group-addon">@</div>
                  <?php echo form_input($s01);?>
                </div>

                <?php
                    $options= array(
                      '00'  => '::Choose::',
                      'gh'  => 'Github',
                      'so'    => 'StackOverflow',
                      'an'    => 'AngelList',
                      'cb'    => 'CrunchBase',
                      'qr'    => 'Quora',
                      'fb'    => 'Facebook',
                      'dr'    => 'Dribble',
                      'bh'    => 'Behance',
                      'in'    => 'Linkedin',
                      'hn'    => 'HackerNews',
                      );

                    $currentk02= $tcbuser->k02;
                    $currentk03= $tcbuser->k03;
                    $currentk04= $tcbuser->k04;
                    $currentk05= $tcbuser->k05;
  
                    ?>

                <br/>
                <div class="row">  
                  <div class="col-sm-3">
                    <?php echo form_dropdown('k02', $options, $currentk02); ?>
                  </div> 
                  <div class="col-sm-9">
                    <div><?php echo form_input($s02);?></div>  
                  </div> 
                </div>
                <div class="row">  
                  <div class="col-sm-3">
                    <?php echo form_dropdown('k03', $options, $currentk03); ?>
                  </div> 
                  <div class="col-sm-9">
                    <div><?php echo form_input($s03);?></div>  
                  </div> 
                </div>
                <div class="row">  
                  <div class="col-sm-3">
                    <?php echo form_dropdown('k04', $options, $currentk04); ?>
                  </div> 
                  <div class="col-sm-9">
                    <div><?php echo form_input($s04);?></div>  
                  </div> 
                </div>
                <div class="row">  
                  <div class="col-sm-3">
                    <?php echo form_dropdown('k05', $options, $currentk05); ?>
                  </div> 
                  <div class="col-sm-9">
                    <div><?php echo form_input($s05);?></div>  
                  </div> 
                </div>
                <div class="row">
                  <div class="col-sm-12">

                      <p style="line-height:2em;">
                        <hr/>

                      <?php $recru= $tcbuser->recru; ?>

                      <input type="checkbox" name="recru" value="1"  <?php echo ($recru ==1 ? "checked" : ""); ?> > 
                        

                        It's ok to be contacted by recruiters.  <?php echo "(".$recru.")"; ?>
                      </p>
                  </div>
                </div>
              </div> <!-- close panel body -->
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-tcb">
              <!-- panel2  -->
              <a data-toggle="collapse" data-parent="#accordion" href="#c3">
                <h4 class="panel-title">
                  <span class="basetxt2">C. Getting Paid</span>
                  <span class="fa-stack fa-sm text-ok pull-right" style="color:green;">
                     <i class="fa fa-circle fa-stack-2x"></i>
                     <i class="fa fa-usd fa-stack-1x fa-inverse"></i>
                  </span>
                </h4>  
              </a>
            </div>
            <div id="c3" class="panel-collapse collapse">
              <div class="panel-body">

                  <?php
                    $options= array(
                      '00'  => 'Select',
                      'pb'  => 'Pro-bono',
                      'tr'  => 'Transfer',
                      'ch'    => 'Check',
                      );

                    $pm01= $tcbuser->pm01;
                    $pm02= $tcbuser->pm02;
                    $pm03= $tcbuser->pm03;
                    
  
                    ?>

                How do you like getting paid for completed projects.
                <hr/>

                <div class="row">  
                  <div class="col-sm-4">
                     <?php echo form_dropdown('pm01', $options, $pm01); ?>
                  </div>  
                  <div class="col-sm-8">
                    <?php echo form_input($pay01);?>
                  </div>
                </div>
                <div class="row">  
                  <div class="col-sm-4">
                     <?php echo form_dropdown('pm02', $options, $pm02); ?>
                  </div>  
                  <div class="col-sm-8">
                    <?php echo form_input($pay02);?>
                  </div>
                </div>
                <div class="row">  
                  <div class="col-sm-4">
                     <?php echo form_dropdown('pm03', $options, $pm03); ?>
                  </div>  
                  <div class="col-sm-8">
                    <?php echo form_input($pay03);?>
                  </div>
                </div>

                <hr/>
                <div class="alert alert-success" role="alert" style="font-size:0.7em;">
                  <i class="fa fa-clock-o"></i>
                  More options soon..   
                </div>  

              </div> <!-- close Panel-Body -->
            </div>
          </div>


          <div class="panel panel-default">
            <div class="panel-tcb">
              <!-- panel2  -->
              <a data-toggle="collapse" data-parent="#accordion" href="#c4">
                <h4 class="panel-title">
                  <span class="basetxt2">D. Access</span>
                  <span class="fa-stack fa-sm text-ok pull-right" style="color:green;">
                     <i class="fa fa-circle fa-stack-2x"></i>
                     <i class="fa fa-key fa-stack-1x fa-inverse"></i>
                  </span>
                </h4>  
              </a>
            </div>
            <div id="c4" class="panel-collapse collapse">
              <div class="panel-body">
                  Email<br/>
                  <div class="label label-warning"><i class="fa fa-warning"></i> 
                  Don't get locked out, this is your username and recovery address.
                  
                  </div>

                  <div><?php echo form_input($email);?></div> 
                  
                  <hr/>
                  <br/>
                  <span class="label label-warning"><i class="fa fa-warning"></i> Update password only if you want to change it </span>
                  
                  <div>Password: (Only if changing)</div>
                  <div><?php echo form_input($password);?></div>
                  <div><?php echo lang('edit_user_password_confirm_label', 'password_confirm');?></div>
                  <div><?php echo form_input($password_confirm);?></div>
              </div>
            </div>
          </div>

          <br/><br/>
          <input type="submit" name="submit" value="Save" class="btn btn-success btn-lg">

        </div> <!--  CLOSE ACCORDION -->


        
      </div> <!-- close 5 -->
      <div class=" col-sm-7 text-left basetxt graytxt1">

            <?php echo form_hidden('id', $user->id);?>
              <?php echo form_hidden($csrf); ?>

              
            <?php echo form_close();?>
      </div>
	  </div> <!-- close row -->

	</div><!--  close xs9 -->

</div> <!-- close row -->		

<input type="hidden" value="pasto" name="tags" class="tagit-hidden-field">
<input type="hidden" value="algodon" name="tags" class="tagit-hidden-field">


