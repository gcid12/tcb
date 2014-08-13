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

    <!-- open sort -->

      <div class="controls">
        <label>Filter:</label>
        
        <button class="filter" data-filter="all">All</button>
        <button class="filter" data-filter=".dev">Programming</button>
        <button class="filter" data-filter=".dat">Data</button>
        <button class="filter" data-filter=".des">Design</button>
        <button class="filter" data-filter=".pro">Product</button>
        <button class="filter" data-filter=".fin">Finance</button>
        
        <label>Sort:</label>
        
        <button class="sort" data-sort="myorder:asc">Asc</button>
        <button class="sort" data-sort="myorder:desc">Desc</button>
      </div>
      <div id="Container" class="container">
    
       <?php                        
            foreach($query as $object){       

              $id=($object->id);
              $first_name=($object->first_name);
              $last_name=($object->last_name);
              $pitch=($object->pitch);
              $city=($object->city);
              $country=($object->country);
              $main=($object->main);
              
             
          echo "<a href='/tcb/member/".$id."' rel='tooltip' class='redlink wtt' title='".$pitch."'>";
          echo "<div class='redlink wtt mix ".$main."' data-myorder='".$first_name." ".$last_name."'> </div>"; 
          echo "</a>";


          }
        ?>

        <div class="gap"></div>
        <div class="gap"></div>
      </div>

      <!-- close sort -->
        
    <br/><br/><br/><br/><br/>   
    </div>  
  </div>
</div>





