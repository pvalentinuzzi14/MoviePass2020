<div class="container bg-light m-auto p-3" style="opacity: 0.8;" >
<div class="row">
  <div class="col-md-10">
    <h1 class="page-header">
        Entradas de  <?php echo $show->getMovie()->getTitle(); ?>
    </h1>
  </div>
</div>
<div class="row mb-4">
    <div class="col">
        <h3>VENDIDAS</h3>
        <h5><?php echo $show->getTicketsSold(); ?></h5>
        
   </div>
    <div class="col">
    <h3>REMANENTES</h3>
    <h5><?php echo $show->getTotalTickets() -$show->getTicketsSold() ; ?></h5>   
    </div>
    <div class="col">
    <h3>GANANCIAS</h3>
    <h5><?php echo "$ ".$show->getTicketsSold() * $show->getTicketPrice() ; ?></h5>   
    </div>
</div>