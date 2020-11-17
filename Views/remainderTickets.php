<div class="container bg-light m-auto p-3 rounded" style="opacity: 0.8;" >
<div class="row my-4 text-center">
  <div class="col">
    <h1 class="page-header">
    <img src="<?php       
        echo $show->getMovie()->getImage(); ?>" width="200px" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
    </h1>
    </div>
    <div class="col my-5">
        <h3>VENDIDAS</h3>
        <h5><?php echo $show->getTicketsSold(); ?></h5>
        
   </div>
    <div class="col my-5">
    <h3>REMANENTES</h3>
    <h5><?php echo $show->getTotalTickets() -$show->getTicketsSold() ; ?></h5>   
    </div>
    <div class="col my-5">
    <h3>GANANCIAS</h3>
    <h5><?php echo "$ ".$show->getTicketsSold() * $show->getTicketPrice() ; ?></h5>   
    </div>

  </div>
</div>
