<main class="">
 <div class="form text-center"> 
   <form action="<?php $_SERVER['PHP_SELF']?>" method="get">
    <label class="text-light" for="genre_movie">Tipo Pelicula: </label>
    <select class="form-control-sm" name="genre">
    <option value="-1"></option>
    <?php 
      foreach($genres as $genresValues):?>
        <option value="<?php echo $genresValues->getId();?>"><?php echo $genresValues->getName();?></option>
         <?php  endforeach;?></select>
         <button type="submit" class="btn btn-success">Buscar</button>
         </form>
  </div>

  <div class="album py-5">
      <div class="container">
        <div class="row">
        <?php foreach($movies as $values):?>
          <?php if(isset($_GET['genre'])&& ($_GET['genre']!=(-1))){
            foreach($values->getGenre_ids() as $moviesGenres):
            if($_GET['genre']==$moviesGenres){?>
            <div class="col-md-4" >
            <div class="card mb-4 box-shadow bg-dark">
              <h5 class="text-light text-center"><?php echo $values->getTitle();?></h5>
              <a type="button" data-toggle="modal" data-target="#modal-id<?php echo $values->getId();?>">
              <img src="<?php echo $values->getImage();?>" alt="img" style="cursor:pointer;" class="card-img-top">
              </a>
            </div>
          </div>
            <?php }endforeach;}else{ ?>
              <div class="col-md-4" >
            <div class="card mb-4 box-shadow bg-dark">
              <h5 class="text-light text-center"><?php echo $values->getTitle();?></h5>
              <a type="button" data-toggle="modal" data-target="#modal-id<?php echo $values->getId();?>">
              <img src="<?php echo $values->getImage();?>" alt="img" style="cursor:pointer;" class="card-img-top">
              </a>
            </div>
          </div>
        <?php }endforeach; ?>
        </div>
      </div>
    </div>
    
      <!-- Modal -->
      <?php foreach($movies as $values):?>
        <div class="modal fade" id="modal-id<?php echo $values->getId();?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h3 class="modal-title"><?php echo $values->getTitle();?></h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <h5>Resumen:</h5>
            <p class="text-justify"><?php echo $values->getOverview();?></p>
            <hr><br>
            <p>Fecha Estreno: <?php echo $values->getRelease_date();?></p>
            <br>
            <p> Genero: 
            <?php foreach($values->getGenre_ids() as $genresId):?>
              <?php foreach($genres as $valuesGenres):
                if($genresId == $valuesGenres->getId()){
                  echo $valuesGenres->getName()." ";
                }
              endforeach;?>
            <?php endforeach;?>
            </p>
            </ul>
            </div>
            <div class="modal-footer">
              <a type="button" class="btn-lg btn-secondary" href="#">Ver Trailer</a>
            </div>
          </div>
          </div>
        </div>
      <?php endforeach;?>
</main>