<div class="row">
  <div class="col-xs-12 ">

	<span class="redlink wtt" title="ABOUT">
		<div class="contactme" style="float:right; height:30px;"></div>
	</span>
	
	

	<!-- <a href="/news" rel="tooltip" class="menulink wtt menu1" style="float:right;" title="NEWS"><i class="fa fa-bullhorn fa-2x"></i></a> -->
	

<?php if($logged==false){?>
			<a href="/auth/login" rel="tooltip" class="menulink wtt menu1" style="float:right;" title="SIGN IN"><i class="fa fa-sign-in fa-2x"></i></a>
<?php }else{?>			

<a href="/auth/logout" rel="tooltip" class="menulink wtt menu1" style="float:right;" title="SIGN OUT"><i class="fa fa-sign-out fa-2x"></i></a>

<span class="nametag">Welcome back <?php echo $tcbuser->first_name;?></span>
		  			
<?php }?>

	
			<!-- <a href="/join" rel="tooltip" class="menulink wtt menu1" style="float:right;" title="JOIN"><i class="fa fa-plus fa-2x"></i></a> -->
			
			<a href="/story" rel="tooltip" class="menulink wtt menu1" style="float:right;" title="TCB"><i class="fa fa-bolt fa-2x"></i></a>
			
			
		<a href="/about" rel="tooltip" class="menulink wtt menu1" style="float:right;" title="ABOUT"><i class="fa fa-flag fa-2x"></i></a>
	
	
		<a href="/home" rel="tooltip" class="menulink wtt menu1" style="float:right;" title="HOME"><i class="fa fa-home fa-2x"></i></a>
		
		
		
		

		
	
	</div>
</div>	