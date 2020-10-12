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
           <th>Cantidad de Salas</th>
           <th>Precio Ticket</th>
           <th>Remover</th>

      </tr>
    </thead>
    <tbody>
    <?php
        foreach ($cinemaArray as $value):?>

          <tr>
             <td> <?php echo $value->getId(); ?></td>
             <td> <?php echo $value->getName(); ?> </td>  
             <td> <?php echo $value->getAddress() ; ?> </td>
             <td> <?php echo count ($value->getRoom());?> </td>
             <td> <?php echo $value->getPrice() ;?> </td>
             <td>
            <form  action="<?php echo FRONT_ROOT ;?>/Cinema/Remove" method="POST"> 
                <input type="hidden" name="deleteID" value='<?php echo $value->getId(); ?>'>
                <button type="submit" class='btn btn-danger text-light mt-0' value="1"> BORRAR </button>
            </form>

            </td>
             
          </tr>
  

        <?php endforeach; ?>

  </tbody>
</table>



</div>