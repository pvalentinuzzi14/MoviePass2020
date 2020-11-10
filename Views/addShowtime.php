<?php require_once(VIEWS_PATH."header.php"); ?>
	<body class="bodyAdministration">
	<div class="bg-dark container rounded p-3">
    <h2 class="text-light" >Agregar Funcion</h2>
        <form  action="<?php echo FRONT_ROOT; ?>/Showtime/Add" method="POST"> 
            <div class="row m-auto mb-4">
            <div class="col-md">
                    <label class="text-light" for="movieShowtime">Pelicula</label>
                    <select class="form-control" name="movieShowtime" id="movieShowtime">
                    <?php foreach ($moviesArray as $value): ?> 
                           <option value="<?php echo $value->getIdBd();?>">
                                <?php echo $value->getTitle();?>
                            </option>
                        <?php endforeach;  ?>    
                    </select>                
                </div>
                  <div class="col-md">
                    <label class="text-light" for="roomShowtime">Sala</label>
                    <select class="form-control" name="roomShowtime" id="roomShowtime">
                       <?php foreach ($roomsArray as $value3): ?> 
                           <option value="<?php echo $value3->getId();?>">                              
                                <?php 
                                    echo $value3->getCinema()."-". $value3->getName();
                                ?>
                            </option>
                        <?php endforeach;  ?>    
                    </select>                    
                </div>
                <div class="col-md">
                    <label class="text-light" for="dateShowtime">Fecha</label>
                    <input type="date" name="date" class="form-control m-auto" id="dateShowtime" placeholder="Ingrese una fecha" required>
                </div>
                <div class="col-md">
                    <label class="text-light" for="dateShowtime">Hora</label>
                    <input type="time" name="time" class="form-control m-auto" id="dateShowtime" placeholder="Ingrese una fecha" required>
                </div>
            </div>
            <div class="row align-right p-2">
                <div class="col-md-10"></div>
                <div class="col-md-1">
                <input type="submit" name="submit" class="btn btn-primary m-auto" style="text-align: right;" value="Agregar">
                </div>

            </div>
            
        </form>
	</div>
	</body>
    <footer>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        </body>
</html>