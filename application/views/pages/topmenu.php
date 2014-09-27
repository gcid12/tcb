<div class="row">
  <div class="col-xs-12 ">


	


			<?php if($logged==true){ ?>

				<span class="nametag"> 
						<?php  //name label
						$first_name=$tcbuser->first_name; 
						$gender=$tcbuser->gender;
						?>

						<?php 
						$this->tcb_functions->label_user($gender,$first_name); 
						?>
				</span>		
				<a href="/auth/logout" rel="tooltip" class="menulink wtt menu1" style="float:right;" title="SIGN OUT"><i class="fa fa-sign-out fa-2x"></i></a>
				<a href="/tcb/backstage/<?php echo $tcbuser->id;?>" rel="tooltip" class="menulink wtt menu1" style="float:right;" title="BACKSTAGE"><i class="fa fa-plus fa-2x"></i></a> 


				
				
			<?php }else{ ?>	

				Logged OUT
				<a href="/auth/login" rel="tooltip" class="menulink wtt menu1" style="float:right;" title="SIGN IN"><i class="fa fa-sign-in fa-2x"></i></a>
						
		  			
				<?php } ?>

				<a href="http://tcb-io.tumblr.com/" rel="tooltip" class="menulink wtt menu1" style="float:right;" title="BLOG"><i class="fa fa-pencil fa-2x"></i></a>
				<a href="/about" rel="tooltip" class="menulink wtt menu1" style="float:right;" title="ABOUT TCB"><i class="fa fa-bolt fa-2x"></i></a>
				<!-- <a href="/about" rel="tooltip" class="menulink wtt menu1" style="float:right;" title="ABOUT"><i class="fa fa-flag fa-2x"></i></a> -->
				<a href="/home" rel="tooltip" class="menulink wtt menu1" style="float:right;" title="HOME"><i class="fa fa-home fa-2x"></i></a>

		
	</div>
</div>	