<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo $movies[0]->getMovie()->getBackground();?>" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
    <h5><?php echo $movies[0]->getMovie()->getTitle();?></h5>
    <p><?php echo $movies[0]->getMovie()->getOverview();?></p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo $movies[1]->getMovie()->getBackground();?>" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
    <h5><?php echo $movies[1]->getMovie()->getTitle();?></h5>
    <p><?php echo $movies[1]->getMovie()->getOverview();?></p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo $movies[2]->getMovie()->getBackground();?>" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
    <h5><?php echo $movies[2]->getMovie()->getTitle();?></h5>
    <p><?php echo $movies[2]->getMovie()->getOverview();?></p>
  </div>
    </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>