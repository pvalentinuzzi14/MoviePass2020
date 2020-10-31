<div class="container bg-light m-auto p-3" style="opacity: 0.8;" >
<div class="row">
  <div class="col-md-10">
    <h1 class="page-header">
     Funciones
    </h1>
  </div>
  <div class="col-md-1">
  <button type="button" class="btn btn-primary btn-lg ">
      <a class="text-light" href="<?php echo FRONT_ROOT ;?>/Showtime/showAddView">Agregar</a>
  </button>
  </div>
 
</div>


<table class="table table-hover p-5">


    <thead>

      <tr>
           <th>Id</th>
           <th>Fecha</th>
           <th>Nombre Pelicula</th>
           <th>Cine</th>
           <th>Sala</th>
           <th>Precio Ticket</th>
           <th>Tickets disponibles</th>
           <th>Tickets vendidos</th>
           <th></th>
           <th></th>
           <th></th>

      </tr>
    </thead>
    <tbody>
    <?php
       // foreach ($cinemaArray as $value):?>

          <tr>
             <td> <?php //echo $value->getId(); ?></td>
             <td> <?php //echo $value->getName(); ?> </td>  
             <td> <?php //echo $value->getAddress(); ?> </td>
             <td> <?php //echo $value->getRooms();?> </td>
             <td> <?php  ?> </td>
             <td> <?php              
             /*$open_time_date=strtotime($value->getOpeningTime());
             echo date("h:i A", $open_time_date);*/
             ?> </td>
             <td> </td>
             <td>
             
            </td>
            <td>
             
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
  

        <?php //endforeach; ?>

  </tbody>
</table>



</div>