<div class="container bg-light" style="opacity: 0.8;" >
<h1 class="page-header">
   Cinemas
</h1>
<table class="table table-hover">


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
            <td><a  class='btn btn-danger p-3 text-light' href='<?php echo FRONT_ROOT ;?>/Cinema/Remove'>Borrar</a></td>
             
          </tr>
  

        <?php endforeach; ?>

  </tbody>
</table>



</div>

<div class="container bg-light">

<h1 class="page-header">
   Add Cinemas
</h1>
               


<div class="bg-dark container rounded p-3 " >

<form  action="<?php echo FRONT_ROOT; ?>Cinema/showAddView" method="POST"> 


    <div class="row m-auto">
        <div class="col">
            <label class="text-light" for="nameInput">Nombre</label>
            <input type="name" name="name" class="form-control m-auto" id="nameInput" placeholder="Ingrese un nombre">
        </div>
        <div class="col">
            <label class="text-light" for="address">Direccion</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="Ingrese una direccion">
        </div>

        <div class="col">
            <div class="form-group">
                <label class="text-light" for="cantSalas"> Cantidad de salas </label>
                <select class="form-control m-auto" name="cantSalas" id="cantSalas">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                </select>
            </div>
        </div>
        <div class="col">
            <label class="text-light" for="price">Direccion</label>
            <input type="number" name="price" class="form-control" id="price" placeholder="Ticket price $$">
        </div>
    </div>
        <div class="row">
        
        <input type="submit" name="submit" class="btn btn-primary form-control" value="Agregar">

        </div>
</form>
</div>



                



            </div>


