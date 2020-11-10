<?php require_once(VIEWS_PATH."header.php"); ?>

<div class="container bg-light m-auto p-3" style="opacity: 0.8;" >
<div class="row">
  <div class="col-md-10">
    <h1 class="page-header">
     Funciones
    </h1>
  </div>
  <div class="col-md-1">
  <button type="button" class="btn btn-primary btn-lg ">
   <a class="text-light" href="<?php echo FRONT_ROOT ;?>/Admin/Index">Volver</a>
  </button>
  </div>

 
</div>


<table class="table table-hover p-5">
    <thead>

      <tr>
           <th>Id</th>
           <th>Fecha</th>
           <th>Hora</th>
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
          foreach ($showtimeList as $value):?>
          <tr>
             <td> <?php echo $value->getId(); ?></td>
             <td> <?php echo $value->getdate(); ?> </td>  
             <td> <?php 
             $open_time_date=strtotime($value->getOpeningTime());
             echo date("h:i A", $open_time_date);
              ?> </td>  
             <td> <?php echo $value->getmovie()->getTitle(); ?> </td>
             <td> <?php echo $value->getRoom()->getCinema();?> </td>
             <td> <?php echo $value->getRoom()->getName(); ?> </td>
             <td> <?php echo $value->getTicketPrice();?> </td>
             <td> <?php echo $value->getTotalTickets();?> </td>
             <td> <?php echo $value->getTicketsSold();?> </td>
            <td>
              <form  action="<?php echo FRONT_ROOT ;?>/showTime/Remove" method="POST"> 
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
<footer>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        </body>
</html>