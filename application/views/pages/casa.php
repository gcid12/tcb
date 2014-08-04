
<div class="row">
  <div class="col-xs-12 ">
  	<center>

	<br/><br/><br/>
	<img src="<?php echo base_url('assets/img/tcb/846766.gif')."?=".rand(1,100); ?>" alt="tcb" />
	<br/><br/><br/>
	
	</center>
  </div>
    
  <div class="col-xs-1">
  </div>
  <div class="col-xs-10 redtxt">

	
  </div>
  <div class="col-xs-1">
  </div>

</div>

<!-- r2 -->



<div class="row">

  <div class="col-xs-1 col-md-1 text-center redtxt lead"></div>
  <div class="col-xs-10 col-md-10 text-center redtxt ">
  
  	<div class="txtsmall basetxt">
  	
  	
  	   <?php								     		
			foreach($query as $object){				

				$id=($object->id);
				$first_name=($object->first_name);
				$last_name=($object->last_name);
				$pitch=($object->pitch);
				$city=($object->city);
				$country=($object->country);
				
				
		echo "<a href='/tcb/member/".$id."' rel='tooltip' class='redlink wtt' title='".$pitch."'>".$first_name." ".$last_name."</a> + ";
		
		}
		?>
				
		<br/><br/><br/><br/><br/>		

  	</div>	

 
  	
  </div>

  

  


</div>



