<?php //include("header.php");?>
	<div class="bg-dark container rounded p-3">
    <h2 class="text-light" >Tickets</h2>

    <div class="row text-light">
        <div class="col-md">
<h3>    Pelicula : <?php echo $MovieModel->getTitle(); ?></h3>        
</div>
        <div class="col-md">
<h4> Fecha: <?php echo $showtime->getDate(); ?></h4>
        </div>
        <div class="col-md">
        <h4> Horario: <?php echo $showtime->getOpeningTime(); ?></h4>
        </div>


    </div>
        <form  action="<?php echo FRONT_ROOT; ?>/Purchase/Confirm" method="POST"> 
            <div class="row m-auto mb-4">
            <div class="col-md">
            <label class="text-light" for="quantity">Cantidad de tickets</label> 
            <input type="hidden" name="id_showtime" value="<?php echo $showtime->getId();?>">   
           <?php echo "<input type='number' class='form-control' name='quantity' id='quantity' max='{$showtime->getTicketsRemaining()}' min='1' required>" ;?>
            <label class="text-light" for="price">Precio unitario de ticket</label>       
                    <input type="text" class="form-control" name="price" id="price"  value="<?php echo $showtime->getTicketPrice();?>" placeholder="<?php echo $showtime->getTicketPrice();?>" readonly>
                </div>
            </div>
            <div class="row align-right p-2">
                <div class="col-md-10"></div>   
                <div class="col-md-1">
                <button type="submit" class="btn btn-primary m-auto" style="text-align: right;">Agregar
                </div>

            </div>
            
        </form>
	</div>





<?php //include("footer.php")?>