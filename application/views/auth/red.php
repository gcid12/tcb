
<?php if($logged==true){

	 $tcbid=$tcbuser->id;
	 header("Location: /auth/edit_user/$tcbid");
	 die();

	
			
 }else{
	 header("Location: /auth/logout");
	 die();	
		  			
 } ?>