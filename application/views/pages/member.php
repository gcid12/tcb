
<div class="row">
  <div class="col-xs-12 ">
  <br/><br/><br/>
  </div>
</div>

<!-- r2 -->

<div class="row basetxt">
  <div class="col-xs-1 col-md-1 text-center basetxt">
  </div>
  <div class="col-xs-2 col-md-2 text-center basetxt">
  	<img class="img-responsive" src="<?php echo base_url('assets/img/tcb/846766.gif')."?=".rand(1,100); ?>" alt="846766"/>
  </div>
  <div class="col-xs-7 col-md-7 text-left">
  <h1 class="lead" style="font-size:3em;"><?php echo $tcbuser->first_name." ".$tcbuser->last_name; ?></h1>
  		

  		<?php
  		$k01=$tcbuser->k01;
  		$k02=$tcbuser->k02;
  		$k03=$tcbuser->k03;
  		$k04=$tcbuser->k04;
  		$k05=$tcbuser->k05;

  		$s01=$tcbuser->s01;
  		$s02=$tcbuser->s02;
  		$s03=$tcbuser->s03;
  		$s04=$tcbuser->s04;
  		$s05=$tcbuser->s05;

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
				<?php echo $tcbuser->city; ?> , 
				<?php echo $tcbuser->country; ?> |
				
				<?php echo $tcbuser->email; ?> | 
				<strong>@</strong>  <?php echo $tcbuser->s01; ?> 
				</div>

				<div><?php echo $tcbuser->pitch; ?></div>
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
					<div><?php echo $tcbuser->about; ?></div>

					<h3 class="lead text-muted">Looking for </h3>
					<div><?php echo $tcbuser->iwant; ?></div>

		  </div>

			<div class="col-sm-6 text-left basetxt txtsmall graytxt1">
					
					<br/><br/>

					<?php if (isset($s01)) {?>
						<a data-screen-name="<?php echo "$s01";?>" class="twitter-timeline" href="https://twitter.com/<?php echo "$s01";?>" data-widget-id="472368192304586752"><?php echo "$s01";?></a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					<?php }?>

			</div>
		</div> <!-- CLOSE ROW -->
		<div class="row">

			<div class=" col-sm-6 text-left basetxt txtsmall graytxt1">
					<h3 class="lead text-muted">About me</h3>
					<div><?php echo $tcbuser->about; ?></div>

		  </div>

			<div class="col-sm-6 text-left basetxt txtsmall graytxt1">
					
					

			</div>
		</div> <!-- CLOSE ROW -->


				





 
