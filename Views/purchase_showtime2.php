<?php //include("header.php");?>
	<div class="bg-dark container rounded p-3">
    <h2 class="text-light" >Tickets</h2>
        <form  action="<?php echo FRONT_ROOT; ?>/Purchase/getTickets" method="POST"> 
            <div class="row m-auto mb-4">
            <div class="col-md">
            <label class="text-light" for="quantity">Cantidad de tickets</label>       
           <?php echo "<input type='number' class='form-control' name='quantity' id='quantity' max='{$showtime->getTicketsRemaining()}' min='1'>" ;?>
            <label class="text-light" for="price">Precio unitario de ticket</label>       
                    <input type="text" class="form-control" name="price" id="price" placeholder="<?php echo $showtime->getTicketPrice();?>" disabled>
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





<?php //include("footer.php")?>