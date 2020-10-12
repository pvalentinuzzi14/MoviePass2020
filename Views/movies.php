<main class="">
  <div class="album py-5">
      <div class="container">
        <div class="row">
        <?php foreach($movies as $values){?>
          <div class="col-md-4" >
            <div class="card mb-4 box-shadow">
              <a type="button" data-toggle="modal" data-target="#modal-id<?php echo $values->getId();?>">
              <img src="<?php echo $values->getImage();?>" alt="img" style="cursor:pointer;" class="card-img-top">
              </a>
            </div>
          </div>
          <?php }?>
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
            <h5>Overview:</h5>
            <p class="text-justify"><?php echo $values->getOverview();?></p>
            <hr><br>
            <p>Release Date: <?php echo $values->getRelease_date();?></p>
            <br>
            <ul>Genre:
            <?php foreach($values->getGenre_ids() as $genresId):?>
              <?php foreach($genres as $valuesGenres):
                if($genresId == $valuesGenres->getId()){
                  echo "<li>".$valuesGenres->getName()."</li>";
                }
              endforeach;?>
            <?php endforeach;?>
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