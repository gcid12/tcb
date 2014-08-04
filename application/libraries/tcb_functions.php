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


}
