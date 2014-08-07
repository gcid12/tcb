
<div class="row">
  <div class="col-xs-12 ">
  <br/><br/><br/>
  </div>
</div>

<!-- r2 -->

<div class="row basetxt">
  <div class="col-sm-1 col-md-1 text-center basetxt">
  </div>
  <div class="col-sm-1 col-md-2 text-center basetxt">
  	<img class="img-responsive" src="<?php echo base_url('assets/img/tcb/846766.gif')."?=".rand(1,100); ?>" alt="846766"/>
  </div>
  <div class="col-sm-8 col-md-7 text-left">

   	<div class="pull-right" style="color:#666;">
  		<h2>23 
  			<i class="fa fa-bolt fa-2x"></i>
  		</h2>
  	</div>


  <h1 class="lead" style="font-size:3em;"><?php echo $user->first_name." ".$user->last_name; ?></h1>
  	
		

  		<?php
  		$k01=$user->k01;
  		$k02=$user->k02;
  		$k03=$user->k03;
  		$k04=$user->k04;
  		$k05=$user->k05;

  		$s01=$user->s01;
  		$s02=$user->s02;
  		$s03=$user->s03;
  		$s04=$user->s04;
  		$s05=$user->s05;

  		?>


  		<?php if (isset($s01)) { $this->tcb_functions->tcb_social_icons("tw",$s01); } ?>
  		&nbsp;&nbsp;
  		<?php if (isset($s02)) { $this->tcb_functions->tcb_social_icons($k02,$s02); } ?>
  		&nbsp;&nbsp;
  		<?php if (isset($s03)) { $this->tcb_functions->tcb_social_icons($k03,$s03); } ?>
  		&nbsp;&nbsp;
  		<?php if (isset($s04)) { $this->tcb_functions->tcb_social_icons($k04,$s04); } ?>
  		&nbsp;&nbsp;
  		<?php if (isset($s05)) { $this->tcb_functions->tcb_social_icons($k05,$s05); } ?>

  		  <div class="fhr"></div>		
  	     	<p title="UX Designer" class="txtsmall">
 
		<div class="row">

			<div class=" col-sm-12 text-left basetxt txtsmall graytxt1">


				<div class="lead">
				<?php echo $user->city; ?> , 
				<?php echo $user->country; ?> |
				

				<?php 
					if($user->showemail==1){
				echo $user->email." | "; 
							}
				?> 


				<strong>@</strong>  <?php echo $user->s01; ?> 
				</div>

				<div><?php echo $user->pitch; ?></div>
				<br/><br/>


						<?php		

							foreach($currentGroups as $object){				
								
								$name=($object->name);
								$desc=($object->description);

								$this->tcb_functions->tcb_skills_style($name,$desc);
						}
						?>
			</div> <!-- close column -->
		</div>	<!-- close row -->
		<div class="row">

			<div class=" col-sm-6 text-left basetxt txtsmall graytxt1">
					<h3 class="lead text-muted">About me</h3>
					<div><?php echo $user->about; ?></div>

					<h3 class="lead text-muted">Looking for </h3>
					<div><?php echo $user->iwant; ?></div>
					<br/><br/>


							<?php 
							 $pm01=$user->pm01;
							 $pm02=$user->pm02;
							 $pm03=$user->pm03;

							 $pay01=$user->pay01;
							 $pay02=$user->pay02;
							 $pay03=$user->pay03;

							?>

				<div class="well text-muted" style="background-color:#000;">

					<div class="lead">Details</div>

					

					<!-- Work: <i class="fa fa-check tcb-color"></i> Remote | 
					<i class="fa fa-check tcb-color"></i> On Site<br/> -->

					<!-- Languages: <i class="fa fa-language tcb-color"></i> ENG, SPA, FRA<br/> -->




				<?php  //WORK
						$work=$user->work;
							if(isset($work)){
								echo "Work:";
								if($work=='rm'){ $icon="fa-gear"; $message="Remote";}
								elseif($work=='os'){$icon="fa-gear"; $message="On-Site";} 
								elseif($work=='fl'){$icon="fa-gear"; $message="Flexible";} 
								else{$icon="fa-gear"; $message="Contact me";}
								echo " &nbsp;<i class='fa ".$icon." tcb-color'></i>  <span class='tcb-color'> ".$message."</span><br/>";
							}	
					?>

					<?php  //payment preferences
							 $pm01=$user->pm01;
							 $pm02=$user->pm02;
							 $pm03=$user->pm03;

							 $pay01=$user->pay01;
							 $pay02=$user->pay02;
							 $pay03=$user->pay03;

					if(isset($pm01) || isset($pm02) || isset($pm03)) echo "Payments preferences: <br/>";

					if (isset($pm01)) { $this->tcb_functions->tcb_payment_method($pm01,$pay01); } 
					if (isset($pm02)) { $this->tcb_functions->tcb_payment_method($pm02,$pay02); } 
					if (isset($pm03)) { $this->tcb_functions->tcb_payment_method($pm03,$pay03); } 
					?>

					<br/>


					<?php  //COFOUND
						$cofound=$user->cofound;
							if(isset($cofound) || $cofound!="no"){
								
								if($cofound=='ye'){ $message="yes";}
								elseif($cofound=='wc'){$message="Will consider";} 
								elseif($cofound=='me'){$message="As Mentor";}
								elseif($cofound=='cm'){$message="Contact Me";}
								else{$message="no";} 

								if($cofound=='no'){ //silence 
								}else{echo "Co-founding: ".$message."<br/>";} 
								
							}	
					?>

					<?php //RECRUITERS
						if($user->recru==1){ 
							echo "Recruiters: <i class='fa fa-check tcb-color'></i> Its ok to contact me. <br/>";
						}else{ echo "Recruiters: I rather not be contacted, thanks. <br/>";}
						?>

					<?php  //TSHIRT
						$gender=$user->gender;
						$tshirt=$user->tshirt;
							if(isset($tshirt)){
								echo "Tshirt Size:";
								if($gender=='m'){ $icon="fa-male";}elseif($gender=='f'){$icon="fa-female";} 
								echo " &nbsp;<i class='fa ".$icon." tcb-color'></i>  <span class='tcb-color'> ".$tshirt."</span><br/>";
							}	
					?>

					<?php  //BATTLETAG
						$battletag=$user->battletag;
							if(isset($battletag)){
								echo "Battletag: <i class='fa fa-rocket tcb-color'></i> ".$battletag."<br/>";	
							}	
					?>

				</div>
		  </div>

			<div class="col-sm-6 text-left basetxt txtsmall graytxt1">
					
					<br/><br/>

					<?php if (isset($s01)) {?>

					<a data-screen-name="<?php echo "$s01";?>" class="twitter-timeline" href="https://twitter.com/techstars" data-widget-id="496444200594849793">Tweets by @techstars</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


			
					<?php }?>

			</div>
		</div> <!-- CLOSE ROW -->
		<div class="row">
			<div class="col-sm-12 text-center">
				<hr/>



			</div>

		</div>



				





 
