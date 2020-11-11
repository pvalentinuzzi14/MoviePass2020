<div class="bg-dark container rounded p-3">
    <h2 class="text-light" >Compra</h2>
        <form  action="<?php echo FRONT_ROOT; ?>/Purchase/Confirm" method="Post"> 
            <div class="row m-auto mb-4">
            <div class="col-md">
              <h2 class="text-light"><?php echo $ticket." X ".$showtime->getTicketPrice()." = $".$total;?></h2>              
            </div>
            </div>
            <div class="row m-auto mb-4">
            <div class="col-md">
                <label class="text-light"><?php ?></label>
            </div>
            </div>
            <div class="row m-auto mb-4">
            <div class="col-md">
            </div>
            </div>
            <div class="row align-right p-2">
                <div class="col-md-10"></div>   
                <div class="col-md-1">
                <input type="submit" name="" class="btn btn-primary m-auto" style="text-align: right;" value="Agregar">
                </div>

            </div>
            
        </form>
	</div>