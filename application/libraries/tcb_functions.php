<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  TCB Functions
*
* Version: 0.1
*
* Author: Gerardo Cid
*		  gcid@tcb.io
*
*
*/

class Tcb_functions
{
	
	public function tcb_skills_style($name,$desc){

	switch($desc){
		case "dev": $icon="code"; $bg="bg-dev";
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
						<i class='fa fa-".$icon."'></i> &nbsp;".$name."</div>";
	}



	public function tcb_social_icons($name,$link){

		switch($name){
			case "tw": $icon="fa-twitter";
		break;
			case "gh": $icon="fa-github";
	 	break;
	 		case "so": $icon="fa-stack-overflow";
		break;
			case "an": $icon="fa-circle-o";
		break;
			case "dr": $icon="fa-dribbble";
		break;
			case "bh": $icon="fa-behance";
		break;
			case "fb": $icon="fa-facebook-square";
		break;
			case "in": $icon="fa-linkedin";
		break;
			case "hn": $icon="fa-hacker-news";
		break;
		

		default: $icon="fa-gear";
			}
			
		echo "<a href='http://".$link."' class='redlink'><i class='fa ".$icon." fa-2x'></i></a>";


	}

	public function tcb_payment_method($pm,$details){

		switch($pm){
			case "ch": $icon="fa-envelope"; $label="Check";
		break;
			case "tr": $icon="fa-arrow-right"; $label="Transfer";
	 	break;
	 		case "pb": $icon="fa-heart"; $label="Pro Bono";
		break;
		

		default: $icon="fa-book";
			}
			
		echo "<span class='label tcb-color' style='margin:2px;'><i class='fa $icon'></i> &nbsp;".$label."</span>";


	}


}



