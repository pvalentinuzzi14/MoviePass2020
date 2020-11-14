<div class="bg-dark container rounded p-3">
    <h2 class="text-light" >Compra</h2>
        <form  action="<?php echo FRONT_ROOT; ?>/Purchase/createPurchase" method="Post"> 
            <div class="row m-auto mb-4">
            <div class="col-md">
              <label class="text-light"><?php echo $quantity." X $".$price." = $".$total;?></label>              
            </div>
            </div>
            <div class="row m-auto mb-4">
            <div class="col-md">
                <label class="text-light"><?php echo $showtime->getMovie()->getTitle();?></label>
            </div>
            </div>
            <div class="row m-auto mb-4">
            <div class="col-md">
                <label class="text-light"><?php echo $showtime->getRoom()->getName();?></label>
            </div>
            </div>
            


            <input type="hidden" name="quantity_tickets" value="<?php echo $quantity;?>">
            <input type="hidden" name="total" value="<?php echo $total;?>">
            <input type="hidden" name="id_user" value="<?php echo $user;?>">
            <input type="hidden" name="id_showtime" value="<?php echo $showtime->getId();?>">
           

            <!--<div class="row align-right p-2">
                <div class="col-md-10"></div>   
                <div class="col-md-1">
                <input type="submit" name="" class="btn btn-primary m-auto" style="text-align: right;" value="Confirmar compra">
                </div>

            </div>-->
        
            <script
            src="https://www.mercadopago.com.ar/integrations/v1/web-tokenize-checkout.js"
            data-public-key="TEST-77703bbb-1eaa-4247-b17a-180fd9491774"
            data-transaction-amount="<?php echo $total?>">
            </script>
         </form>
            

        
  

	</div>