<div class="container bg-light m-auto p-3" style="opacity: 0.8;" >

<h1 class="page-header">
   Salas
</h1>
<table class="table table-hover p-5">


    <thead>

      <tr>
           <th>Id</th>
           <th>Nombre</th>
           <th>Cinema</th>
           <th>Precio</th>
           <th>Capacidad</th>
           <th>Disponibilidad</th>
           <th></th>
           <th></th>
           <th></th>

      </tr>
    </thead>
    <tbody>
    <?php
        foreach ($roomsArray as $value2):?>

          <tr>
             <td> <?php echo $value2->getId(); ?></td>
             <td> <?php echo $value2->getName(); ?> </td>  
             <td> <?php echo $value2->getCinema(); ?> </td>
             <td> <?php echo "$ ".$value2->getTicketPrice();?> </td>
             <td> <?php echo $value2->getCapacity();?> </td>
             <td> <?php echo ($value2->getState() == 1)? "Disponible":"Fuera de Servicio";?> </td>
             <td>
              <form  action="<?php echo FRONT_ROOT ;?>/Room/update" method="POST"> 
                  <input type="hidden" name="deleteID" value='<?php echo $value2->getId(); ?>'>
                  <button type="submit" class='btn btn-warning text-dark mt-0' value="1"> 
                    <span><i class="fa fa-edit"></i></span>   
                  </button>
              </form>
            </td>
            <td>
              <form  action="<?php echo FRONT_ROOT ;?>/Room/updateState" method="POST"> 
                  <input type="hidden" name="deleteID" value='<?php echo $value2->getId(); ?>'>
                  <button type="submit" class='btn btn-success text-light mt-0' value="1"> 
                    <span><i class="fa fa-check"></i></span>   
                  </button>
              </form>
            </td>
            <td>
              <form  action="<?php echo FRONT_ROOT ;?>/Room/Remove" method="POST"> 
                  <input type="hidden" name="deleteID" value='<?php echo $value2->getId(); ?>'>
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