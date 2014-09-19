
<div class="row">
  <div class="col-xs-12 ">
  <br/><br/><br/>
  </div>
</div>

<!-- r2 -->

<div class="row basetxt">
  <div class="col-xs-1 col-md-1 text-center basetxt">
  </div>
  <div class="col-xs-1 col-md-1 text-center basetxt">
    <img class="img-responsive" src="<?php echo base_url('assets/img/tcb/846766.gif')."?=".rand(1,100); ?>" alt="846766"/>
  </div>
  <div class="col-xs-8 col-md-8 text-left">

      <div style="float:right;">
      <img class="img-responsive" style="width:300px;" src="<?php echo base_url('assets/img/tcb/tcb-key.png'); ?>" alt="846766"/>
      </div>

      <h1 class="lead" style="font-size:3em;">Welcome to TCB</h1>
      <h4 class="lead text-white" style="font-size:2em;">First of all your password:</h4>
      
      <br/>

      <div class="row">
        <div class="col-xs-6">
          <a href="/auth/login" class="btn btn-success" style="width:500px;"><h4 class="text-white">I have a password</h4>
          <p class="text-white">Please log-in here</p>
          </a>
        </div>
        <div class="col-xs-6">
          &nbsp;
        </div>
      </div>
      
      <div class="row">  
        <div class="col-xs-6">
          <a href="/auth/forgot_password" class="btn btn-warning" style="width:500px;"><h4 class="text-white">I don't have a password yet</h4>
          <p class="text-white"> No problem let's get you a password</p>
          <p class="text-white"> <small>(Previous TCB invitation required)</small></p>
          </a>
        </div>
        <div class="col-xs-6">
          &nbsp;
        </div>
      </div>  

<br/><br/><br/><br/>

    <div class="text-gray"><small>
      (If you haven't received any invitation please contact a TCB member.)
      </small>
    </div>
 
    

		<br/>
		<div id="infoMessage" class="inmessage"><?php echo $message;?></div>

		
	</div>
</div>	