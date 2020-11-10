<?php require_once(VIEWS_PATH."header.php"); ?>

<body class="bodyAdministration">
	<div class="bg-dark container rounded p-3">
    <h2 class="text-light" >Agregar Salas</h2>
        <form  action="<?php echo FRONT_ROOT; ?>/Room/Add" method="POST"> 
            <div class="row m-auto mb-4">
            <div class="col-md">
                    <label class="text-light" for="cinema">Cine</label>
                    <select class="form-control" name="cinema" id="cinema">
                        <?php foreach ($cinemaArray as $value): ?> 
                           <option value="<?php echo $value->getId();?>">
                                <?php echo $value->getName();?>
                            </option>
                        <?php endforeach;  ?>    
                        
                    </select>                
                </div>
                <div class="col-md">
                    <label class="text-light" for="nameInput">Nombre</label>
                    <input type="text" name="name" class="form-control m-auto" id="nameInput" placeholder="Ingrese un nombre" required>
                </div>
                <div class="col-md">
                    <label class="text-light" for="capacity">Capacidad</label>
                    <input min="1" max="999" type="number" name="capacity" class="form-control" id="capacity" placeholder="Indique la capacidad" required>
                </div>
                <div class="col-md">
                    <label class="text-light" for="ticketPrice">Precio</label>
                    <input type="number" min="100" name="ticketPrice" class="form-control m-auto" id="ticketPrice" placeholder="Precio $$" required>
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