
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
  	
  </div>
  <div class="col-xs-8 col-md-8 text-left">
          <?php 
          $first_name=$tcbuser->first_name;
          $last_name=$tcbuser->last_name;  
          ?>
  
  <!-- TCB -->
  		
  		<br/>
  		  		<span class="txttitle" title="UX Designer">Thanks <?php echo $first_name; ?> !</span>
		  		<p title="UX Designer" class="graytxt1">
		  		<span class="lead">you have endorsed a new member</span> 
          <br> 
          
          <br/><br/><br/>
           <img class="img-responsive" src="<?php echo base_url('assets/img/tcb/tcb_badge3.png'); ?>" alt="TCB Badge" width="300px"/>
           <br/><br/><br/>
		  		</p> 
          <div class="label label-default"> <?php echo "Invitations left: (".$first_name." ".$last_name." - No limit) "; ?></div>
		  		

          <div class="fhr"></div>

          <span class="lead"> Invite more?</span><br/>

          <?php $id=$tcbuser->id;	 
            echo "<a href='/auth/invite_user' class='btn btn-default'>Invite</a> &nbsp;";
            echo "<a href='/tcb/backstage/".$id."' class='btn btn-success'>Go back to home</a>";
          ?>


        

		  		
  		</div>	
		</div> <!-- close row -->

  </div>
   <div class="col-xs-1 col-md-1 text-center basetxt lead">
  </div>


</div>


 