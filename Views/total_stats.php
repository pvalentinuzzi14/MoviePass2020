<div class="container bg-light m-auto p-3" style="opacity: 0.8;" >
<div class="row">
  <div class="col-md-10">
    <h1 class="page-header">
    Compras
    </h1>
  </div>
  <div class="col-md-1">
  </div>
 
</div>


<table class="table table-hover p-5">


    <thead>

      <tr>
           <th>Id</th>
           <th>Cant tickets</th>
           <th>Total</th>
           <th>Fecha</th>
           <th>Usuario</th>
           <th>Pelicula</th>
           <th>Remanentes</th>
           <th>Ganancias</th>
           <th></th>
           <th></th>

      </tr>
    </thead>
    <tbody>
    <?php
        foreach ($purchases as $value):?>
          <?php $total+=$value["total"]; ?>
            <tr>
              <td> <?php echo $value["id_purchase"]; ?></td>
              <td> <?php echo $value["purchased_tickets"]; ?> </td>  
              <td> <?php echo "$".$value["total"]; ?> </td>
              <td> <?php echo $value["date_purchase"];?> </td>
              <td> <?php echo $value["email"];?> </td>
              <td> <?php echo $value["name_movie"];?> </td>
              <td>
              
                <form  action="<?php echo FRONT_ROOT ;?>/Admin/Stats" method="POST"> 
                    <input type="hidden" name="id_movie" value='<?php echo $value["id_showtime"];?>'>
                    <button type="submit" class='btn btn-primary text-light mt-0' value="1"> 
                      <span><i class="fa fa-search"></i></span>   
                    </button>
                </form> 
              </td>
              <td>
                <form  action="<?php echo FRONT_ROOT ;?>/Admin/MoneyStats" method="POST"> 
                    <input type="hidden" name='idMovie' value='<?php echo $value["idMovie"];?>'>
                    <button type="submit" class='btn btn-secondary text-light mt-0' value="1"> 
                      <span><i class="fa fa-calculator"></i></span>   
                    </button>
                </form> 
              </td>
            </tr>

        <?php endforeach; ?>
        
  </tbody>
</table>
<label for="">Total facturado <?php echo "$".$total;?></label>


</div>