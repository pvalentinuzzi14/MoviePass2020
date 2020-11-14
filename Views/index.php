<div class="container-fluid">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
  <?php for ($i=0; $i < count($movies) ; $i++){?>
    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i;?>" class="<?php if($i==0){echo "active";}?>"></li>
  <?php }?>
  </ol>
  <div class="carousel-inner">
    <?php for ($i=0; $i <count($movies) ; $i++) {?>
      <div class="carousel-item <?php if($i==0){echo "active";}?>">
        <img class="d-block w-100" src="<?php echo $movies[$i]->getMovie()->getBackground();?>" alt="<?php echo $movies[$i]->getMovie()->getTitle();?>">
        <div class="carousel-caption d-none d-md-block">
      <h5><?php echo $movies[$i]->getMovie()->getTitle();?></h5>
      <p><?php echo $movies[$i]->getMovie()->getOverview();?></p>
      <a class="btn btn-dark text-light" href="<?php echo $movies[$i]->getMovie()->getTrailer();?>">Ver Trailer</a>
      <a class="btn btn-dark text-light" href="<?php echo FRONT_ROOT.'/Purchase/selectFunction?id='.$movies[$i]->getMovie()->getIdBd();?>">Comprar Ticket</a></div>
      </div>
    <?php }?>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>