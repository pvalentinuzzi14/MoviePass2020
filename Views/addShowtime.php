<main>
	<body class="bodyAdministration">
	<div class="bg-dark container rounded p-3">
    <h2 class="text-light" >Agregar Funcion</h2>
        <form  action="<?php echo FRONT_ROOT; ?>/Showtime/Add" method="POST"> 
            <div class="row m-auto mb-4">
                <div class="col-md">
                    <label class="text-light" for="dateShowtime">Fecha</label>
                    <input type="datetime-local" name="dateShowtime" class="form-control m-auto" id="dateShowtime" placeholder="Ingrese una fecha" required>
                </div>
                <div class="col-md">
                    <label class="text-light" for="cinema">Cine</label>
                    <select class="form-control" name="cinema" id="cinema">
                        <?php  ?>    
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>                    
                </div>
                <div class="col-md">
                    <label class="text-light" for="roomShowtime">Sala</label>
                    <select class="form-control" name="roomShowtime" id="roomShowtime">
                        <?php  ?>    
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>                    
                </div>
                <div class="col-md">
                    <label class="text-light" for="movieShowtime">Pelicula</label>
                    <select class="form-control" name="movieShowtime" id="movieShowtime">
                        <?php  ?>    
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>                
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
</main>