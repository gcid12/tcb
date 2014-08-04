
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


  		<?php if (isset($s01)) { echo " <a href='http://$s03' class='redlink'><i class='fa fa-user fa-2x'></i></a> "; } ?>
  		&nbsp;&nbsp;
  		
  		<?php if (isset($s02)) { echo " <a href='http://twitter.com/$s01' class='redlink'><i class='fa fa-twitter fa-2x'></i></a> "; } ?>
  		&nbsp;&nbsp;
  		<?php if (isset($s03)) { echo " <a href='http://$s02' class='redlink'><i class='fa fa-linkedin fa-2x'></i></a> "; } ?>
  		&nbsp;&nbsp;
  		<?php if (isset($s04)) { echo " <a href='http://$s04' class='redlink'><i class='fa fa-github fa-2x'></i></a> "; } ?>


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

		  </div>

			<div class="col-sm-6 text-left basetxt txtsmall graytxt1">
					
					<h3 class="lead text-muted">I want </h3>
					<div><?php echo $tcbuser->iwant; ?></div>

			</div>
		</div> <!-- CLOSE ROW -->


				





 
