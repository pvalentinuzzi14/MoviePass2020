<main class="">
 <div class="nav navbar justify-content-center"> 
   <form class="form ml-5" action="<?php echo FRONT_ROOT."/Movie";?>" method="get">
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
            <div class="modal-content bg-dark text-light">
              <div class="modal-header">
              <h3 class="modal-title"><?php echo $values->getMovie()->getTitle();?></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
              <iframe class="embed-responsive-item" src="<?php echo $values->getMovie()->getTrailer();?>"
                allowfullscreen></iframe>
              </div>
              <h5>Resumen:</h5>
              <p class="text-justify"><?php echo $values->getMovie()->getOverview();?></p>
              <hr>              
              </ul>
              </div>
              <p class="text-center"> 
              <?php foreach($values->getMovie()->getGenre_ids() as $genresId):?>
                <?php foreach($genres as $valuesGenres):
                  if($genresId == $valuesGenres->getId()){
                    echo "• ".$valuesGenres->getName();
                  }
                endforeach;?>
              <?php endforeach;?></p>
              <br><br>
              <div class="row p-1 mb-3">
                <div class="col-2"></div>
                <div class="col-7 text-center">
              <button class="btn btn-primary" type="submit">
                <a class="text-light" href="<?php echo FRONT_ROOT.'/Purchase/selectFunction?id='.$values->getMovie()->getIdBd();?>">COMPRAR TICKET</a>
              </button>
              </div>
                <div class="col-2"></div>

                
              </div>
            </div>
            </div>
          </div>
      <?php endforeach;?>
</main>