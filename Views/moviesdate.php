<main class="">
 <div class="nav navbar justify-content-center"> 
   <form class="form ml-5" action="<?php echo FRONT_ROOT."/Movie/GetAll";?>" method="get">
      <label class="text-light mr-3" for="genre_movie">Genero: </label>
      <select class="form-control-sm" name="genre">
      <option value="-1"></option>
      <?php 
        foreach($genres as $genresValues):?>
          <option value="<?php echo $genresValues->getId();?>"><?php echo $genresValues->getName();?></option>
          <?php  endforeach;?></select>
          <button type="submit" class="btn btn-success ml-3"> Buscar </button>
    </form>

    <form class="form ml-5" action="<?php echo FRONT_ROOT."/Movie/GetAllbyDate";?>" method="get">
      <label class="text-light mr-3" for="date">Fecha </label>
      <select class="form-control-sm" name="date">
      <option value="-1"></option>
      <?php 
        foreach($dates as $dateValues):?>
          <option value="<?php echo $dateValues;?>"><?php echo $dateValues;?></option>
          <?php  endforeach;?></select>
          <button type="submit" class="btn btn-success ml-3"> Buscar </button>
    </form>
    
  </div>
  

  <div class="album py-5">
      <div class="container">
        <div class="row">
        <?php 
          foreach($movies as $values):
        ?>
                  <?php  
                  if(isset($_GET['date'])&&($_GET['date']!=(-1))){
                    if($_GET['date']==$values->getDate()){
                  ?>
                      <div class="col-md-4" >
                        <div class="card mb-4 box-shadow bg-dark">
                          <h5 class="text-light text-center"><?php echo $values->getMovie()->getTitle();?></h5>
                          <a type="button" data-toggle="modal" data-target="#modal-id<?php echo $values->getMovie()->getId();?>">
                          <img src="<?php echo $values->getMovie()->getImage();?>" alt="img" style="cursor:pointer;" class="card-img-top">
                          </a>
                        </div>
                    </div>
          <?php     }}
              endforeach;
        ?>
        </div>
      </div>
  </div>
    
      <!-- Modal -->
      <?php foreach($movies as $values):?>
          <div class="modal fade" id="modal-id<?php echo $values->getMovie()->getId();?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h3 class="modal-title"><?php echo $values->getMovie()->getTitle();?></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <h5>Resumen:</h5>
              <p class="text-justify"><?php echo $values->getMovie()->getOverview();?></p>
              <hr><br>
              <p>Fecha Estreno: <?php echo $values->getMovie()->getRelease_date();?></p>
              <br>
              <p> Genero: 
              <?php foreach($values->getMovie()->getGenre_ids() as $genresId):?>
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