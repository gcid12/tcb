
<div class="row">
  <div class="col-xs-12 ">
  	<center>
  	vader123
	<br/><br/><br/>
	<img src="<?php echo base_url('assets/img/tcb/846766.gif') ?>" alt="tcb" />
	<br/><br/><br/>
	TCB890
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
				
				
				$first=($object->first);
				$last=($object->last);
				$slug=($object->slug);
				$line=($object->line);
				
		echo "<a href='/profile/$slug' rel='tooltip' class='redlink wtt' title='$line'>$first $last</a> + ";
		
		}
		?>
				
		<br/><br/><br/><br/><br/>		

  	</div>	

 
  	
  </div>

  

  


</div>



