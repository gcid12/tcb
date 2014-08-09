<style type="text/css">
	body{
    background-image: url('<?php echo base_url('assets/img/tcb/tcb-backstage.jpg'); ?>');
    background-repeat: no-repeat;
	} 
</style>


<div class="row">
  <div class="col-xs-12 ">
  <br/><br/><br/>
  </div>
</div>

<!-- r2 -->

<div class="row basetxt">
  <div class=" col-sm-1 col-md-1 text-center basetxt">
  </div>
  <div class="col-xs-1 col-sm-1 col-md-1 text-center basetxt">
  	
  </div>
  <div class="col-xs-9 col-sm-9 col-md-8 text-left">


  <!-- <div class="col-xs-1 col-sm-1 col-md-2"> -->  <!-- ERASE -->


  		<div class="pull-right">
  			<img class="img-responsive" src="<?php echo base_url('assets/img/tcb/846766.gif')."?=".rand(1,100); ?>" width="50"/>
  		</div>
  		<span class="txttitle" title="UX Designer">Backstage</span>
  		
      <br/>
  		<br/>
		
  		  <div class="fhr"></div>		
  	     	<p title="UX Designer" class="txtsmall">
 
		<div class="row">

			<div class=" col-sm-12 text-left basetxt txtsmall graytxt1">

			<a class="btn btn-success pull-right" <?php echo "href='/auth/edit_user/".$tcbuser->id."'"; ?> > 
			<i class="fa fa-gear fa-3x"></i><br/>Edit My Info</a>

			<h1 class="lead" style="font-size:3em;"><?php echo $tcbuser->first_name." ".$tcbuser->last_name; ?></h1>
			

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
				$des=($object->description);

				switch($des){
					case "dev": $icon="gear"; $bg="bg-dev";
						break;
					case "dat": $icon="database"; $bg="bg-dat";
						break;
					case "des": $icon="pencil"; $bg="bg-des";
						break;
					case "pro": $icon="cube"; $bg="bg-pro";
						break;
					case "fin": $icon="money"; $bg="bg-fin";
						break;
					default: $icon=""; $bg="";
								

				}
				
				
		echo "<div class='label label-default ".$bg." pull-left' style='padding:5px; margin:2px;'>
		<i class='fa fa-".$icon."'></i>".$name."</div>";
		
		}
		?>

			
			

			
			</div>
		</div>	
		<div class="row">

			<div class=" col-sm-12 text-left basetxt txtsmall graytxt1">

			<br/>
			<!-- ACCORDION -->
		    <div class="panel-group" id="accordion">
				  
				  <div class="panel panel-default">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
				          Invite
				        </a>
				      </h4>
				    </div>
				    <div id="collapseTwo" class="panel-collapse collapse in">
				      <div class="panel-body">
				      		<div class="col-sm-5">
				      			<img class="img-responsive" src="<?php echo base_url('assets/img/tcb/tcb_badge.png'); ?>" alt="846766"/>

				      		</div>
				      		<div class="col-sm-7">

				      			<span class="blacktxt txtsmaller">
				      			TCB846766 it's a network of Tech Talent looking for projects to increase their experience
				      			, get exposure to new projects, meet new people and why not make an extra money. If you know
				      			someone interested in joining TCB please invite her/him here:
				      			</span>

				      			
			


				      			
				      			<br/>

				      			<a class="btn btn-success pull-right" href="/auth/invite_user">Invite</a>

				      		</div>



				      </div>
				    </div>
				  </div>

				  <div class="panel panel-default">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">


				          TCB Gifts
				        </a>
				      </h4>
				    </div>
				    <div id="collapseFour" class="panel-collapse collapse in">
				      <div class="panel-body">
				      	<div class="row">
				      		<div class="col-sm-4">
				      			<img class="img-responsive" src="<?php echo base_url('assets/img/tcb/tcb_stickerpack.png'); ?>" alt="846766"/>

				      		</div>
				      		<div class="col-sm-8">
				      			<span class="blacktxt txtsmaller">
				      			Free goodies for TCB846766 Members. Redeem yours at www.retinal.co
				      			</span>

				      			<hr/>
				      			<a class="btn btn-default btn-sm"><h5>Sticker Pack</h5>  #TCB94884 </a>
				      			
				      			
				      			<br/><br/>


				      			<a class="btn btn-success" href="http://retinal.co/collections/frontpage/products/tcb-sticker">Redeem gifts</a>

				      		</div>
				      		
				      	</div>
				      </div>
				    </div>
				  </div>  

				  <div class="panel panel-default">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">

				        		TCB Blog
				         
				        </a>
				      </h4>
				    </div>
				    <div id="collapseFive" class="panel-collapse collapse">
				      <div class="panel-body">
				      	<div class="row">
				      		
				      		<div class="col-sm-12 text-center">
				      			<span class="blacktxt txtsmaller">
				      			Send your article or collaboration to:
				      			</span>

				      			<br/>
					      				<h2>hello@tcb.io</h2>

				      			<br/>

				      		</div>
				      		
				      	</div>
				      </div>
				    </div>
				  </div>
				  <div class="panel panel-default">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">

				        		TCB Wall
				        </a>
				      </h4>
				    </div>
				    <div id="collapseSix" class="panel-collapse collapse">
				      <div class="panel-body">
				      	<div class="row">
				      		
				      		<div class="col-sm-12 text-center">
				      			
				      			<div class="lead blacktxt"> What happens in las Vegas stays in las Vegas!! </div>
				      			
				      			<div class="blacktxt txtsmaller">
				      				Go to TCB Private discussion wall: 
				      			</div>	
				      			
					      				<a href="http://www.reddit.com/r/TCB846766/"><h2>http://www.reddit.com/r/TCB846766/</h2></a>

					      				<br/><br/>
				      			<div class="text-muted text-smaller pull-right"> (Send your reddit username to hello@tcb.io to add you.) </div>

				      		</div>
				      		
				      	</div>
				      </div>
				    </div>
				  </div>




				</div> <!--  CLOSE ACCORDION -->

		    <br/><br/>
		    </p> 
		  </div>

	<div class="col-sm-1 col-md-2">
	</div>
</div> <!-- CLOSE ROW -->


				





 
