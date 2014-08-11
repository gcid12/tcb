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











<div class="controls">
  <label>Filter:</label>
  
  <button class="filter" data-filter="all">All</button>
  <button class="filter" data-filter=".category-1">Category 1</button>
  <button class="filter" data-filter=".category-2">Category 2</button>
  
  <label>Sort:</label>
  
  <button class="sort" data-sort="myorder:asc">Asc</button>
  <button class="sort" data-sort="myorder:desc">Desc</button>
</div>
<div id="Container" class="container">
  <div class="mix category-1" data-myorder="1">123</div>abc
  <div class="mix category-1" data-myorder="2">456</div>def
  <div class="mix category-1" data-myorder="3"></div>
  <div class="mix category-2" data-myorder="4"></div>
  <div class="mix category-1" data-myorder="5"></div>
  <div class="mix category-1" data-myorder="6"></div>
  <div class="mix category-2" data-myorder="7"></div>
  <div class="mix category-2" data-myorder="8"></div>
  
  <div class="gap"></div>
  <div class="gap"></div>
</div>





