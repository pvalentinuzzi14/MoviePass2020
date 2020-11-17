<div class="container bg-light m-auto p-3" style="opacity: 0.8;" >
<div class="row">
  <div class="col-md-10">
    <h1 class="page-header">
    Peliculas
    </h1>
  </div>
  <div class="col-md-1">
  <button type="button" class="btn btn-primary btn-lg "><a class="text-light" href="<?php echo FRONT_ROOT ;?>/Cinema/showAddView">Agregar</a>
  </button>
  </div>
 
</div>


<table class="table table-hover p-5">


    <thead>

      <tr>
           <th>Id</th>
           <th>Titulo</th>
           <th>Score</th>
           <th>Fecha Lanzamiento</th>
           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th></th>

      </tr>
    </thead>
    <tbody>
    <?php
        foreach ($moviesArray as $value):?>

          <tr>
             <td> <?php echo $value->getId(); ?></td>
             <td> <?php echo $value->getTitle(); ?> </td>  
             <td> <?php echo $value->getScore(); ?> </td>
             <td> <?php echo $value->getRelease_date();?> </td>
             <td>
              <form  action="<?php echo FRONT_ROOT ;?>/Admin/Stats" method="POST"> 
                  <input type="hidden" name="id_movie" value='<?php echo $value->getId();?>'>
                  <button type="submit" class='btn btn-primary text-light mt-0' value="1"> 
                    <span><i class="fa fa-search"></i></span>   
                  </button>
              </form> 
            </td>
             
          </tr>
  

        <?php endforeach; ?>

  </tbody>
</table>



</div>