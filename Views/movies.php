<main>
	<body>
    <div class="row fluid">
      
 <!-- <div class="card-group"> -->
        <?php
        foreach ($json as $value) {        
          ?>
         
          <div class="card col-md-3 mb-2" style="width: 15rem;">
            <img src=<?php echo $value->getImage(); ?> alt="image" >
              <div class="card-body">
              <h5 class="card-title"><?php echo $value->getTitle(); ?></h5>
              <p class="card-text"><?php  echo  $value->getOverview(); ?></p>
              <p class="card-text"><strong><?php echo "Fecha de lanzamiento: ".$value->getRelease_date(); ?></strong></p>
              <p class="card-text"><?php  echo  "Calificacion: ".$value->getVote_average()."/10"; ?></p>


              <a href="#" class="btn btn-success p-3 pull-right">Mas info</a>
            </div>
          </div>
        <?php
        };
        ?>
    </div>        <!--  </div> -->


	</div>
	
	</body>
</main>