      <?php								     		
			foreach($query as $object){				
				
				
				$id=($object->id);
				$first=($object->first);
				$last=($object->last);
				$slug=($object->slug);
				$line=($object->line);
				$desc=($object->desr);
				$inte=($object->inte);
				$cont=($object->cont);
				$s01=($object->s_01);
				$k01=($object->k_01);
				$s02=($object->s_02);
				$k02=($object->k_02);
				$s03=($object->s_03);
				$k03=($object->k_03);
				$s04=($object->s_04);
				$k04=($object->k_04);
				
	
			}
	?>
		

<div class="row">
  <div class="col-xs-12 ">
  
  <br/><br/>
  </div>
    

</div>

<!-- r2 -->

<div class="row basetxt">

  <div class="col-sm-1 col-md-1 text-center basetxt">
  
  </div>
  
  <div class="col-sm-1 col-md-1 text-center basetxt">
  
  	<a href="/"><img class="img-responsive" src="<?php echo base_url('assets/img/tcb/846766.gif')."?=".rand(1,100); ?>" alt="846766"/></a>
  </div>
  <div class="col-sm-9 col-md-9 text-left">
  
  
  	<div style="padding:0 20px;">
  		<span class="txttitle" title="UX Designer" style="color:#999;"><?php echo "$first $last";?></span><br/>
		
  	
  		<br/>
  		<!--
<a href="http://tcb.io" class="redlink"><i class="fa fa-envelope-square"></i></a>
  		<a href="http://tcb.io" class="redlink"><i class="fa fa-twitter"></i></a>
  		<a href="http://tcb.io" class="redlink"><i class="fa fa-github "></i></a>
  		<a href="http://tcb.io" class="redlink"><i class="fa fa-linkedin"></i></a>
-->
  		
  		<?php if (isset($s03)) { echo " <a href='http://$s03' class='redlink'><i class='fa fa-user fa-2x'></i></a> "; } ?>
  		&nbsp;&nbsp;
  		
  		<?php if (isset($s01)) { echo " <a href='http://twitter.com/$s01' class='redlink'><i class='fa fa-twitter fa-2x'></i></a> "; } ?>
  		&nbsp;&nbsp;
  		<?php if (isset($s02)) { echo " <a href='http://$s02' class='redlink'><i class='fa fa-linkedin fa-2x'></i></a> "; } ?>
  		&nbsp;&nbsp;
  		<?php if (isset($s04)) { echo " <a href='http://$s04' class='redlink'><i class='fa fa-github fa-2x'></i></a> "; } ?>

		<br/>					

						
  		
  		
  		<!--
<i class="fa fa-envelope-square"></i>
  		<i class="fa fa-twitter"></i>
  		<i class="fa fa-github "></i>
  		<i class="fa fa-linkedin"></i>
-->
  		
  		
  		<br/>
  		  		<span class="txttitlex" title="UX Designer" style="font-size:1em;"><?php echo "$line";?></span>
  	
  	</div>	
  	
  					<!--
<div style="float:right;">	
  						<a href="" class="redlink">
							<div class="contactme" style="float:right;"> Contact Me</div>
						</a>
					</div>	
-->
							  		
  		  <div class="fhr"></div>		
  		  		
  	
  		
  		
  		
  		





					<div class="row">
						<div class="col-sm-7 col-md-7 text-left ">
						
							<br/>
							<p title="UX Designer" class="txtsmall" style="padding:0 20px;"><?php echo "$desc";?></p> 
							
							
							
							
							<?php if (isset($inte)) {?>
							
							 <?php echo "$inte";?>

							

							<?php }?>
							
							<?php if (isset($s01)) {?>

<a data-screen-name="<?php echo "$s01";?>" class="twitter-timeline" href="https://twitter.com/<?php echo "$s01";?>" data-widget-id="472368192304586752"><?php echo "$s01";?></a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


<?php }?>
							
							
							
							
							<br/><br/>
							
							
						
</div>
						<div class="col-sm-1 col-md-1 text-left txtsmall basetxt">
						</div>
						<div class="col-sm-4 col-md-4 text-left txtsmall basetxt">
							<small>
							
							<?php								     		
					foreach($query2 as $object){				
						
						
						$first=($object->first);
						$last=($object->last);
						$slug=($object->slug);
						$line=($object->line);
						
				echo "<a href='/profile/$slug' rel='tooltip' class='redlink wtt' title='$line'>$first $last</a> + ";
				
				}
				?>
								



							</small>
						</div>
						
					</div>

 

  	
  </div>
  <div class="col-sm-1 col-md-1 text-left">
  </div>



</div>


