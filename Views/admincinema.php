<div class="container bg-light m-auto p-3" style="opacity: 0.8;" >

<h1 class="page-header">
   Cinemas
</h1>
<table class="table table-hover p-5">


    <thead>

      <tr>
           <th>Id</th>
           <th>Nombre</th>
           <th>Direccion</th>
           <th>Cant. Salas</th>
           <th>Disponibilidad</th>
           <th>Apertura</th>
           <th>Cierre</th>
           <th></th>
           <th></th>
           <th></th>

      </tr>
    </thead>
    <tbody>
    <?php
        foreach ($cinemaArray as $value):?>

          <tr>
             <td> <?php echo $value->getId(); ?></td>
             <td> <?php echo $value->getName(); ?> </td>  
             <td> <?php echo $value->getAddress(); ?> </td>
             <td> <?php echo $value->getRooms();?> </td>
             <td> <?php echo ($value->getState() == 1)? "Disponible":"Fuera de Servicio";?> </td>
             <td> <?php              
             $open_time_date=strtotime($value->getOpeningTime());
             echo date("h:i A", $open_time_date);
             ?> </td>
             <td> <?php
              $close_time_date=strtotime($value->getClosingTime());
              echo date("h:i A", $close_time_date); 
            ?> </td>
             <td>
              <form  action="<?php echo FRONT_ROOT ;?>/Cinema/update" method="POST"> 
                  <input type="hidden" name="deleteID" value='<?php echo $value->getId(); ?>'>
                  <button type="submit" class='btn btn-warning text-dark mt-0' value="1"> 
                    <span><i class="fa fa-edit"></i></span>   
                  </button>
              </form>
            </td>
            <td>
              <form  action="<?php echo FRONT_ROOT ;?>/Cinema/updateState" method="POST"> 
                  <input type="hidden" name="deleteID" value='<?php echo $value->getId(); ?>'>
                  <button type="submit" class='btn btn-success text-light mt-0' value="1"> 
                    <span><i class="fa fa-check"></i></span>   
                  </button>
              </form>
            </td>
            <td>
              <form  action="<?php echo FRONT_ROOT ;?>/Cinema/Remove" method="POST"> 
                  <input type="hidden" name="deleteID" value='<?php echo $value->getId(); ?>'>
                  <button type="submit" class='btn btn-danger text-light mt-0' value="1"> 
                  <span><i class="fa fa-times-circle"></i></span>   

                </button>
              </form> 
            </td>
             
          </tr>
  

        <?php endforeach; ?>

  </tbody>
</table>



</div>