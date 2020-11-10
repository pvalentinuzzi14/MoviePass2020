<?php require_once(VIEWS_PATH."header.php"); ?>
<div>
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
    </div>
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
<footer>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        </body>
</html>