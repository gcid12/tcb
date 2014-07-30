
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
  	<img class="img-responsive" src="<?php echo base_url('assets/img/tcb/846766.gif') ?>?" alt="846766"/>
  </div>
  <div class="col-xs-7 col-md-7 text-left">
  		<span class="txttitle" title="UX Designer">MY ZONE</span>
      <br/>
  		<br/>
		
  		  <div class="fhr"></div>		
  	     	<p title="UX Designer" class="txtsmall">
 
		<div class="row">

			<div class=" col-sm-12 text-left basetxt txtsmall graytxt1">

			<!-- ACCORDION -->
		    <div class="panel-group" id="accordion">
				  <div class="panel panel-default">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
				          PROFILE
				        </a>
				      </h4>
				    </div>
				    <div id="collapseOne" class="panel-collapse collapse in">
				      <div class="panel-body">
				      	<a class="btn btn-primary pull-right" <?php echo "href='/auth/edit_user/".$tcbuser->id."'"; ?> > Edit</a>
				        
								<div class="nametag">Name: <?php echo $tcbuser->first_name." ".$tcbuser->last_name; ?></div>
								<div class="nametag">Mail: <?php echo $tcbuser->email; ?></div>
								<div class="nametag">Twitter: <?php echo $tcbuser->tw; ?></div>
				        
				        <?php //print_r($tcbuser); ?>
				      </div>
				    </div>
				  </div>
				  <div class="panel panel-default">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
				          INVITE
				        </a>
				      </h4>
				    </div>
				    <div id="collapseTwo" class="panel-collapse collapse in">
				      <div class="panel-body">

				      		<a class="btn btn-default" href="/auth/invite_user">Invite to TCB</a>

				      </div>
				    </div>
				  </div>
				  <div class="panel panel-default">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
				          TRANSACTIONS
				        </a>
				      </h4>
				    </div>
				    <div id="collapseThree" class="panel-collapse collapse">
				      <div class="panel-body">

				      	You don't have any transaction yet

				      </div>
				    </div>
				  </div>
				  <div class="panel panel-default">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
				          STICKERS
				        </a>
				      </h4>
				    </div>
				    <div id="collapseFour" class="panel-collapse collapse">
				      <div class="panel-body">


								<span style="font-size:0.8em; color:#666;">[ Stickers available  
								<a href="http://retinal.co/collections/frontpage/products/tcb-sticker" target="_blank" class="redlink wtt">here</a> ]</span>

				      		<div class="row">
										
										<div class="col-sm-4">
				        		<img src="<?php echo base_url('assets/img/tcb/tcb-sticker.png') ?>" class="img-responsive" style=" margin:10px;"/>		
				        		</div>
				        		<div class="col-sm-3">
				        		
				        		</div>
				        		<div class="col-sm-5">
				        		<img src="<?php echo base_url('assets/img/tcb/tcb-sticker2.png') ?>" class="img-responsive" style=" margin:10px;"/>
				        		</div>		
				     			</div> <!-- close tinyrow -->

				      </div>
				    </div>
				  </div>
				</div> <!--  CLOSE ACCORDION -->

		    <br/><br/>
		    </p> 
		  </div>

			<div class="col-xs-1 col-md-1 text-center basetxt lead">
			</div>
		</div> <!-- CLOSE ROW -->


				





 
